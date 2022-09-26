import HomePage from '../Components/Pages/SiteSetting/Home';

import AllPage from '../Components/Pages/SiteSetting/All';
import ShowPage from '../Components/Pages/SiteSetting/Show';
import EditPage from '../Components/Pages/SiteSetting/Edit';

export default {
    path: 'site-setting',
    component: HomePage,
    name: 'SiteSetting',
    children: [
        { path: 'all', component: AllPage, name: 'SiteSetting.All' },
        { path: 'show/:id', component: ShowPage, name: 'SiteSetting.Show' },
        { path: 'edit/:id', component: EditPage, name: 'SiteSetting.Edit' },
    ]
};