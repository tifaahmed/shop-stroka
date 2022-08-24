import Vue from 'vue'

export default class DataService {
	static RequestData = {}  ;
	static ErrorsData  = {}  ;

    static handleNoneTranslatableColumns(NoneTranslatableColumns){
        for (var key in NoneTranslatableColumns) {
            Vue.set( DataService.RequestData ,  NoneTranslatableColumns[key].name , 1);  
            DataService.RequestData[ NoneTranslatableColumns[key].name ] = null ;
            // [ Column : null ]
        }
        return DataService.RequestData;
    }
    static handleErrorNoneTranslatableColumns(NoneTranslatableColumns){
        for (var key in NoneTranslatableColumns) {
            Vue.set( DataService.ErrorsData ,  NoneTranslatableColumns[key].name , 1);  
            DataService.ErrorsData[ NoneTranslatableColumns[key].name ] = null ;
            // [ Column : null ]
        }
        return DataService.ErrorsData;
    }

    // *********************************************

    static  handleTranslatableColumns(TranslatableColumns,Languages){
        for (var key in TranslatableColumns) {
            Vue.set( DataService.RequestData,  TranslatableColumns[key].name ,1);  
            DataService.RequestData[TranslatableColumns[key].name] = [];
            // [ Column : [] ]
            for (var lang_key in Languages) {
                Vue.set( DataService.RequestData[ TranslatableColumns[key].name ]   , Languages[lang_key],1 ); 
                DataService.RequestData[ TranslatableColumns[key].name ][Languages[lang_key]] = null;
                // [Column : [ ar : null en : null]]
            }
        }
        return DataService.RequestData;
    }
    static handleErrorTranslatableColumns(TranslatableColumns,Languages){
        for (var key in TranslatableColumns) {
            for (var lang_key in Languages) {
                Vue.set( DataService.ErrorsData, TranslatableColumns[key].name+'.'+Languages[lang_key] , 1);  
                DataService.ErrorsData[TranslatableColumns[key].name+'.'+Languages[lang_key]] = [];
                // [ Column.ar : [] ]
            }
        }
        return DataService.ErrorsData;
    }

}
