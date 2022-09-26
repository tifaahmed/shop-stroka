import Model    from './Model';
import Router    from './Routers/SiteSettingRouter' ;


export default class SiteSettingModel extends Model {
   
   public async handleData(RequestData) : Promise<any>  {  
      let formData = new FormData();
      await Model.getformDataTranslatedOrNot(formData,RequestData) ;
      return formData;
   }

   protected async all( filter:object ) : Promise<any>  {  
      let result : any = '';
      try {
         result   = await (new Router).AllAxios(filter) ;
      } catch (error) {
         result = Model.catch(error) ;
         Model.ErrorNotification(result.data.message) ;
      }
      return result;
   }
   protected async collection(page : number , PerPage :number , filter:object)  : Promise<Model> {  
      let result : any = '';
      try {
         result   = await (new Router).PaginateAxios(page,PerPage,filter) ;
         if(result.data.meta.to == null){
            var page = page-1;
            result = await (new Router).PaginateAxios(page,PerPage,filter) ;
         }  
         Model.SuccessNotification(result.data.message) ;
      } catch (error) {
         result = Model.catch(error) ;
         Model.ErrorNotification(result.data.message) ;
      }
      return  result;
   }
 
   protected async update ( id  : number ,RequestData ?: any) : Promise< any > {
      let formData = await this.handleData(RequestData);
      let result : any = '';
      try {
         result =  await (new Router).UpdateAxios(id,formData) ;
         Model.SuccessNotification(result.data.message) ;
      } catch (error) {
         result = Model.catch(error) ;
         Model.ErrorNotification(result.message) ;
      }
      return result;
   }

 

   protected async show ( id  : number)  : Promise<any> {
      let result : any = '';
      try {
         result = await (new Router).ShowAxios(id) ;
         Model.SuccessNotification(result.data.message) ;
      } catch (error) {
         result = Model.catch(error) ;
         Model.ErrorNotification(result.message) ;
       }
       return result;
   }


}
