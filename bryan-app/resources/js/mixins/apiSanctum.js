import axios from "axios"

let apiSanctum = {
    methods: {
        apiSanctum :  function(callback){

            axios
                .get('/sanctum/csrf-cookie')
                .then(response => )
                .catch( error => console.log(error))


        }
    },
}