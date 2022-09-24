<template>
    <div class="container-fluid" >


        <div class="row row-sm">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">

                <div class="card  box-shadow-0 " v-if="hasTranslatableFields">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Create {{TableName}} translatable fields</h4>
                    </div>
                    <b-card no-body>
                        <b-tabs  content-class="mt-3" card lazy >
                            <b-tab  v-for="( lang_val    , lang_key ) in Languages " :key="lang_key" >
                                <template #title>
                                    <b-spinner type="grow" small></b-spinner> <strong>{{lang_val}}</strong>
                                </template>

                                <div class="card-body pt-0">
                                    <div class="">

                                        <span v-for="( column_val , column_key ) in Columns" :key="column_key" >
                                                <InputsFactory 
                                                    v-if="column_val.translatable"
                                                    :Factorylable="column_val.header + ' ('+ lang_val +') '+( column_val.validation.required ? '*' : ''  )"  :FactoryPlaceholder="column_val.placeholder"         
                                                    :FactoryType="column_val.type" :FactoryName="column_val.name+'['+lang_val+']'"  v-model ="RequestData[column_val.name][lang_val]"  
                                                    :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors[column_val.name+'.'+lang_val]  )  ) ?  ServerReaponse.errors[column_val.name+'.'+lang_val] : null" 
                                                />
                                        </span> 

                                    </div>
                                </div>
                            </b-tab>
                        </b-tabs>
                    </b-card>
                </div>

                <div class="card  box-shadow-0 "  v-if="hasNoneTranslatableFields">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Create {{TableName}} fields</h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="">
                            <span v-for="( column_val , column_key ) in Columns" :key="column_key" >
                                <InputsFactory 
                                    v-if="column_val.translatable == false"
                                    :Factorylable="column_val.header"  :FactoryPlaceholder="column_val.placeholder"         
                                    :FactoryType="column_val.type" :FactoryName="column_val.name"  v-model ="RequestData[column_val.name]"  
                                    :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors[column_val.name]  )  ) ?  ServerReaponse.errors[column_val.name] : null" 
                                    
                                    :FactorySelectOptions="column_val.SelectOptions ? column_val.SelectOptions : [] "  

                                    :FactorySelectStrings="column_val.type === 'select'? column_val.SelectStrings : []"   
                                    :FactorySelectForloopStrings="column_val.type === 'select'? column_val.SelectForloopStrings : []"   
                                    :FactorySelectForloopStringKeys="column_val.type === 'select'? column_val.SelectForloopStringKeys : []"  

                                    :FactorySelectImages="column_val.type === 'select'? column_val.SelectImages : []"   
                                    :FactorySelectForloopImages="column_val.type === 'select'? column_val.SelectForloopImages : []"  
                                    :FactorySelectForloopImageKeys="column_val.type === 'select'? column_val.SelectForloopImageKeys : []" 
                                />
                                   
                            </span> 
                        

                        </div>
                    </div>
                </div>

                <button  @click="FormSubmet()" class="btn btn-primary ">
                    Submit
                </button>
                
                <router-link style="color:#fff" 
                    :to = "{ 
                        name : TablePageName , 
                        query: { CurrentPage: this.$route.query.CurrentPage }  
                    }" 
                > 
                    <button type="button" class="btn btn-danger  ">
                        <i class="fas fa-arrow-left">
                                back
                        </i>
                    </button>
                </router-link>

                <div class="alert alert-danger " v-if="ServerReaponse && ServerReaponse.message"> 
                    {{ServerReaponse.message}}
                </div>

            </div>
        </div>

    </div>
</template>


<script>
import Model     from 'AdminModels/StoreModel';
import UserModel            from 'AdminModels/UserModel';
import LanguageModel    from 'AdminModels/LanguageModel';

import DataService    from '../../DataService';

