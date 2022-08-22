import Validation    from './Validation';

export default class SliderValidation   extends Validation {
	

	
	validate(RequestData,Languages){
		this.conditions(RequestData,Languages);
		if(Object.keys(this.errors).length >0){
			console.log( this.Reaponse());
			return this.Reaponse();
		}
	}
	conditions(RequestData,Languages){

		for (var lang_key in Languages) {
			console.log(  );

			// title1 
			this.required(RequestData['title1'][Languages[lang_key]],'title1.'+Languages[lang_key],[]);

			
			// subject1 
			this.required(RequestData['subject1'][Languages[lang_key]],'subject1.'+Languages[lang_key],[]);

			// subject1 
			this.required(RequestData.test,'test',[]);
		}

	}
}
