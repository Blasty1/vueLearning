Vue.component(
    'box' , {
        props : ['article'],
        template : '<div> <div class="title"> <h1> {{ article.name }} </h1> </div> <div class="corpo"> <p> {{ article.body }}</p></div> </div> '
    }
)
let dataToShow = [
    { id : 0 , name : 'bryan si fa le pip' , body : 'sldasklksajasdasdkksdakasjkdlaskjdk'},
    { id : 1 , name : 'angelo è gay' , body : 'sajkjhkdqwjo asdfjjkfahfhasdfasd asdfjkds'},
    { id : 2 , name : 'l\' ultimo testo ' , body : 'ok bdasdhsahdhwhaofdiasjhf'}
]
let app = new Vue(
    {
        el : '.app',
        data : {
            messageToShow : 'prima scritta in vue' 
        }
    }
)

let app2 = new Vue(
    {
        el : '#ok',
        data : {
            logging : 10 , 
            test : 'ok',
            dataToShow : [
                { id : 0 , name : 'bryan si fa le pip' , body : 'sldasklksajasdasdkksdakasjkdlaskjdk'},
                { id : 1 , name : 'angelo è gay' , body : 'sajkjhkdqwjo asdfjjkfahfhasdfasd asdfjkds'},
                { id : 2 , name : 'l ultimo testo ' , body : 'ok bdasdhsahdhwhaofdiasjhf'}
            ]
        }
    }
)

let listaApp = new Vue(
    {
        el : '.listaLink',
        data : {
            links : [
                { name : 'bryan'},
                { name : 'giovanni'},
                { name : 'sergio'},
                { giovanni : 'burno'}

            ],
            buttonText : 'Schiacciamo e scoprirai il tuo nome'
        },
        methods : {
            changeColor : function (event){
                console.log('ok')
                event.target.style.backgroundColor = 'red'
            },
            showName : function(){
                this.buttonText = this.links[1].name
            }
        }
    }
)

