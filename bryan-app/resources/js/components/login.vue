<template>
    <form v-bind:action="route" method="post">
    <input type='hidden' name='_token' :value='csrf'>
        <div class="container-xxl d-flex flex-column justify-content-around login">
           

           <div class='form-floating'>

                        <input type="text" name="name" class="flex-grow-1 m-1 pl-3 loginInput form-control" id="" placeholder="Username Da Utilizzare">
            
                        <label  for="floatingInput"  class="m-1"> Username </label>
            
        </div>
        <div class='form-floating'>

            <input type="password" name="password" class = 'flex-grow-1 m-1 pl-3 loginInput form-control' placeholder="Password">
            <label for='floatingInput' class="m-1">Password</label>

        </div>
            <div class=" d-flex flex-row flex-grow-1">
                <button type="submit" class='flex-grow-1 loginButton m-1'>Entra in chat</button>
                <button type="submit" class=' loginButton m-1'>Registrati</button>
            </div>

          

        </div>
        </form>
</template>

<script>
import { csrf } from "./../mixins/csrf.js";

export default {
    mixins : [csrf],

    data : function(){
        return {
           
        }
        
    },
    props : {

        'route' : String,
        

    }
}
</script>