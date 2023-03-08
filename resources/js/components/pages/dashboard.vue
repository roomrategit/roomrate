<template>
    <main class="content">

        <section class="main">
            <div class="container">
                <div class="main__inner">
                    <h1 class="title-2">
                        Личный кабинет
                    </h1><br>
                    <p class="title-3"> {{ this.user.name }} {{ this.user.surname }} </p><br>
                    <p class="title-3"> {{ this.user.email }} </p><br>

                    <hr>

                    <div><br><br>
                        <div class="title-2">Добавить объект</div><br><br>
                        <form>
                            <div>                         
                                <fieldset class="fg">                                 
                                    <input v-model="adv.title" type="text" placeholder="Заголовок"> 
                                </fieldset> 
                            </div> <br>
                            <div>
                                <fieldset class="fg" >                                                             
                                    <textarea v-model="adv.description" cols="30" rows="10" placeholder="Описание" style="min-height:200px;padding:10px;">
                                        
                                    </textarea>
                                </fieldset>
                            </div><br>

                            <div>
                                <fieldset class="filter__type fg">
                                    <select class="m-select" v-model="type">                              
                                        <option v-for="(type, index) in this.filters.type" :value="type.id" :key="index">
                                            {{ type.name }}
                                        </option>
                                    </select>
                                </fieldset> 
                            </div><br>
                            <div>
                                <fieldset class="filter__type fg">
                                    <select class="m-select" v-model="size">                              
                                        <option v-for="(type, index) in this.filters.size" :value="type.id" :key="index">
                                            {{ type.name }}
                                        </option>
                                    </select>
                                </fieldset>                            
                            </div><br>
                                                    
                            <p> <input type="file" class="file-input" @change="loadFile"> </p><br>                          
                            <p> <input type="file" class="file-input" @change="loadFile"> </p><br>
                            <p> <input type="file" class="file-input" @change="loadFile"> </p><br>
                            <p> <input type="file" class="file-input" @change="loadFile"> </p><br>
                            <p> <input type="file" class="file-input" @change="loadFile"> </p><br><br>
                  
                            <input type="button" @click="addObject" value="Добавить">
                        </form>
                    </div>               
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
            api_headers: {},
            adv: {
                title: null,
                description: null,
                rating: 0
            },
            gallery: [],
            filters:{
                type:{},
                size:{}
            },
            type:1,
            size:5
        }
    },
    mounted(){

        this.setApiHeaders() 
        this.setFilters()      
    },
    methods:{

        getUserData(){

            axios.get('/api/auth/profile', this.api_headers ).then(res=>{  

                this.user = res.data.data             
            }).catch(err=>{
                console.log(err.response)
            })
        },
        setApiHeaders(){

            if( localStorage.getItem('access_token') ){

                this.api_headers.headers = {'authorization': `Bearer ${ localStorage.access_token }` }
                this.login_status = true
                this.getUserData()
            }            
        },
        addObject(){

            const formData = new FormData()

            formData.append('title', this.adv.title)
            formData.append('description', this.adv.description)
            formData.append('rating', this.adv.rating)
            formData.append('filters[0]', this.type)
            formData.append('filters[1]', this.size)
            
            for(let index in this.gallery){
                  
                formData.append(`gallery[${index}]`, this.gallery[index])
            }
      
            axios.post('/api/advertisements', formData, this.api_headers).then(res => {

                alert(res.data.message) 
              
                this.adv.title = null
                this.adv.description = null

                for( let input of document.getElementsByClassName('file-input')  ){ 
                    
                    input.value = "" 
                }

                this.gallery = [] 
                              
            }).catch(err => { 
                console.log(err.response) 
            })                
        }, 
        loadFile(e){

            this.gallery.push(e.target.files[0])
        },
        loadFilters(filter){

            axios.get('/api/filters/' + filter ).then(res=>{ 
            
                if( filter == 1 ){                  
                    this.filters.type = res.data.filters
                }

                if( filter == 2 ){                  
                    this.filters.size = res.data.filters
                }
                
            }).catch(err=>{
                console.log(err.response)
            }) 
                     
        },
        setFilters(){
          
            this.loadFilters(1)
            this.loadFilters(2)
        }            
    }
}
</script>

<style>

   .title-2{
     font-size:18px;
     font-weight: bold;
   }

   .title-3{
     font-size:16px;
   }
</style>