import Model    from './Model';
import Router    from './Routers/LanguageRouter' ;


export default class LanguageModel extends Model {
   
   protected async all() : Promise<any>  {  
      let result : any = '';
      try {
         result   = await (new Router).AllAxios() ;
      } catch (error) {
         result = Model.catch(error) ;
         Model.ErrorNotification(result.data.message) ;
      }
      return result;
   }
   
}
