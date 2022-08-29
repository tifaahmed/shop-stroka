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
                                            :ValueColumn="column_val.value"   
                                            :typeColumn="column_val.type" 
                                            :LoopOnColumn="column_val.LoopOnColumn"
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
import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

    export default {
        name:"ProductSubCategory"+"Show",

        mounted() {
            this.initial();
        },
        components:{
            ColumsIndex
        },
        data( ) { return {
            TableName :'ProductSubCategory',
            TablePageName :'ProductSubCategory.All',

            Columns :  [
                { type: 'Router'    ,header : 'id'                  , name : 'id'          , value : null  } ,
                { type: 'Forloop'   ,header : 'title'              , name : 'title'    , value : null  } ,
                { type: 'ForloopImage'   ,header : 'image'              , name : 'image'    , value : null  } ,
                
                { type: 'Forloop'   ,header : 'page url'              , name : 'page_url' , value : null  } ,
                { type: 'Forloop'   ,header : 'page tab title'              , name : 'page_tab_title' , value : null  } ,
                { type: 'Forloop'   ,header : 'page title'              , name : 'page_title' , value : null  } ,
                { type: 'Forloop'   ,header : 'page description'              , name : 'page_description' , value : null  } ,
                { type: 'Forloop'   ,header : 'page_keywords'              , name : 'page_keywords' , value : null  } ,

                { type: 'Date'      ,header : 'created'             , name : 'created_at'   , value : null  } ,
                { type: 'Date'      ,header : 'updated'             , name : 'updated_at'   , value : null  } ,
            ],
        } 
        } ,
        methods : {
            async initial( ) {
                var TableRows  = ( await this.Show(this.$route.params.id) ) .data.data[0] ;
                this.SendRowData(TableRows)

            },
            // modal
                async Show(id) {
                    return await ( (new Model).show(id) )
                },
            // modal
            SendRowData(row){
                this.Columns.forEach(function (SingleRow) {
                    SingleRow.value = row[SingleRow.name] ;
                });
            },

        }
    }
</script>
