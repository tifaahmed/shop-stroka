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
                                <!-- loop on ar & en -->
                                <span v-for="( lang_val    , lang_key ) in Languages " :key="lang_key" >

                                    <InputsFactory :Factorylable="column_val.header + '('+ lang_val +')' "  :FactoryPlaceholder="column_val.placeholder"         
                                        :FactoryType="column_val.type" :FactoryName="RequestData[column_val.name][lang_val]"  v-model ="RequestData[column_val.name][lang_val]"  
                                        :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors[column_val.name+'.'+lang_val]  )  ) ?  ServerReaponse.errors[column_val.name+'.'+lang_val] : null" 
                                    />

                                </span>
                                <!-- <hr> -->

                            </span> 

                            <!-- loop on  ex [title,subject] -->
                            <span v-for="( column_val_ , column_key_ ) in NoneTranslatableColumns" :key="column_key_" >
                                    <InputsFactory :Factorylable="column_val_.header"  :FactoryPlaceholder="column_val_.placeholder"         
                                        :FactoryType="'string'" :FactoryName="RequestData[column_val_.name]"  v-model ="RequestData[column_val_.name]"  
                                        :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors[column_val_.name]  )  ) ?  ServerReaponse.errors[column_val_.name] : null" 
                                    />
                            </span> 

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
import Model     from 'AdminModels/SliderModel';

import validation     from 'AdminValidations/SliderValidation';
import InputsFactory     from 'AdminPartials/Components/Inputs/InputsFactory.vue'     ;

    export default    {
        name:'SliderCreate',
        components : { InputsFactory } ,

        async mounted() {
            this.handleNoneTranslatableColumns();
            this.handleTranslatableColumns();
            this.handleErrorTranslatableColumns();
            this.handleErrorNoneTranslatableColumns();
        },
        data( ) { return {
            TableName :'Slider',
            TablePageName :'Slider.All',

            Languages : ['ar','en'],

            TranslatableColumns : [
                { type: 'string',placeholder:'title',header :'title1', name : 'title1'},
                { type: 'string',placeholder:'subject',header :'subject1', name : 'subject1'},
            ],
            NoneTranslatableColumns : [
                { type: 'test',placeholder:'test',header :'test', name : 'test'},
            ],


            ServerReaponse : {
                errors :  {},
                message : null,
            },

            RequestData : {

            },

        } } ,
        methods : {

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
                    console.log(this.RequestData);
                    await this.SubmetRowButton();// run the form
                }
            },

            async handleTranslatableColumns(){
                for (var key in this.TranslatableColumns) {
                    Vue.set( this.RequestData,  this.TranslatableColumns[key].name);  
                    this.RequestData[this.TranslatableColumns[key].name] = [];
                    // [ Column : [] ]
                    for (var lang_key in this.Languages) {
                        Vue.set( this.RequestData[ this.TranslatableColumns[key].name ]   , this.Languages[lang_key] ); 
                        this.RequestData[ this.TranslatableColumns[key].name ][this.Languages[lang_key]] = null;
                        // [Column : [ ar : null en : null]]
                    }
                }
            },
            async handleNoneTranslatableColumns(){
                for (var key in this.NoneTranslatableColumns) {
                    Vue.set( this.RequestData ,  this.NoneTranslatableColumns[key].name);  
                    this.RequestData[this.NoneTranslatableColumns[key].name] = null ;
                    // [ Column : null ]
                }
            },
            async handleErrorTranslatableColumns(){
                for (var key in this.TranslatableColumns) {
                    for (var lang_key in this.Languages) {
                        Vue.set( this.ServerReaponse.errors,  this.TranslatableColumns[key].name+'.'+this.Languages[lang_key] );  
                        this.ServerReaponse.errors[this.TranslatableColumns[key].name+'.'+this.Languages[lang_key]] = [];
                        // [ Column.ar : [] ]
                    }
                }
            },
            async handleErrorNoneTranslatableColumns(){
                for (var key in this.NoneTranslatableColumns) {
                    for (var lang_key in this.Languages) {
                        Vue.set( this.ServerReaponse.errors,  this.NoneTranslatableColumns[key].name );  
                        this.ServerReaponse.errors[this.NoneTranslatableColumns[key].name] = [];
                        // [ Column : [] ]
                    }
                }
                console.log(this.ServerReaponse);
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
                console.log(this.RequestData);
                this.ServerReaponse = null;
                let data = await this.store()  ;
                if(data && data.errors){
                     this.ServerReaponse = data    ;
                }else{
                    this.ReturnToTablePage();//success from server
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