import { createRouter, createWebHistory } from 'vue-router'


import HomeComponent from './components/pages/home.vue'
import SearchComponent from './components/pages/search.vue'
import AdvertisementComponent from './components/pages/advertisement.vue'
import DashboardComponent from './components/pages/dashboard.vue'

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
    {
      path: "/dashboard",
      name: "dashboard",
      component: DashboardComponent,
    }

  ];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {

  if( localStorage.getItem('access_token') ){

  }else{

      if( to.name == 'dashboard' ){

          return next({name:'home'})
      }  
  }

  next()

})

export default router;