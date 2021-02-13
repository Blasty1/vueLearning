<template>
    
        <div class='container chatContainer flex-grow-1 my-md-3 my-1'>
            
            <div class='row'>
                <div class='col'>
                    <h3 class='my-3 mx-3'>{{ this.user.name }}</h3>
                </div>
                <div class='col'>
                <form v-bind:action="route_logout" method="post" class='d-flex justify-content-end my-auto'>
                    <input type='hidden' name='_token' :value="csrf">
                    <button id='logout' class='my-3' > LOG OUT</button>
                </form>
                </div>
            </div>
            <div class='row h-90 align-items-center justify-content-center'>
                        <div id='userOnline' class='col-md-3  h-90 me-md-2 mb-md-5 p-0' >
                            <ul>
                            <li v-for="userChat in userRegistered" @click='loadMessages(userChat)' class="d-flex px-1 align-items-center justify-content-center">
                                
                                <h5>{{ userChat.name }}</h5>
                            
                            </li>
                            </ul>
                        </div>
                        <div id='chatWithUser' class='col-md-8 h-90 mb-md-5' >
                            <mini_chat v-if='channel.messages'> </mini_chat>
                        </div>
                        
                    </div>
                
            </div>
        
    </div>
</template>

<script>
import { csrf } from "./../mixins/csrf.js";
import { phpToJs } from "./../mixins/phpToJs.js";
import { axiosApi } from "./../mixins/axiosApi.js";
import  mini_chat  from './chat/mini_chat'

export default {
    mixins : [csrf ,phpToJs ],
    components :{
        mini_chat
    },
    data() {
        return {   
            'userRegistered' : {},
            'channel' : {
                'userChannel' : '',
                'messages' : ''
            },
        }
    },
    mounted() {
        this.user = this.getObject(this.user)
        this.userLoading()
        
    },

    props : {
        route_logout : String,
        user : String
    },

    methods: {
        userLoading : function(){

            axios
                .get('api/user/users',axiosApi(this.user.api_token))
                .then(response => this.userRegistered = response.data)
                .catch(error => console.log(error))

        },

        loadMessages : function(userChosen){
            
            axios
                .get('api/user/messages/' + userChosen.id,axiosApi(this.user.api_token))
                .then(response => this.channel.messages = response.data)
                .catch(error => console.log(error))

        },
    },
}
</script>