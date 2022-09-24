<template >
	<div>
		<StringColumn
		v-if="typeColumn == 'String'"
		:ValueColumn= "ValueColumn"
		@SendRowData= "SendRowData" 
		/>
		<ImageColumn
		v-else-if= "typeColumn == 'Image'"
		:ValueColumn= "ValueColumn"
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
import ImageColumn     from './../ImageColumn.vue'     ;

import ForloopColumn     from './../ForloopColumn.vue'     ;
import ForloopImageColumn     from './../ForloopImageColumn.vue'     ;

export default {
		name:'ColumsIndexxx',
    data( ) { return {

    } } ,
    components : {
		StringColumn ,ForloopColumn,ForloopImageColumn,ImageColumn
    } ,
    props   : {ValueColumn :null,LoopOnColumn:null,typeColumn :String} ,
    methods : {
        SendRowData( ) {
            this.$emit( 'SendRowData') ;
        }
    } 
} </script>