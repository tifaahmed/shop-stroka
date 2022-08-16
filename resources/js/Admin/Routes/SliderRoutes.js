import HomePage from '../Components/Pages/Slider/Home';

import AllPage from '../Components/Pages/Slider/All';
// import TrashPage from '../Components/Pages/Slider/AllTrash';
// import TrashShow from '../Components/Pages/Slider/TrashShow';
// import CreatePage from '../Components/Pages/Slider/Create';
// import ShowPage from '../Components/Pages/Slider/Show';
// import EditPage from '../Components/Pages/Slider/Edit';

export default {
    path: 'slider',
    component: HomePage,
    name: 'Slider',
    children: [
        { path: 'all', component: AllPage, name: 'slider.ShowAll' },
        // { path: 'trash', component: TrashPage, name: 'slider.Trash' },
        // { path: 'show/:id', component: ShowPage, name: 'slider.Show' },
        // { path: 'trashShow/:id', component: TrashShow, name: 'slider.TrashShow' },
        // { path: 'edit/:id', component: EditPage, name: 'slider.Edit' },
        // { path: 'create', component: CreatePage, name: 'slider.Create' },
    ]
};