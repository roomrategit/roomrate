<template>   
    <div class="modal modal--active">
        <div class="modal__bg _close-modal"></div>
        <div class="modal__dialog">
            <div class="modal__top"> <span @click="closeRegModal()" style="float:right;cursor:pointer;">Close</span>
                <div class="modal__title text26 mob-text20 bold-text accent2-text">
                    Pегистрация
                </div>
            </div>
            <div class="modal__content">
                <form action="" class="modal__form">
                    <div class="modal__fields">
                        <fieldset class="fg">
                            <span class="error-span">{{ this.errors.name }}</span>
                            <input type="text" v-model="user.name" placeholder="Имя">
                        </fieldset>
                        <fieldset class="fg">
                            <span class="error-span">{{ this.errors.surname }}</span>
                            <input type="text" v-model="user.surname" placeholder="Фамилия">
                        </fieldset>                        
                        <fieldset class="fg">                            
                            <span class="error-span">{{ this.errors.email }}</span>
                            <input type="text" v-model="user.email"  placeholder="Электронная почта">
                        </fieldset>
                        <fieldset class="fg">
                            <span class="error-span">{{ this.errors.phone_number }}</span>
                            <input type="email" v-model="user.phone_number" placeholder="Телефон">
                        </fieldset>
                        <fieldset class="fg">
                            <span class="error-span">{{ this.errors.password }}</span>
                            <input type="password" v-model="user.password" placeholder="Пароль">
                        </fieldset>                        
                    </div>        
                    <button type="button" @click="registration()" class="modal__btn m-btn shadow m-btn-accent">
                        <span>Зарегистрироваться</span>
                    </button>
                </form>
            </div>
           
        </div>
    </div>   
</template>

<script>
import axios from 'axios'
export default {
    data(){
	     return{	 	 
                user: {
                    name: null,
                    surname: null,
                    email: null,
                    phone_number: null, 
                    password: null
                },
                errors: {
                    name: null,
                    surname: null,
                    email: null,
                    phone_number: null, 
                    password: null                    
                }
			 }
    },   
    emits: ['status'],
    methods: {
        closeRegModal(){
            this.$emit('status', false)
        },
        registration(){

            axios.post('/api/register', this.user ).then(res=>{  
                    
                this.errorsClean()
                this.closeRegModal()

            }).catch(err => {

                this.errors = err.response.data.errors

                for(let error in err.response.data.errors){

                    if(error == 'email'){
                        this.errors.email = err.response.data.errors[error][0]
                    }
                    if(error == 'phone_number'){
                        this.errors.phone_number = err.response.data.errors[error][0]
                    }
                    if(error == 'password'){
                        this.errors.password = err.response.data.errors[error][0]
                    } 
                    if(error == 'name'){
                        this.errors.name = err.response.data.errors[error][0]
                    } 
                    if(error == 'surname'){
                        this.errors.surname = err.response.data.errors[error][0]
                    }                                                                                 
                }
                 
            }) 
        },
        errorsClean(){    

            this.errors.email = null    
            this.errors.phone_number = null       
            this.errors.password = null       
            this.errors.name = null       
            this.errors.surname = null                   
        }
    }
}
</script>

<style>
    .error-span{
        color:red;
    }
</style>