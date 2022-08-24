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
import Model            from 'AdminModels/SliderModel';
import ColumsIndex          from 'AdminPartials/Components/colums/ColumsIndex.vue'     ;

    export default {
        name:"SliderShow",

        mounted() {
            this.initial();
        },
        components:{
            ColumsIndex
        },
        data( ) { return {
            TableName :'Slider',
            TablePageName :'Slider.All',

            Columns : [
                { type: 'Router'    ,header : 'id'                  , name : 'id'          , value : null  } ,
                { type: 'ForloopImage'   ,header : 'desktop image'              , name : 'desktop_image'    , value : null  } ,
                { type: 'ForloopImage'   ,header : 'mobile image'              , name : 'mobile_image'    , value : null  } ,
                { type: 'Forloop'   ,header : 'title1'              , name : 'title1'    , value : null  } ,
                { type: 'Forloop'   ,header : 'subject1'              , name : 'subject1'    , value : null  } ,
                { type: 'Forloop'   ,header : 'url1'              , name : 'url1'    , value : null  } ,
                { type: 'Forloop'   ,header : 'button1'              , name : 'button1'    , value : null  } ,
                { type: 'Date'      ,header : 'created'             , name : 'created_at'   , value : null  } ,
                { type: 'Date'      ,header : 'updated'             , name : 'updated_at'   , value : null  } ,],   
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
