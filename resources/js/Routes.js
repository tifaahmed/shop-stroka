import layout from './layout';
import AuthRoutes from './Admin/Routes/AuthRoutes';
import AdminRoutes from './Admin/Routes/Routes';

export default {
    mode: 'history',
    base: '/',
    routes: [{
        path: '',
        component: layout,
        name: 'layout',
        children: [
            AdminRoutes,
            AuthRoutes
        ]
    }]
};