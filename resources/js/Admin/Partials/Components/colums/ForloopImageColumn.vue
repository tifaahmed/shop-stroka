<template>
    <span>
        
        <span  v-for="( valColumn , langkey    )  in ValueColumn" :key="langkey"   >
                <a :href="valColumn" target="_blanck">
                    <img 
                    v-if="valColumn" 
                    :src="valColumn" 
                    style="width: 70px;height: 50px;cursor:pointer;">
                </a>
            <br> 
        </span>  
    </span>


</template>
<script> 
export default {
    data( ) { return {
    } } ,

    props   : {
        ValueColumn :null,
    } ,

} </script>