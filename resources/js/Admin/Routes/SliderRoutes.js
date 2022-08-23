import HomePage from '../Components/Pages/Slider/Home';

import AllPage from '../Components/Pages/Slider/All';
import CreatePage from '../Components/Pages/Slider/Create';
// import ShowPage from '../Components/Pages/Slider/Show';
import EditPage from '../Components/Pages/Slider/Edit';

export default {
    path: 'slider',
    component: HomePage,
    name: 'Slider',
    children: [
        { path: 'all', component: AllPage, name: 'Slider.All' },
        { path: 'create', component: CreatePage, name: 'Slider.Create' },
        // { path: 'show/:id', component: ShowPage, name: 'Slider.Show' },
        { path: 'edit/:id', component: EditPage, name: 'Slider.Edit' },
    ]
};