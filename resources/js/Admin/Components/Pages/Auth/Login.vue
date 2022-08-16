<template>

    <div >
        <p id="text" style="color:green; margin-left:100px;"></p>

        <InputsFactory :Factorylable="'email'"  :FactoryPlaceholder=" 'Enter your email' "         
            :FactoryType="'email'" :FactoryName="'email'"  v-model ="RequestData.email"  
            :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors.email )  ) ? ServerReaponse.errors.email : null" 
        />
        <InputsFactory :Factorylable="'password'"  :FactoryPlaceholder=" 'Enter your password' "         
            :FactoryType="'password'" :FactoryName="'password'"  v-model ="RequestData.password"  
            :FactoryErrors="( ServerReaponse && Array.isArray( ServerReaponse.errors.password )  ) ? ServerReaponse.errors.password : null" 
        />

        <div class="alert alert-danger " v-if="ServerReaponse && ServerReaponse.message"> 
            {{ServerReaponse.message}}
        </div>

        <button @click="FormSubmet()" type="submit" class="btn btn-main-primary btn-block">
            الدخول
        </button>
        <div class="row row-xs">
            <!-- <div class="col-sm-6">
                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
            </div> -->
            <!-- <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
            </div> -->
        </div>
    </div>
</template>
<script>

    import Model     from '../../../Models/AuthModel';

    import InputsFactory  from 'AdminPartials/Components/Inputs/InputsFactory.vue'     ;
    import validation     from 'AdminValidations/AuthValidation';

    export default {
        name:'AuthLogin',
        components : { InputsFactory } ,

        mounted() {
            console.log( 'login page' )
        },
        data () { return {
            RedirectPageName: 'welcome',
            ServerReaponse : {
                errors : {
                    email :[],
                    password :[],
                },
                message : null,
            },

            RequestData: {
              email: '',
              password: ''
            }

        }},  

        methods: {
            DeleteErrors(){
                for (var key in this.ServerReaponse.errors) {
                    this.ServerReaponse.errors[key] = [];
                }
                this.ServerReaponse.message =null;
            },

            async FormSubmet(){
                // clear errors
                await this.DeleteErrors();
                // validate
                var check = await (new validation).validate(this.RequestData);
                if( check ){ // if there is error
                    this.ServerReaponse = check;
                }
                else{
                    await this.SubmetRowButton();// run the form
                }
            },

            async SubmetRowButton(){
                this.ServerReaponse = null;         // empty  Server Reaponse
                let data = await this.login()  ;    // call the  Server
                if(data && data.errors)             //if error from server  
                {          
                    this.ServerReaponse = data ;    //print the  errors from server  
                }else
                {                           
                    this.redirectPage();             // redirect to onther page
                }
            },

            // model 
                login(){
                    // return this.RequestData;
                    return (new Model).login(this.RequestData)  ;
                },
            // model 

            // redirectPag 
            async redirectPage( ) {
                return this.$router.push({ 
                    name: this.RedirectPageName , 
                })
            },

        }

   }


</script>