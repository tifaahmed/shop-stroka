import Validation    from './Validation';

export default class ProductCategoryValidation   extends Validation {
	

	
	validate(RequestData,Columns,Languages){
		this.staticConditions(RequestData,Columns,Languages);
		this.conditions(RequestData,Columns,Languages);
		if(Object.keys(this.errors).length >0){
			console.log( this.Reaponse());
			return this.Reaponse();
		}
	}
	conditions(RequestData,Columns,Languages){


	}
}
