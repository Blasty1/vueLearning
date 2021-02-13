let axiosApi = {
    methods: {
        axiosApi : function(closure){

            axios
                .get('api/user/users',{
                    headers: {
                        
                        Authorization: 'Bearer ' + this.user.api_token,
                        Accept: 'application/json'

                    }
                })
                .then(response => closure(response.data,this))
                .catch(error => console.log(error))

        }
    }
}

export { axiosApi }