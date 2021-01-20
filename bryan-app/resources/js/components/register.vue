<template>
    <form v-bind:action='route' method='POST'>
   

    <div class='container-xxl d-flex flex-column justify-content-around login'>
        <label v-show='errors.email' for="name" v-for="error in errors.email"class="m-1">{{ error }}</label>
        <input type="text" name="email" v-model='email' class="flex-grow-1 m-1 ps-3 loginInput" id="" placeholder="Email Da Utilizzare">

        <label v-show='errors.name' for="name" v-for="error in errors.name"class="m-1">{{ error }}</label>
        <input type="text"  @blur="checkLenght({'name': 'name' ,'value':email})" name="name" v-model.trim='name' class="flex-grow-1 m-1 ps-3 loginInput" id="" placeholder="Username Da Utilizzare">
        
        <label v-show='errors.password' for="name" v-for="error in errors.password"class="m-1">{{ error }}</label>
        <input type="password" name="password" v-model.trim='password' class = 'flex-grow-1 m-1 ps-3 loginInput' placeholder="Password">

        <button type="submit" class='flex-grow-1 loginButton m-1'>Entra in chat</button>
    </div>

    </form>
</template>

<script>
export default {
    data : function(){
        return {
                route : 'routePHP',
                email : '',
                password : '',
                name : '' ,
                errors : {
                    email : [],
                    password : [],
                    name : []
                 },
        }
    },

    props : {

        min_lenght : Number

    },

    methods : {

        checkLenght(dataToCheck){

            if( dataToCheck.value.length < this.min_lenght ) 
            {
                let error= 'Minimo ' + this.min_lenght + ' caratteri'

                if( error in this.errors[dataToCheck.name] ) console.log('ok')

                this.errors[dataToCheck.name].push(error)
            }
            console.log(typeof this.errors[dataToCheck.name] )

        }



    }
}
</script>