import Axios from 'axios' ;
import jwt   from './../../../Services/jwt' ;

export default class AuthRouter {

          
    name : string = 'auth' ;
    headers  : object = 
         { 
                // 'Authorization': jwt.Authorization ,
                'Content-Type': 'multipart/form-data',
                // 'localization' : 'en'
         };          
   responseType : any = 'json' ;
   routerPrefix : string = '/api/dashboard/' ;



    async LogoutAxios() : Promise<any>  { 
          return await Axios.post( 
             '/'+this.routerPrefix+'/'+this.name+'/logout','',{ headers : {'Authorization': jwt.Authorization} }
         ); 
    }

     async LoginAxios(formData ?: any) : Promise<any>  { 
        return await Axios.post( 
           this.routerPrefix+this.name+'/login', 
           formData ,
           { headers : this.headers , responseType : this.responseType}
        ); 
     }
    
}