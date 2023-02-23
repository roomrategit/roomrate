import { createRouter, createWebHistory } from 'vue-router'


import HomeComponent from './components/pages/home.vue'
import SearchComponent from './components/pages/search.vue'
//import EditComponent from './components/pages/edit.vue'
//import DashboardComponent from './components/pages/dashboard.vue'
//import addComponent from './components/pages/add.vue'
//import loginComponent from './components/pages/login.vue'
//import contactComponent from './components/pages/contact.vue'

const routes = [
    {
      path: "/",
      name: "home",
      component: HomeComponent,
    },
    {
      path: "/search",
      name: "search",
      component: SearchComponent,
    },

  ];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;