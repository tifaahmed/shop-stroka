// import Vue from 'vue'

export default class DataService {
	static RequestData = {}  ;
	static ErrorsData  = {}  ;


    // *********************************************

    static  handleColumns(Columns,Languages){
        for (var key in Columns) {
            Vue.set( DataService.RequestData,  Columns[key].name ,1); 
            if (Columns[key].translatable) {
                DataService.RequestData[Columns[key].name] = [];
                // [ Column : [] ]
                for (var lang_key in Languages) {
                    Vue.set( DataService.RequestData[ Columns[key].name ]   , Languages[lang_key],1 ); 
                    DataService.RequestData[ Columns[key].name ][Languages[lang_key]] = 
                    Columns[key].data_value ? Columns[key].data_value[Languages[lang_key]] : null 
                    ;
                    // [Column : [ ar : null en : null]]
                }
            }else{
                DataService.RequestData[Columns[key].name] = Columns[key].data_value;
                // [ Column : null ]
            } 

        }
        return DataService.RequestData;
    }
    static handleErrorColumns(Columns,Languages){
        for (var key in Columns) {
            if (Columns[key].translatable) {
                for (var lang_key in Languages) {
                    Vue.set( DataService.ErrorsData, Columns[key].name+'.'+Languages[lang_key] , 1);  
                    DataService.ErrorsData[Columns[key].name+'.'+Languages[lang_key]] = [];
                    // [ Column.ar : [] ]
                }
            }else{
                Vue.set( DataService.ErrorsData, Columns[key].name , 1);  
                DataService.ErrorsData[Columns[key].name] = null;
            }
        }
        return DataService.ErrorsData;
    }

}
