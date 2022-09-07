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
import Model            from 'AdminModels/ProductSubCategoryModel';
import LanguageModel    from 'AdminModels/LanguageModel';

import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

    export default {
        name:"ProductSubCategory"+"Show",

        mounted() {
            this.initial();
            this.tableColumns();
        },
        components:{
            ColumsIndex
        },
        data( ) { return {
            TableName :'ProductSubCategory',
            TablePageName :'ProductSubCategory.All',

            Columns :  [],
            TableRows : [],
        } 
        } ,
        methods : {
            async initial( ) {
                this.TableRows  = ( await this.Show(this.$route.params.id) ) .data.data[0] ;
            },
            async GetlLanguages(){
                this.Languages  = ( await this.AllLanguages() ).data; // all languages ['ar','en']
            },
            async tableColumns(){
            await this.GetlLanguages();
            this.Columns = [
                { 
                    type: 'Router'    ,header : 'id'                , name : 'id'               ,
                    default : null
                } ,
                { 
                    type: 'SelectForloop'   ,header : 'product category' , name : 'product_category'            , 
                    loopOnColumn:[
                        { name : 'id' , type: 'string'   } ,
                        { name : 'image' , type: 'ForloopImage'  , secondLoopOnColumn : ['ar'] }  ,
                        { name : 'title' , type: 'Forloop'  , secondLoopOnColumn :  ['ar']} ,
                    ] ,
                } ,
                
                { 
                    type: 'Forloop'   ,header : 'title'             , name : 'title'            , 
                    loopOnColumn:this.Languages ,  default : null
                } ,
                { 
                    type: 'ForloopImage'   ,header : 'image'        , name : 'image'              ,
                    loopOnColumn:this.Languages , default : null
                } ,
                { 
                    type: 'Forloop'   ,header : 'page url'          , name : 'page_url'           ,
                    loopOnColumn:this.Languages , default : null
                } ,
                { 
                    type: 'Forloop'   ,header : 'page tab title'    , name : 'page_tab_title'     ,
                    invisible : true , loopOnColumn:this.Languages , default : null
                } ,
                { 
                    type: 'Forloop'   ,header : 'page title'        , name : 'page_title'         ,
                    invisible : true , loopOnColumn:this.Languages , default : null
                } ,
                { 
                    type: 'Forloop'   ,header : 'page description'  , name : 'page_description'   ,
                    invisible : true , loopOnColumn:this.Languages , default : null
                } ,
                { 
                    type: 'Forloop'   ,header : 'page_keywords'     , name : 'page_keywords'      ,
                    invisible : true , loopOnColumn:this.Languages , default : null
                } ,
                { 
                    type: 'Date'      ,header : 'created'            , name : 'created_at'        ,
                     default : null
                } ,
                { 
                    type: 'Date'      ,header : 'updated'            , name : 'updated_at'        ,
                    default : null
                } ,
            ];
        },
        // modal
            AllLanguages(){
                return  (new LanguageModel).all()  ;
            },
            async Show(id) {
                return await ( (new Model).show(id) )
            },
        // modal


    }
}
</script>
