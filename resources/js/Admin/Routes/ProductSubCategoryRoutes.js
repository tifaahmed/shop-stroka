import HomePage from '../Components/Pages/ProductSubCategory/Home';

import AllPage from '../Components/Pages/ProductSubCategory/All';
import CreatePage from '../Components/Pages/ProductSubCategory/Create';
import ShowPage from '../Components/Pages/ProductSubCategory/Show';
import EditPage from '../Components/Pages/ProductSubCategory/Edit';

import AllTrashPage from '../Components/Pages/ProductSubCategory/AllTrash';
import ShowTrashPage from '../Components/Pages/ProductSubCategory/ShowTrash';

export default {
    path: 'product-sub-category',
    component: HomePage,
    name: 'ProductSubCategory',
    children: [
        { path: 'all', component: AllPage, name: 'ProductSubCategory.All' },
        { path: 'create', component: CreatePage, name: 'ProductSubCategory.Create' },
        { path: 'show/:id', component: ShowPage, name: 'ProductSubCategory.Show' },
        { path: 'edit/:id', component: EditPage, name: 'ProductSubCategory.Edit' },

        { path: 'all-trash', component: AllTrashPage, name: 'ProductSubCategory.AllTrash' },
        { path: 'trash-show/:id', component: ShowTrashPage, name: 'ProductSubCategory.ShowTrash' },
    ]
};