import HomePage from '../Components/Pages/User/Home';

import AllPage from '../Components/Pages/User/All';
import CreatePage from '../Components/Pages/User/Create';
import ShowPage from '../Components/Pages/User/Show';
import EditPage from '../Components/Pages/User/Edit';

import AllTrashPage from '../Components/Pages/User/AllTrash';
import ShowTrashPage from '../Components/Pages/User/ShowTrash';

export default {
    path: 'user',
    component: HomePage,
    name: 'User',
    children: [
        { path: 'all', component: AllPage, name: 'User.All' },
        { path: 'create', component: CreatePage, name: 'User.Create' },
        { path: 'show/:id', component: ShowPage, name: 'User.Show' },
        { path: 'edit/:id', component: EditPage, name: 'User.Edit' },

        { path: 'all-trash', component: AllTrashPage, name: 'User.AllTrash' },
        { path: 'trash-show/:id', component: ShowTrashPage, name: 'User.ShowTrash' },
    ]
};