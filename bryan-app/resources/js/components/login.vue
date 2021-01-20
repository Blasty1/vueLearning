<template>
    <form v-bind:action="route" method="post">
        <div class="container-xxl d-flex flex-column justify-content-around login">
           
            <input type="text" name="name" class="flex-grow-1 m-1 pl-3 loginInput" id="" placeholder="Username Da Utilizzare">
            <input type="password" name="password" class = 'flex-grow-1 m-1 pl-3 loginInput' placeholder="Password">
            <div class=" d-flex flex-row flex-grow-1">
                <button type="submit" class='flex-grow-1 loginButton m-1'>Entra in chat</button>
                <button type="submit" class=' loginButton m-1  @if($errors->any()) clickMe @endif '>Registrati</button>
            </div>

          

        </div>
        </form>
</template>

<script>
export default {
    data : function(){
        return {
            route : 'routePHP',    
        }
        
    }
}
</script>