<template>
    <div>
        <div  v-for="( valLoop , Loopkey )  in LoopOnColumn" :key="Loopkey"   >
            <div v-if="valLoop && ValueColumn  && ValueColumn[valLoop] !== 'null'"> 
                <ColumsIndex  
                    :ValueColumn="ValueColumn[valLoop.name]"   
                    :typeColumn="valLoop.type" 
                    :LoopOnColumn="valLoop.secondLoopOnColumn"
                />
            </div>
            <br> 
        </div> 
    </div>
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