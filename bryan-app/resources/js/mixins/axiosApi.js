let axiosApi = {
    
    headers: {
                        
        Authorization: 'Bearer ' + this.user.api_token,
        Accept: 'application/json'

    }
}

export { axiosApi }