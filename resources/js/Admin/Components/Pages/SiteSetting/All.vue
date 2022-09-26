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
                                            :typeColumn="row.id == 1 && column.name =='item'? 'Image' :column.type" 
                                            :LoopOnColumn="column.loopOnColumn"
                                            @SendRowData ="SendRowData(row)"  
                                        />
                                    </td>
                                    <td>
                                        <TableControllers 
                                            :controller_buttons = "controller_buttons"
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
import Model     from 'AdminModels/SiteSettingModel';

import pagination           from 'laravel-vue-pagination';
import ModalIndex           from 'AdminPartialsModal/MainModel.vue'     ;
import TableControllers     from 'AdminPartials/Components/Controllers/TableControllers.vue'     ;
import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

export default {
    name:"SiteSetting"+"All",
    components:{
        pagination,ModalIndex,TableControllers,ColumsIndex
    },

    data( ) { return {
        filter :{  id : null  },

        TableName :'SiteSetting',
        Languages : [],

        TableRows  : {},
        Columns :  [],       
        controller_buttons   : [ 'edit' ,'show' ] ,
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