// require('./bootstrap');

import { createApp } from "vue";
import router from './router'

import HeaderComponent from './components/bloks/header.vue'
import FooterComponent from './components/bloks/footer.vue'

const newApp = {

    components: {
        HeaderComponent,
        FooterComponent
    }    
}

createApp(newApp).use(router).mount('#app')
//createApp(newApp).mount('#app')
