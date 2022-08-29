import HomePage from '../Components/Pages/ProductCategory/Home';

import AllPage from '../Components/Pages/ProductCategory/All';
import CreatePage from '../Components/Pages/ProductCategory/Create';
import ShowPage from '../Components/Pages/ProductCategory/Show';
import EditPage from '../Components/Pages/ProductCategory/Edit';

import AllTrashPage  from '../Components/Pages/ProductCategory/AllTrash' ;
import ShowTrashPage  from '../Components/Pages/ProductCategory/ShowTrash' ;

export default {
    path: 'product-category',
    component: HomePage,
    name: 'ProductCategory',
    children: [
        { path: 'all', component: AllPage, name: 'ProductCategory.All' },
        { path: 'create', component: CreatePage, name: 'ProductCategory.Create' },
        { path: 'show/:id', component: ShowPage, name: 'ProductCategory.Show' },
        { path: 'edit/:id', component: EditPage, name: 'ProductCategory.Edit' },

        { path: 'all-trash'      , component : AllTrashPage  , name : 'ProductCategory.AllTrash'  } ,
        { path: 'trash-show/:id' , component : ShowTrashPage  , name : 'ProductCategory.ShowTrash'     } ,
    ]
};