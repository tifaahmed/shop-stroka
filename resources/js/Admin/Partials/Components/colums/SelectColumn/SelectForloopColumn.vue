<template>
    <span>
        <span  v-for="( valLoop , Loopkey )  in LoopOnColumn" :key="Loopkey"   >
            <span v-if="valLoop && ValueColumn  && ValueColumn[valLoop] !== 'null'"> 
                <ColumsIndex  
                    :ValueColumn="ValueColumn[valLoop.name]"   
                    :typeColumn="valLoop.type" 
                    :LoopOnColumn="valLoop.secondLoopOnColumn"
                />
            </span>
            <br> 
        </span> 
    </span>
</template>

<script> 
import ColumsIndex          from './ColumsIndex.vue'     ;

export default {
    name:"SelectForloopColumn",
    components:{
       ColumsIndex
    },

    data( ) { return {
     } } ,

    props   : {
        ValueColumn :null,
        LoopOnColumn :[],
    } ,

} </script>