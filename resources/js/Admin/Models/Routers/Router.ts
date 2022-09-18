import Vue from 'vue'

import Axios from 'axios' ;
import jwt   from './../../../Services/jwt' ;
// import RolePermisionServices   from './../../../Services/RolePermision' ;

export default class Router   {
    name : string = '' ;
    headers  : object = 
         { 
                'Authorization': jwt.Authorization ,
                 'Content-Type': 'multipart/form-data',
                 'localization' : 'en'
         };   
      responseType : any = 'json' ;
      routerPrefix : string = '/api/dashboard/' ;    

      page : number = null ;
      PerPage : number = null ;
      filter : object = {} ;

   async IfAuth() : Promise<any>  { 
      if ( jwt.Authorization != null+ ' ' +null && !jwt.if_accessToken_expire && jwt.User) {
         return true
      }else{
         return false
      }
   } 
   async createParamsArray() { 

      var params_array = [];
      params_array['page'] =  this.page;
      params_array['PerPage'] = this.PerPage;
      params_array['filter'] = {};

      for (var key in this.filter) {
         params_array['filter'][key] = this.filter[key];
      }

      console.log(params_array,'ggggggg');
      return params_array; 
   } 

   async AllAxios(filter:object = {}) : Promise<any>  { 
      this.filter = filter;
         return  await  Axios.get( 
            this.routerPrefix+this.name ,
            { 
               headers : this.headers , responseType : this.responseType,
               params  : this.createParamsArray()
            }
         ) ;
   }

   async PaginateAxios(page : number , PerPage :number, filter:object = {} ) : Promise<any>  { 
      this.page = page;
      this.PerPage = PerPage;
      this.filter = filter;

      var params_array = [];
      Vue.set( params_array   , 'filter' , 1 ); 

      console.log(params_array,'1');

      params_array['filter'] = [];
      Vue.set( params_array['filter']  , 'title',1 ); 
      Vue.set( params_array['filter']  , 'ss',1 ); 

      console.log(params_array,'2');

      params_array['filter']['title']  =   'jjjj';
      params_array['filter']['ss']  =   'jjjj';

      console.log(params_array,3);

      var params_xxx = { ...params_array };    

      console.log(params_xxx,4);
      var params_xxx = JSON.stringify(params_xxx);
      console.log(params_xxx,4);

      var params_xxx =  
      
            filter: {
               title : 'llll'
               ,
               id : 'llll'
            }
      ;

      console.log( JSON.stringify(params_xxx)   ,'3' );
      console.log( params_xxx );


      return await Axios.get( 
         this.routerPrefix+this.name+'/collection', 
            { 
               headers : this.headers ,responseType : this.responseType ,       
               
               params:{
                  JSON.stringify(params_xxx) 
                  ,
                  per_page: 10
               }
               
            } ,
      ); 
   }
   async PaginateTrashAxios(page : number , PerPage :number, search:object = {}) : Promise<any>  { 
      return await Axios.get( 
         this.routerPrefix+this.name+'/collection-trash', 
         { 
            headers : this.headers ,responseType : this.responseType ,       
            params  : this.createParamsArray()
         } ,
     ); 
   }
   
   async StoreAxios(formData : any) : Promise<any>  {
       return  await Axios.post( 
         this.routerPrefix+this.name , 
          formData , 
          { headers : this.headers , responseType : this.responseType}
       );

    }

    async DeleteAxios(id : number) : Promise<any>  { 
         return  await  Axios.delete( 
            this.routerPrefix+this.name+'/'+id ,
            { headers : this.headers , responseType : this.responseType}
         ) ;
    }
    
    async PremanentlyDeleteAxios(id : number) : Promise<any>  { 
      return  await  Axios.delete( 
         this.routerPrefix+this.name+'/premanently-delete/'+id ,
         { headers : this.headers , responseType : this.responseType}
      ) ;
   }
 
   async ShowAxios(id : number) : Promise<any>  {
      return await Axios.get( 
         this.routerPrefix+this.name+'/'+id+'/show', 
         { headers : this.headers , responseType : this.responseType}
      ); 
   } 
   async TrashShowAxios(id : number) : Promise<any>  {
      return await Axios.get( 
         this.routerPrefix+this.name+'/'+id+'/show-trash', 
         { headers : this.headers , responseType : this.responseType}
      ); 
} 
   
   async UpdateAxios(id : number ,formData ?: any) : Promise<any>  { 
      return await Axios.post( 
         this.routerPrefix+this.name+'/'+id+'/update', 
         formData ,
         { headers : this.headers , responseType : this.responseType}
      ) 
   }
   async RstoreRowAxios(id : number) : Promise<any>  {
      return await Axios.get( 
         this.routerPrefix+this.name+'/'+id+'/restore', 
         { headers : this.headers , responseType : this.responseType}
      ); 
   }

   

}

      