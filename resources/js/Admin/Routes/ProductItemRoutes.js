import HomePage from '../Components/Pages/ProductItem/Home';

import AllPage from '../Components/Pages/ProductItem/All';
import CreatePage from '../Components/Pages/ProductItem/Create';
import ShowPage from '../Components/Pages/ProductItem/Show';
import EditPage from '../Components/Pages/ProductItem/Edit';

import AllTrashPage from '../Components/Pages/ProductItem/AllTrash';
import ShowTrashPage from '../Components/Pages/ProductItem/ShowTrash';

export default {
    path: 'product-item',
    component: HomePage,
    name: 'ProductItem',
    children: [
        { path: 'all', component: AllPage, name: 'ProductItem.All' },
        { path: 'create', component: CreatePage, name: 'ProductItem.Create' },
        { path: 'show/:id', component: ShowPage, name: 'ProductItem.Show' },
        { path: 'edit/:id', component: EditPage, name: 'ProductItem.Edit' },

        { path: 'all-trash', component: AllTrashPage, name: 'ProductItem.AllTrash' },
        { path: 'trash-show/:id', component: ShowTrashPage, name: 'ProductItem.ShowTrash' },
    ]
};