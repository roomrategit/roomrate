import { createRouter, createWebHistory } from 'vue-router'


import HomeComponent from './components/pages/home.vue'
import SearchComponent from './components/pages/search.vue'
import AdvertisementComponent from './components/pages/advertisement.vue'

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
    {
      path: "/advertisement/:id",
      name: "advertisement",
      component: AdvertisementComponent,
    },

  ];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;