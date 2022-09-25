<template>
    <div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-md-nowrap">
                            <tbody>
                                <tr  v-for="( column_val , key    )  in Columns" :key="key" class="teeee" >
                                    <th class="never-hide"> {{column_val.header}}  </th>
                                    <td class="never-hide"> 
                                        <ColumsIndex  
                                            :ValueColumn="TableRows[column_val.name]"   
                                            :typeColumn="column_val.type" 
                                            :LoopOnColumn="column_val.loopOnColumn"
                                        />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <router-link style="color:#fff" 
                            :to = "{ 
                                name : TablePageName , 
                                query: { CurrentPage: this.$route.query.CurrentPage }  
                            }" >                         
                            <button type="button" class="btn btn-danger  ">
                                <i class="fas fa-arrow-left">
                                        back
                                </i>
                            </button>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Model     from 'AdminModels/ProductItemModel';
import LanguageModel    from 'AdminModels/LanguageModel';

import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

export default {
    name:"ProductItem"+"Show",

    mounted() {
        this.initial();
        this.tableColumns();
    },
    components:{
        ColumsIndex
    },
    data( ) { return {
        TableName :'',
        TablePageName :'ProductItem.All',

        Columns :  [],
        TableRows : [],
    } 
    } ,
    methods : {

        async tableColumns(){
            // get data
                await this.GetlLanguages();
            // get data            
            
            this.Columns = [
                { 
                    type: 'Router'    ,header : 'id'                , name : 'id'               ,
                    default : null
                } ,
                { 
                    type: 'SelectForloop'   ,header : 'category' , name : 'product_category'            , 
                    loopOnColumn:[
                        { name : 'id' , type: 'String'   } ,
                        { name : 'title' , type: 'Forloop'  , secondLoopOnColumn : ['ar'] }  ,
                    ] ,
                } ,
                { 
                    type: 'SelectForloop'   ,header : 'store' , name : 'store'            , 
                    loopOnColumn:[
                        { name : 'id' , type: 'String'   } ,
                        { name : 'image' , type: 'Image'  }  ,
                        { name : 'title' , type: 'Forloop'  , secondLoopOnColumn : ['ar'] }  ,
                    ] ,
                } ,
                { 
                    type: 'Forloop'   ,header : 'title'             , name : 'title'            , 
                    loopOnColumn:this.Languages ,  default : null
                } ,
                { 
                    type: 'Image'   ,header : 'image'             , name : 'image'            , 
                    loopOnColumn:this.Languages ,  default : null
                } ,
                { 
                    type: 'Forloop'   ,header : 'description'        , name : 'description'            , 
                    invisible : true ,loopOnColumn:this.Languages ,  default : null
                } ,

                { 
                    type: 'String'   ,header : 'status'    , name : 'status'     ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'price'    , name : 'price'     ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'discount'    , name : 'discount'     ,
                    default : null
                } ,
                { 
                    type: 'Date'      ,header : 'created'            , name : 'created_at'        ,
                     default : null
                } ,
                { 
                    type: 'Date'      ,header : 'updated'            , name : 'updated_at'        ,
                    invisible : true  ,default : null
                } ,
            ];
        },

        // get data
            async initial( ) {
                this.TableRows  = ( await this.Show(this.$route.params.id) ) .data.data[0] ;
            },
            async GetlLanguages(){
                this.Languages  = ( await this.AllLanguages() ).data; // all languages ['ar','en']
            },
        // get data
        
        // modal
            AllLanguages(){
                return  (new LanguageModel).all()  ;
            },
            async Show(id) {
                return  ( (new Model).show(id) )
            },
        // modal
    }       
}
</script>
