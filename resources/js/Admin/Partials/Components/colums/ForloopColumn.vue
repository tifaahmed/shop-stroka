<template>
    <span>
        <span  v-for="( valLoop , Loopkey )  in LoopOnColumn" :key="Loopkey"   >
            <span v-if="valLoop && ValueColumn && ValueColumn[valLoop] && ValueColumn[valLoop] !== 'null'"> 
                -{{ValueColumn[valLoop]}}   
            </span>
            <br> 
        </span>  

    </span>


</template>

<script> 

export default {
    name:"forloopColumn",
    components:{
    },

    data( ) { return {
     } } ,

    props   : {
        ValueColumn :null,
        LoopOnColumn :[],
    } ,

} </script>