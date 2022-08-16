import Adminlayout from '../Adminlayout';
import Welcome from 'AdminViews/Welcome';

// import AvatarRoutes from './AvatarRoutes';


export default {
    path: '/dashboard/pages',
    component: Adminlayout,
    name: 'Adminlayout',
    children: [
        { path: '', component: Welcome },
        { path: 'welcome', component: Welcome, name: 'welcome' },

        // AvatarRoutes,

    ]
}