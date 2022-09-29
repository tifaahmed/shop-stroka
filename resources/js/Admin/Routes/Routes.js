import Adminlayout from '../Adminlayout';
import Welcome from 'AdminViews/Welcome';

// import SliderRoutes from './SliderRoutes';
// import ProductCategoryRoutes from './ProductCategoryRoutes';
// import ProductSubCategoryRoutes from './ProductSubCategoryRoutes';
// import UserRoutes from './UserRoutes';
// import StoreRoutes from './StoreRoutes';
// import ProductItemRoutes from './ProductItemRoutes';
// import SiteSettingRoutes from './SiteSettingRoutes';

console.log('admin rout');

export default {
    path: '/dashboard/pages',
    component: Adminlayout,
    name: 'Adminlayout',
    children: [
        { path: '', component: Welcome },
        { path: 'welcome', component: Welcome, name: 'welcome' },

        // SliderRoutes,
        // ProductCategoryRoutes,
        // ProductSubCategoryRoutes,
        // UserRoutes,
        // StoreRoutes,
        // ProductItemRoutes,
        // SiteSettingRoutes,
    ]
}