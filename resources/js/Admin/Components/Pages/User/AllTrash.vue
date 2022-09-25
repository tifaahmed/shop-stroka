<template>
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap">
                            <thead> 
                                <tr> 
                                    <!-- eslint-disable -->
                                    <th 
                                        v-for="( column , key    ) in Columns    " 
                                        :key="key   " 
                                        v-if="!column.invisible"
                                        v-text="column.header" 
                                    /> 
                                    <!-- eslint-disable -->
                                    <th  v-text="'controller'" />
                                </tr> 
                            </thead>
                            <tbody>
                                <tr v-for="( row    , rowkey ) in TableRows.data " :key="rowkey" >
                                    <td  v-for="( column , key    )  in Columns" :key="key" class="teeee" 
                                        v-if="!column.invisible"
                                    >
                                        <ColumsIndex  
                                            :ValueColumn="row[column.name]"   
                                            :typeColumn="column.type" 
                                            :LoopOnColumn="column.LoopOnColumn"
                                            @SendRowData ="SendRowData(row)"  
                                        />
                                    </td>
                                    <td>
                                        <TrashedControllers 
                                            :RowId="row.id" 
                                            :CurrentPage="TableRows.meta ? TableRows.meta.current_page: 1" 
                                            @SendRowData="SendRowData(row)"
                                            @RestoreRowButton="RestoreRowButton"
                                            @DeleteRowButton="DeleteRowButton"
                                        />
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <pagination 
                         v-if="TableRows" 
                         :size="'large'" 
                         :show-disabled="true" 
                         :limit="5" 
                         :data="TableRows" 
                         @pagination-change-page="initial"
                       
                         >
                            <span slot="prev-nav" >  Prev </span>
                            <span slot="next-nav" > Next  </span>
                        </pagination>
                        <ModalIndex  
                            :Columns="Columns" 
                            :TableRows="TableRows" 
                            @DeleteRowButton="DeleteRowButton"
                            :CurrentPage="TableRows.meta ? TableRows.meta.current_page: 1" 
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Model     from 'AdminModels/UserModel';

import pagination           from 'laravel-vue-pagination';
import ModalIndex           from 'AdminPartialsModal/MainModel.vue'     ;
import TrashedControllers   from 'AdminPartials/Components/Controllers/TrashedControllers.vue'     ;
import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

export default {
    name:"User"+"AllTrash",
    components:{
        pagination,ModalIndex,TrashedControllers,ColumsIndex
    },

    data( ) { return {
        TableName :'User',

        TableRows  : {},
        Columns :  [
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
                    invisible : true  , default : null
                } ,
                { 
                    type: 'String'   ,header : 'longitude'  , name : 'longitude'   ,
                    invisible : true  , default : null
                } ,
                { 
                    type: 'String'   ,header : 'fcm_token'  , name : 'fcm_token'   ,
                    invisible : true  , default : null
                } ,
                { 
                    type: 'String'   ,header : 'pin_code'  , name : 'pin_code'   ,
                    invisible : true  , default : null
                } ,
                { 
                    type: 'date'   ,header : 'birthdate'  , name : 'birthdate'   ,
                    invisible : true  , default : null
                } ,

                { 
                    type: 'date'   ,header : 'email_verified_at'  , name : 'email_verified_at'   ,
                    invisible : true  , default : null
                } ,
                { 
                    type: 'Date'      ,header : 'created'            , name : 'created_at'        ,
                    invisible : true , default : null
                } ,
                { 
                    type: 'Date'      ,header : 'updated'            , name : 'updated_at'        ,
                    invisible : true  ,default : null
                } ,
                { 
                    type: 'Date'      ,header : 'deleted'            , name : 'deleted_at'        ,
                    invisible : false  ,default : null
                } ,
            ],
        PerPage  : 10
    } },

    mounted() {
        this.initial( this.$route.query.CurrentPage );
        
    },

    methods : {
        async initial(page){
            this.TableRows  = ( await this.Collection(page) ).data
        },

        // model 
            Collection(page = 1){
                return  (new Model).CollectionTrash(page,this.PerPage)  ;
            },
            Delete(id){
                return (new Model).premanentlDeleteRow(id)  ;
            },
            Rstore(id){
                return (new Model).RstoreRow(id)  ;
            },
        // model 

        async DeleteRowButton(page,id){
            let  data = await this.Delete(id);
            await this.initial(page);
            this.CloseModal();
        },
        async RestoreRowButton(page,id){
            let  data = await this.Rstore(id);
            await this.initial(page);
        },
        // modal
            SendRowData(row){
                this.Columns.forEach(function (SingleRow) {
                    SingleRow.value = row[SingleRow.name] ;
                });
            },
            CloseModal(){
                var button = document.getElementById("close");
                button.click();
            },
        // modal



    }

}
</script>