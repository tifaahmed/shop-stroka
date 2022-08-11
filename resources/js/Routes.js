
import layout from './layout' ;
import AuthRoutes     from './Admin/Routes/AuthRoutes'    ;

export default { 
    mode: 'history',
    base: '/',
    routes : [
        {   
            path : '' ,component : layout , name : 'layout' ,children : 
            [
                AuthRoutes
            ] 
        }
    ] 
};