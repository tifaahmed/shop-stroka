import HomePage from '../Components/Pages/Slider/Home';

import AllPage from '../Components/Pages/Slider/All';
// import TrashPage from '../Components/Pages/Slider/AllTrash';
// import TrashShow from '../Components/Pages/Slider/TrashShow';
import CreatePage from '../Components/Pages/Slider/Create';
// import ShowPage from '../Components/Pages/Slider/Show';
// import EditPage from '../Components/Pages/Slider/Edit';

export default {
    path: 'slider',
    component: HomePage,
    name: 'Slider',
    children: [
        { path: 'all', component: AllPage, name: 'Slider.All' },
        { path: 'create', component: CreatePage, name: 'Slider.Create' },

        // { path: 'trash', component: TrashPage, name: 'Slider.Trash' },
        // { path: 'show/:id', component: ShowPage, name: 'Slider.Show' },
        // { path: 'trashShow/:id', component: TrashShow, name: 'Slider.TrashShow' },
        // { path: 'edit/:id', component: EditPage, name: 'Slider.Edit' },
    ]
};