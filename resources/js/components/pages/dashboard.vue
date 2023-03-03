<template>
    <main class="content">

        <section class="main">
            <div class="container">
                <div class="main__inner">
                    <h1>
                        Личный кабинет
                    </h1>
                    <p> {{ this.user.name }} {{ this.user.surname }} </p>
                    <p> {{ this.user.email }} </p>
               
                </div>
            </div>
        </section>     
    </main>
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
        }        
    }
}
</script>

<style>

</style>