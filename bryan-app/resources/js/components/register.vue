<template>
    <form v-bind:action='route' method='POST'>


            <input type='hidden' name='_token' :value="token_csrf">

    <div class='container-xxl d-flex flex-column justify-content-around login'>
       
        <div class='form-floating'>

            <input  type="email" name="email" v-model='email' id='floatingInput' class="flex-grow-1 m-1 ps-3 loginInput form-control" placeholder='email' required>
            <label  for="floatingInput"  class="m-1" > Email Da utilizzare</label>
            <div :class="{'invalid-feedback' :  errors.email  }"> sdfsdf</div>

        </div>

         <div class='form-floating'>

             <input  type="text"  @blur="checkLenght({'name': 'name' ,'value':email})" name="name" v-model.trim='name' class="flex-grow-1 m-1 ps-3 loginInput form-control"  placeholder="Username Da Utilizzare" required>
            <label  for="floatingInput"  class="m-1"> Username </label>
            
        </div>
    
         <div class='form-floating'>

            
            <input  type="password" name="password" v-model.trim='password' class = 'flex-grow-1 m-1 ps-3 loginInput form-control' placeholder="Password" required>
            <label  for="floatingInput"  class="m-1"> Password </label>

        </div>

        <button type="submit" class='flex-grow-1 loginButton m-1'>Entra in chat</button>
    </div>

    </form>
</template>

<script>
export default {
    data : function(){
        return {

                email : '',
                password : '',
                name : '' ,
                errors : {
                    email : ['ok'],
                    password : [],
                    name : []
                 },
        }
    },

    props : {

        min_lenght : Number,
        route : String,
        token_csrf : String,

    },

    methods : {

        checkLenght(dataToCheck){

            if( dataToCheck.value.length < this.min_lenght ) 
            {
                let error= 'Minimo ' + this.min_lenght + ' caratteri'

                if( error in this.errors[dataToCheck.name] ) console.log('ok')

                this.errors[dataToCheck.name].push(error)
            }
            

        }



    }
}
</script>