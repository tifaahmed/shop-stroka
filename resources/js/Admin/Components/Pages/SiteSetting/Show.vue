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
                                            :typeColumn="TableRows.id == 1 && column_val.name =='item'? 'Image' :column_val.type" 

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
import Model     from 'AdminModels/SiteSettingModel';
import LanguageModel    from 'AdminModels/LanguageModel';

import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

export default {
    name:"SiteSetting"+"Show",

    mounted() {
        this.initial();
        this.tableColumns();
    },
    components:{
        ColumsIndex
    },
    data( ) { return {
        TableName :'',
        TablePageName :'SiteSetting.All',

        Columns :  [],
        TableRows : [],
    } 
    } ,
    methods : {
        async initial( ) {
            this.TableRows  = ( await this.Show(this.$route.params.id) ) .data.data[0] ;
        },
        // async GetlLanguages(){
        //     this.Languages  = ( await this.AllLanguages() ).data; // all languages ['ar','en']
        // },
        async tableColumns(){
            // await this.GetlLanguages();
            this.Columns = [
                { 
                    type: 'Router'    ,header : 'id'                , name : 'id'               ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'item_key'             , name : 'item_key'            , 
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'item'             , name : 'item'            , 
                    default : null
                } ,
            ];
        },
        // model
            // AllLanguages(){
            //     return  (new LanguageModel).all()  ;
            // },
            async Show(id) {
                return await ( (new Model).show(id) )
            },
        // model
    }       
}
</script>
