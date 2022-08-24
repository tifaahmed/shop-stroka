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
                                                    v-if="RequestData[column_val.name] && column_val.translatable"
                                                    :Factorylable="column_val.header + ' ('+ lang_val +') ' "  :FactoryPlaceholder="column_val.placeholder"         
                                                    :FactoryType="column_val.type" :FactoryName="RequestData[column_val.name][lang_val]"  v-model ="RequestData[column_val.name][lang_val]"  
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
                                        v-if="RequestData[column_val.name] && !column_val.translatable"
                                        :Factorylable="column_val.header"  :FactoryPlaceholder="column_val.placeholder"         
                                        :FactoryType="column_val.type" :FactoryName="RequestData[column_val.name]"  v-model ="RequestData[column_val.name]"  
                                        :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors[column_val.name]  )  ) ?  ServerReaponse.errors[column_val.name] : null" 
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
import Model            from 'AdminModels/SliderModel';
import LanguageModel    from 'AdminModels/LanguageModel';
import DataService    from '../../DataService';

import validation     from 'AdminValidations/SliderValidation';
import InputsFactory     from 'AdminPartials/Components/Inputs/InputsFactory.vue'     ;

    export default    {
        name:'SliderCreate',
        components : { InputsFactory } ,

        async mounted() {
            await this.GetlLanguages();
            this.start();
        },
        data( ) { return {
            TableName :'Slider',
            TablePageName :'Slider.All',

            Languages : [],

            hasNoneTranslatableFields : 0,
            hasTranslatableFields : 0,

            Columns : [
                { type: 'string',placeholder:'title',header :'title', name : 'title1' ,translatable : true },
                { type: 'string',placeholder:'subject',header :'subject', name : 'subject1' ,translatable : true},
                { type: 'file',placeholder:null,header :'desktop image', name : 'desktop_image' ,translatable : true },
                { type: 'file',placeholder:null,header :'mobile_image', name : 'mobile_image',translatable : true },
                { type: 'string',placeholder:'url',header :'url', name : 'url1' ,translatable : true },
                { type: 'string',placeholder:'button',header :'button', name : 'button1' ,translatable : true},
            ],


            ServerReaponse : {
                errors :  {},
                message : null,
            },

            RequestData : {},

        } } ,
        methods : {
            start(){
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
                var check = await (new validation).validate(this.RequestData,this.Languages);
                if( check ){ // if there is error
                    this.ServerReaponse = check;
                }
                // front end valedate
                else{
                    await this.SubmetRowButton();// run the form
                }
            },

            async GetlLanguages(){
                this.Languages  = ( await this.AllLanguages() ).data; // all languages
            },

            // model 
                AllLanguages(){
                    return  (new LanguageModel).all()  ;
                },
                store(){
                    return (new Model).store(this.RequestData)  ;
                },
            // model 

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

            async ReturnToTablePage( ) {
                return this.$router.push({ 
                    name: this.TablePageName , 
                    query: { CurrentPage: this.$route.query.CurrentPage } 
                })
            },

        },

    }
</script>