<template >
	<div>
		<StringColumn
		v-if="typeColumn == 'string'"
		:ValueColumn= "ValueColumn"
		@SendRowData= "SendRowData" 
		/>
		<ForloopColumn
		v-else-if= "typeColumn == 'Forloop'"
		:ValueColumn= "ValueColumn"
		:LoopOnColumn =  "LoopOnColumn"
		/>
		<ForloopImageColumn
		v-else-if= "typeColumn == 'ForloopImage'"
		:ValueColumn= "ValueColumn"
		:LoopOnColumn =  "LoopOnColumn"
		/>
	</div>

	

</template>
<script> 
import StringColumn     from './../StringColumn.vue'     ;
import ForloopColumn     from './../ForloopColumn.vue'     ;
import ForloopImageColumn     from './../ForloopImageColumn.vue'     ;

export default {
		name:'ColumsIndexxx',
    data( ) { return {

    } } ,
    components : {
		StringColumn ,ForloopColumn,ForloopImageColumn
    } ,
    props   : {ValueColumn :null,LoopOnColumn:null,typeColumn :String} ,
    methods : {
        SendRowData( ) {
            this.$emit( 'SendRowData') ;
        }
    } 
} </script>