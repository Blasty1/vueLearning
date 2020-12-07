


let app2 = Vue.createApp(
    {
         data() {
            return {
                        logging : 10 , 
                        test : 'ok',
                        dataToShow : [
                            { id : 0 , name : 'bryan si fa le pip' , body : 'sldasklksajasdasdkksdakasjkdlaskjdk'},
                            { id : 1 , name : 'angelo è gay' , body : 'sajkjhkdqwjo asdfjjkfahfhasdfasd asdfjkds'},
                            { id : 2 , name : 'l ultimo testo ' , body : 'ok bdasdhsahdhwhaofdiasjhf'}
                        ]
                    } 
        },
    }
)

let app1= Vue.createApp(
    {
        data(){
            return {
                nameField : 'fdoksdokdfs',
            }
        },
        methods : {
            changeText(newText){
                console.log(this.nameField)
                this.nameField=newText
            }
        }
    }
)

let app3= Vue.createApp(
    {
        data(){
            return {
                messagesToShow : [
                    { text : 'help Mary to meet her boyfriend'},

                ]
            }
        },
        methods : {
            createNewP(){
                
            }  
        }
    }
)





