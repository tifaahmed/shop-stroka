<template>
    <div class="container-fluid" >


        <div class="row row-sm">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0 ">
                    <div class="card-header">
                        <h4 class="card-title mb-1">Create {{TableName}} </h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="">
                            <!-- loop on  ex [title,subject] -->
                            <span v-for="( column_val , column_key ) in TranslatableColumns" :key="column_key" >
                                <!-- loop on [ ar & en ]-->

                                <span v-for="( lang_val    , lang_key ) in Languages " :key="lang_key" >

                                    <InputsFactory 
                                        v-if= RequestData[column_val.name]
		                                :Factorylable="column_val.header + '('+ lang_val +')' "  :FactoryPlaceholder="column_val.placeholder"         
                                        :FactoryType="column_val.type" :FactoryName="RequestData[column_val.name][lang_val]"  v-model ="RequestData[column_val.name][lang_val]"  
                                        :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors[column_val.name+'.'+lang_val]  )  ) ?  ServerReaponse.errors[column_val.name+'.'+lang_val] : null" 
                                    />

                                </span>
                                <!-- <hr> -->

                            </span> 

                            <!-- loop on  ex [title,subject] -->
                            <!-- <span v-for="( column_val_ , column_key_ ) in NoneTranslatableColumns" :key="column_key_" >
                                    <InputsFactory :Factorylable="column_val_.header"  :FactoryPlaceholder="column_val_.placeholder"         
                                        :FactoryType="'string'" :FactoryName="RequestData[column_val_.name]"  v-model ="RequestData[column_val_.name]"  
                                        :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors[column_val_.name]  )  ) ?  ServerReaponse.errors[column_val_.name] : null" 
                                    />
                            </span>  -->

                        </div>
                        <button  @click="FormSubmet()" class="btn btn-primary ">
                            Submit
                        </button>
                        
                        <router-link style="color:#fff" 
                            :to = "{ 
                                name : TableName+'.ShowAll' , 
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

            TranslatableColumns : [
                { type: 'string',placeholder:'title',header :'title1', name : 'title1'},
                { type: 'string',placeholder:'subject',header :'subject1', name : 'subject1'},
                { type: 'file',placeholder:null,header :'desktop image', name : 'desktop_image'},
                { type: 'file',placeholder:null,header :'mobile_image', name : 'mobile_image'},
                { type: 'string',placeholder:'url',header :'url', name : 'url1'},
                { type: 'string',placeholder:'button',header :'button', name : 'button1'},
            ],
            // NoneTranslatableColumns : [
            //     { type: 'test',placeholder:'test',header :'test', name : 'test'},
            // ],

            ServerReaponse : {
                errors :  {},
                message : null,
            },

            RequestData : {},

        } } ,
        methods : {
            start(){
                this.RequestData =  DataService.handleTranslatableColumns(this.TranslatableColumns,this.Languages);
                this.ServerReaponse.errors = DataService.handleErrorTranslatableColumns(this.TranslatableColumns,this.Languages);
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