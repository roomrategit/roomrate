<template>

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="" class="logo header__logo">                   
                    <router-link :to="'/'" style="text-decoration:none;"><img src="/public/static/img/logo2.svg" alt=""></router-link>
                </a>

                <div v-if="login_status" class="menu">
                    <div class="menu__user">
                        <span class="text16">
                            <router-link :to="'/dashboard'" style="text-decoration:none;">
                                {{ this.user.name }} {{ this.user.surname }}
                            </router-link>
                            
                        </span>
                        <div class="avatar">
                            <img src="/public/static/img/avatar2.webp" alt="">
                        </div>
                    </div>
                    <a class="menu__logout text16" @click="logout()" style="cursor:pointer;">
                        Выход
                    </a>

                </div>
                <div class="menu__bg"></div>
                <div class="burger"></div>                

                <button v-if="!login_status" class="header__btn m-btn m-btn-accent">
                    <span>Оставить отзыв</span>
                </button>
            </div>
        </div>
    </header>
    
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            user: {},
            login_status:false,
            api_headers: {}
        }
    },
    mounted(){

        this.setApiHeaders()       
    },
    methods:{

        getUserData(){

            axios.get('/api/auth/profile', this.api_headers ).then(res=>{  

                this.user = res.data.data             
            })
        },
        setApiHeaders(){

            if( localStorage.getItem('access_token') ){

                this.api_headers.headers = {'authorization': `Bearer ${ localStorage.access_token }` }
                this.login_status = true
                this.getUserData()
            }            
        },        
        logout(){
            
            axios.post('/api/auth/logout', {}, this.api_headers).then(res=>{  
              
                localStorage.removeItem('access_token')
                localStorage.removeItem('refresh_token')

                this.login_status = false
                this.$router.push('/');
                

            }).catch(err => {

                console.log(err.response)            
            })        
        }
    }
}
</script>

<style>

</style>