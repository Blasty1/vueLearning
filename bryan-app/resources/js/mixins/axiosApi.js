let axiosApi = function(token){
    return { 
        headers: {
                            
            Authorization: 'Bearer ' + token,
            Accept: 'application/json'

        }

    }
}

export { axiosApi }