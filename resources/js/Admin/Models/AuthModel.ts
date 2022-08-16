import Router    from './Routers/AuthRouter' ;
import Model    from './Model';

export default class AuthModel  extends Model {

	protected async login(RequestData : any) : Promise<any>  {  
		let formData = new FormData();
		await Model.getformData(formData,RequestData) ;

		let result : any = '';
		try {
		   result   = await (new Router).LoginAxios(formData) ;
		   Model.SuccessNotification(result.data.message) ;
		 } catch (error) {
			result = Model.catch(error) ;
			Model.ErrorNotification(result.message) ;
		 }
		return result;
	}


	// protected async logout()  { 
	// 	let result : any = '';
	// 	try {
	// 		result =await (new RoutersAuth).LogoutAxios() ;
	// 	} catch (error) {
	// 	   	result = Model.catch(error) ;
	// 	}
	// 	jwt.logout();

	// 	return  result;
	// }

}