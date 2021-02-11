<template>
    
        <div class='container chatContainer flex-grow-1 my-md-3 my-1'>
            
            <div class='row h-5'>
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
            <div class='row h-95 align-items-center justify-content-center'>
                        <div id='userOnline' class='col-md-3  h-75 me-md-2 mb-md-5' >
                        </div>
                        <div id='chatWithUser' class='col-md-8   h-75 mb-md-5' >
                        </div>
                        
                    </div>
                
            </div>
        
    </div>
</template>

<script>
import { csrf } from "./../mixins/csrf.js";
import { phpToJs } from "./../mixins/phpToJs.js";

export default {
    mixins : [csrf ,phpToJs , apiSanctum],
    
    data() {
        return {   
            'userRegistered' : {},
        }
    },
    mounted() {
        this.user = this.getObject(this.user)
        this.userLoading()
        console.log(this.userRegistered)
        
    },

    props : {
        route_logout : String,
        user : String
    },

    methods: {
        userLoading : function(){
            
            axios
                .get('api/user/users?api_token=' + this.user.api_token)
                .then(response => this.userRegistered = response.data)
                .catch(error => console.log('error'))

        }
    },
}
</script>