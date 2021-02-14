let axiosApi = function(token,dataToAppend=null,csrfToken=null){
    return { 
        headers: {
                            
            Authorization: 'Bearer ' + token,
            Accept: 'application/json',
            'X-CSRF-TOKEN' : csrfToken 

        },
        data : {
            dataToAppend
        }

    }
}

export { axiosApi }