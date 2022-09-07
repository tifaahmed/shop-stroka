<template>
    <div>
        <span  v-for="( valLoop , Loopkey )  in LoopOnColumn" :key="Loopkey.id"   >
            <span v-if="ValueColumn && ValueColumn[valLoop] && ValueColumn[valLoop] !== 'null'"> 

                - <a :href="ValueColumn[valLoop]" target="_blanck"
                >
                    <img 
                     
                    :src="ValueColumn[valLoop]" 
                    style="width: 70px;height: 50px;cursor:pointer;">
                </a>
                <br> 
                
            </span>  
        </span>  
    </div>


</template>
<script> 
export default {
    data( ) { return {
    } } ,

    props   : {
        ValueColumn :null,
        LoopOnColumn :null,
    } ,

} </script>