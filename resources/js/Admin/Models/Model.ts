
import Swal from 'sweetalert2'

const Toast = Swal.mixin({
   toast: true,
   position: 'top-end',
   showConfirmButton: false,
   timer: 3000,
   timerProgressBar: true,
   didOpen: (toast) => {
     toast.addEventListener('mouseenter', Swal.stopTimer)
     toast.addEventListener('mouseleave', Swal.resumeTimer)
   }
})

export default class Model {

	static catch (error ?: any) : Promise<any> {
		const err = error  
		if (err.response) {
			console.log(err.response.data);
			return  err.response.data;
		}
	}
	// normal data ony
	static getformData (formData ,RequestData ?: any) {
	for (var key in RequestData) {
	   formData.append(key, RequestData[key]);
	}
	return  formData;
	};

	//  RequestData : any = [ Column1 : data  , Column2 : [ ar : data1 , en : data2] ]
	// normal data or array with many arrays
	// return formData;
	static getformDataTranslatedOrNot (formData ,RequestData ?: any) {
	for (var RequestDataKey in RequestData) {  
		if ( Array.isArray(RequestData[RequestDataKey]) ) 
		{	// Column2 : [ ar : data1 , en : data2]
			for (var key in RequestData[RequestDataKey]) { // [ ar : data1 , en : data2]

				formData.append( RequestDataKey+ '[' + key + ']',  RequestData[RequestDataKey][key]   ); // Column2[ar] : data1
			}
		}else
		{ // Column1 : data 
			formData.append(RequestDataKey, RequestData[RequestDataKey]);  // Column1 : data1
		}
	}
	return  formData;
	};

	// object with many objects
	static getObjectFormData(formData, data, key) {
		if ( ( typeof data === 'object' && data !== null ) || Array.isArray(data) ) {
			for ( let i in data ) {
				if ( ( typeof data[i] === 'object' && data[i] !== null ) || Array.isArray(data[i]) ) {
				 this.getObjectFormData(formData, data[i], key + '[' + i + ']');
				} else {
					formData.append(key + '[' + i + ']', data[i]);
				}
			}
		} else {
			formData.append(key, data);
		}
	}


	static ErrorNotification(message) {
		Toast.fire({
            icon: 'error',
            title: message
        })
	}
	static SuccessNotification(message) {
		Toast.fire({
            icon: 'success',
            title: message
         })
	}


}