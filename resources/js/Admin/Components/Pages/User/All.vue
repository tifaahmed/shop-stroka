<template>
    <div class="row row-sm">

        <div class="container-fluid row" >
            <b-row align-v="stretch" align-h="around">
                <b-col  xs="12" sm="6" md="5" lg="4" xl="3">
                    <b-input-group prepend="id"   class="">
                        <b-form-input   @change="initial()"  v-model="filter.id"  ></b-form-input>
                    </b-input-group>
                </b-col>
            </b-row>
        </div>

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
                                            :ValueColumn="row[column.name] ? row[column.name] : column.default "   
                                            :typeColumn="column.type" 
                                            :LoopOnColumn="column.loopOnColumn"
                                            @SendRowData ="SendRowData(row)"  
                                        />
                                    </td>
                                    <td>
                                        <TableControllers 
                                            :RowId="row.id" 
                                            :CurrentPage="TableRows.meta ? TableRows.meta.current_page : 1" 
                                            @SendRowData="SendRowData(row)"
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
import TableControllers     from 'AdminPartials/Components/Controllers/TableControllers.vue'     ;
import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

export default {
    name:"User"+"All",
    components:{
        pagination,ModalIndex,TableControllers,ColumsIndex
    },

    data( ) { return {
        filter :{  id : null  },


        TableName :'User',
        Languages : [],

        TableRows  : {},
        Columns :  [],       
        controller   : [
            { type: 'edit'    ,  invisible : true } ,
            { type: 'delete'  ,  invisible : true } ,
            { type: 'show'    ,  invisible : true } ,
        ] ,
        PerPage  : 10
    } },
    mounted() {
        this.initial( this.$route.query.CurrentPage );
        this.tableColumns();
    },

    methods : {
        async initial(page){
            this.TableRows  = ( await this.Collection(page) ).data ;
        },
        async tableColumns(){
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
                     default : null
                } ,
                { 
                    type: 'Date'      ,header : 'updated'            , name : 'updated_at'        ,
                    invisible : true  ,default : null
                } ,
            ];
        },

        // model 
            Collection(page = 1){
                return  (new Model).collection(page,this.PerPage,this.filter)  ;

            },
            Delete(id){
                return (new Model).deleteRow(id)  ;
            },
        // model 

        async DeleteRowButton(page,id){
            let  data = await this.Delete(id);
            await this.initial(page);
            this.CloseModal();
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