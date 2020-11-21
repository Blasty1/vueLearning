-   DIRETTIVE   -
v-if --> if di qualsiasi altro linguaggio
v-for --> for di qualsiasi altro linguaggio
v-bind:key:'varibale.id' --> da utilizzare con un for
v-on:event-name='namefunctiontocall' -> quando fai un determinato evento si attiva la funzione contenuta nei methods del oggetto vue
Vue.component(
    'box' , {
        props : ['article'],
        template : '<div> <div class="title"> <h1> {{ article.name }} </h1> </div> <div class="corpo"> <p> {{ article.body }}</p></div> </div> '
    }
) ---> how to create a component
v-bind:article='name variable'

-   CREATE VUEAPP   -
const app = Vue.createApp ( {
    data(){
        return {
            variable : value
        }
    }
    methods : {
        method1 : function(){},
    }
})
app.mount('#nameElement');