import validation     from 'AdminValidations/StoreValidation';
import InputsFactory     from 'AdminPartials/Components/Inputs/InputsFactory.vue'     ;

    export default    {
        name:'Store'+'Create',
        components : { InputsFactory } ,

        async mounted() {
            this.start();
        },
        data( ) { return {
            // titles
            TableName :'Store',
            TablePageName :'Store.All',

            // get data 
            Languages : [],
            all_users : {},

            // tabs
            hasNoneTranslatableFields : 0,
            hasTranslatableFields : 0,

            // inputs
            Columns : [],

            // errors from (server & vue)
            ServerReaponse : {
                errors :  {},
                message : null,
            },

            // collect data to send to server 
            RequestData : {},

        } } ,
        methods : {
            async start(){
                // get data
                    await this.GetlLanguages();
                    await this.GetlAllUsers();
                // get data

                this.Columns = [ 
                    { 
                        type: 'select',placeholder:'',header :'user', name : 'user_id' ,
                        translatable : false ,
                        data_value :null  ,
                        validation:{required : false } ,
                        SelectOptions : this.all_users, 
                        SelectStrings: ['id','first_name'] ,SelectForloopStrings:[],SelectForloopStringKeys:[],
                        SelectImages: ['avatar'] ,SelectForloopImages:[],SelectForloopImageKeys:[],
                    },
                    { 
                        type: 'string',placeholder:'title',header : 'title', name : 'title' ,
                        translatable : true ,
                        data_value :null  ,
                        validation:{required : true } 
                    },
                    { 
                        type: 'Radio',placeholder:'status',header : 'status', name : 'status' ,
                        translatable : false , 
                        SelectOptions :['pending','accepted','rejected','canceled'],
                        data_value :null  ,
                        validation:{required : true } 
                    },
                    
                    { 
                        type: 'textarea',placeholder:'description',header : 'description', name : 'description' ,
                        translatable : true ,
                        data_value :null  ,
                        validation:{required : true } 
                    },
                    { 
                        type: 'file',placeholder:null,header :'image', name : 'image' ,
                        translatable : false ,
                        data_value : null  ,
                        validation:{required : false } 
                    },
                
                    { 
                        type: 'string',placeholder:'phone',header : 'phone', name : 'phone' ,
                        translatable : false ,
                        data_value :null  ,
                        validation:{required : false } 
                    },
                    
                    { 
                        type: 'string',placeholder:'latitude',header : 'latitude', name : 'latitude' ,
                        translatable : false , 
                        data_value :null  ,
                        validation:{required : false } 
                    },
                    { 
                        type: 'string',placeholder:'longitude',header : 'longitude', name : 'longitude' ,
                        translatable : false , 
                        data_value :null  ,
                        validation:{required : false } 
                    },
                ];

                this.RequestData =  DataService.handleColumns(this.Columns,this.Languages);
                this.ServerReaponse.errors = DataService.handleErrorColumns(this.Columns,this.Languages);



                this.Columns.forEach(element => {
                    if (element.translatable) {
                        this.hasTranslatableFields = 1;
                    }else{
                        this.hasNoneTranslatableFields = 1;
                    }
                });
            },


            DeleteErrors(){
                for (var key in this.ServerReaponse.errors) {
                    this.ServerReaponse.errors[key] = [];
                }
                this.ServerReaponse.message =null;
            },

            async FormSubmet(){
                // clear errors
                await this.DeleteErrors();
                // front end valedate
                var check = await (new validation).validate(this.RequestData,this.Columns,this.Languages);
                if( check ){ // if there is error
                    this.ServerReaponse = check;
                }
                // front end valedate
                else{
                    await this.HandleData();  // get id from objects
                    this.SubmetRowButton();// run the form
                }
            },

            

            // get data
                async GetlAllUsers(){
                    this.all_users = (await this.AllUsers()).data.data;
                },
                async GetlLanguages(){
                    this.Languages  = ( await this.AllLanguages() ).data; // all languages
                },
            // get data

            // model 
                AllUsers(){
                    return  (new UserModel).all()  ;
                },
                AllLanguages(){
                    return  (new LanguageModel).all()  ;
                },
                store(){
                    return (new Model).store(this.RequestData)  ;
                },
            // model 

            //  Handle Data before call the server 
                HandleData(){
                    this.RequestData.user_id = this.RequestData.user_id ? this.RequestData.user_id.id : null;
                },
            //  Handle Data before call the server 

            // call the server
                async SubmetRowButton(){
                    this.ServerReaponse = null;

                    let data = await this.store()  ;
                    if(data && data.errors)
                    {//error from server
                        this.ServerReaponse = data    ;
                    }else{//success from server
                        this.ReturnToTablePage();
                    }
                },
            // call the server

            // redirect 
                async ReturnToTablePage( ) {
                    return this.$router.push({ 
                        name: this.TablePageName , 
                        query: { CurrentPage: this.$route.query.CurrentPage } 
                    })
                },
            // redirect 

        },

    }
</script>