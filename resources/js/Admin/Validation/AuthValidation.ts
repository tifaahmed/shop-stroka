import Validation    from './Validation';

export default class AuthValidation   extends Validation {
	public EmailArray        : any      = []  ;
	public PasswordArray        : any      = []  ;

	validate(RequestData){
		this.conditions(RequestData);
		if(Object.keys(this.errors).length >0){
			return this.Reaponse();
		}
	}
	conditions(RequestData){


	    // email 
		this.required(RequestData.email,'email',this.EmailArray);
		this.validEmail(RequestData.email,'email',this.EmailArray);
				
	    // password 
		this.required(RequestData.password,'password',this.PasswordArray);
		

	}
}
