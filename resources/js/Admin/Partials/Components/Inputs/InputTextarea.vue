<template>
		<div class="form-group">
		    <label :for="PropName">{{PropLable}}</label>

			<b-form-textarea
  				
				:name="PropName"
				:id="PropName"
				v-model="data"
				:placeholder="PropPlaceholder"
				@change="change( )"
			></b-form-textarea>
			
			<b-alert show variant="danger" v-for="err in PropErrors" :key="err"  >
					{{ err }}
			</b-alert>
		
		</div>
</template>

 
<script> 
export default {
    data( ) { return {
    	data : this.value

    } } ,
    props   : {
    	PropLable :null,
    	PropPlaceholder :null,
    	PropType  :null,
    	PropName : null,
    	PropErrors    : [] ,	
    	value :null,
    } ,
    watch   : {

    	value( ) {
    	    this.data = this.value ;
    	}
    } ,
    methods : {
        change(  ) {
        	this.$emit( 'input'  , String( this.data ) ) ;
        	this.$emit( 'change' , String( this.data ) ) ;        
        }
    } ,
} </script>