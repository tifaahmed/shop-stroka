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
import Model     from 'AdminModels/UserModel';
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
        TableName :'',
        TablePageName :'User.All',

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
                    type: 'Image'   ,header : 'avatar'             , name : 'avatar'            , 
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'first_name'             , name : 'first_name'            , 
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'last_name'        , name : 'last_name'              ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'email'          , name : 'email'           ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'phone'    , name : 'phone'     ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'gender'        , name : 'gender'         ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'latitude'  , name : 'latitude'   ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'longitude'  , name : 'longitude'   ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'fcm_token'  , name : 'fcm_token'   ,
                    default : null
                } ,
                { 
                    type: 'String'   ,header : 'pin_code'  , name : 'pin_code'   ,
                    default : null
                } ,
                { 
                    type: 'date'   ,header : 'birthdate'  , name : 'birthdate'   ,
                    default : null
                } ,

                { 
                    type: 'date'   ,header : 'email_verified_at'  , name : 'email_verified_at'   ,
                    default : null
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
            // AllLanguages(){
            //     return  (new LanguageModel).all()  ;
            // },
            async Show(id) {
                return await ( (new Model).show(id) )
            },
        // modal
    }       
}
</script>
