import Adminlayout from '../Adminlayout';
import Welcome from 'AdminViews/Welcome';

import SliderRoutes from './SliderRoutes';


export default {
    path: '/dashboard/pages',
    component: Adminlayout,
    name: 'Adminlayout',
    children: [
        { path: '', component: Welcome },
        { path: 'welcome', component: Welcome, name: 'welcome' },

        SliderRoutes,

    ]
}