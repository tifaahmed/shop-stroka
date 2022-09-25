import HomePage from '../Components/Pages/Store/Home';

import AllPage from '../Components/Pages/Store/All';
import CreatePage from '../Components/Pages/Store/Create';
import ShowPage from '../Components/Pages/Store/Show';
import EditPage from '../Components/Pages/Store/Edit';

import AllTrashPage from '../Components/Pages/Store/AllTrash';
import ShowTrashPage from '../Components/Pages/Store/ShowTrash';

export default {
    path: 'store',
    component: HomePage,
    name: 'Store',
    children: [
        { path: 'all', component: AllPage, name: 'Store.All' },
        { path: 'create', component: CreatePage, name: 'Store.Create' },
        { path: 'show/:id', component: ShowPage, name: 'Store.Show' },
        { path: 'edit/:id', component: EditPage, name: 'Store.Edit' },

        { path: 'all-trash', component: AllTrashPage, name: 'Store.AllTrash' },
        { path: 'trash-show/:id', component: ShowTrashPage, name: 'Store.ShowTrash' },
    ]
};