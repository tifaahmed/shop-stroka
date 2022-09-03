<template>
		<div   class="form-group">
		    <label  class="typo__label" :for="PropName"> {{PropLable}}  </label>

			<multiselect v-model="data" 

			:label="PropLable" 
			:track-by="'id'" 
			:options="PropSelectOptions ? PropSelectOptions : []" 
			:option-height="104"   
			:multiple="false"   
			:searchable="false"
			>
				<template slot="singleLabel" slot-scope="props" >
					
					<span class="option__desc">
						<span class="option__title">
							<span > ( {{props.option.id}} ) </span>

							<span v-for=" ( PropSelectImage_val , PropSelectImage_key ) in PropSelectimages" 
									:key="PropSelectImage_key.id"
							>
								<img style="width:50px"  class="option__image"  :src="props.option[PropSelectImage_val]" >
								/
							</span>

							<span v-for=" ( PropSelectForloopImage_val , PropSelectForloopImage_key ) in PropSelectForloopImages" 
									:key="PropSelectForloopImage_key.id"
							>
								<span  v-for=" ( Image_key_val , Image_key_key ) in PropSelectForloopImageKeys"  
									:key="Image_key_key.id"
								> 
									<img style="width:50px"  class="option__image"  :src="props.option[PropSelectForloopImage_val][Image_key_val]" >
								-
								</span>
								/
							</span>
							
							

							<span v-for=" ( PropSelectForloopString_val , PropSelectForloopString_key ) in PropSelectForloopStrings" 
									:key="PropSelectForloopString_key"
							> 
								<span  v-for=" ( string_key_val , string_key_key ) in PropSelectForloopStringKeys"  
									:key="string_key_key"
								> 
									<span class="option__title" >{{props.option[PropSelectForloopString_val][string_key_val]}}</span>
								-
								</span>
								/

							</span>
						</span>
					</span>
				</template>
				<template slot="option" slot-scope="props">
					<div class="option__desc">
						<span > ( {{props.option.id}} ) </span>

						<span v-for=" ( PropSelectImage_val , PropSelectImage_key ) in PropSelectimages" 
									:key="PropSelectImage_key.id"
							>
							<img style="width:50px"  class="option__image"  :src="props.option[PropSelectImage_val]" >
							/
						</span>
						
						<span v-for=" ( PropSelectForloopImage_val , PropSelectForloopImage_key ) in PropSelectForloopImages" 
								:key="PropSelectForloopImage_key.id"
						>
							<span  v-for=" ( Image_key_val , Image_key_key ) in PropSelectForloopImageKeys"  
								:key="Image_key_key.id"
							> 
								<img style="width:50px"  class="option__image"  :src="props.option[PropSelectForloopImage_val][Image_key_val]" >
							-
							</span>
							/

						</span>
					
						
						<span v-for=" ( PropSelectString_val , PropSelectString_key ) in PropSelectStrings" 
								:key="PropSelectString_key"
						> 
							<span class="option__title" >{{props.option[PropSelectString_val]}}</span>
							/

						</span>

						<span v-for=" ( PropSelectForloopString_val , PropSelectForloopString_key ) in PropSelectForloopStrings" 
								:key="PropSelectForloopString_key"
						> 
							<span  v-for=" ( string_key_val , string_key_key ) in PropSelectForloopStringKeys"  
								:key="string_key_key"
							> 
								<span class="option__title" >{{props.option[PropSelectForloopString_val][string_key_val]}}</span>
							-
							</span>
							/

						</span>

					</div>
				</template>
			</multiselect>
			<!-- <pre class="language-json"><code>{{ data  }} </code></pre> -->

            <div>
		        <ul> 
		            <li  v-for="err in PropErrors" :key="err" class="alert alert-solid-warning">
		              {{ err }}
		            </li>
		        </ul>
		    </div>
		</div>
</template>

 
<script> 
import Multiselect from 'vue-multiselect'

export default {
    components : { Multiselect } ,

    data( ) { return {
		data : this.value 
    } } ,
    props   : {
    	PropLable :null,
    	PropType  :null,
    	PropName : null,
    	PropErrors    : [] ,	
    	value :[],

        PropSelectOptions : [],

        PropSelectStrings : [], 				//  ['name','title']  = ['rrrr','gggg']
        PropSelectForloopStrings : [], 			// name : { en : 'rice' ,  }
        PropSelectForloopStringKeys : [],		// [ 'en' ,  ] 

        PropSelectimages : [],				 	// [image] = ['http//****','http//****']  
		PropSelectForloopImages : [],				// image : { en : 'http//****' ,  }	
		PropSelectForloopImageKeys : [],		// [ 'en' , ' ] 
		
    } ,

    watch   : {

    	value( ) {
    	    this.data = this.value ;
    	},
	    data(  ) {
            this.$emit( 'input'  ,  this.data  ) ;
        	this.$emit( 'change' ,  this.data  ) ;    
    	}
    } ,



} </script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
