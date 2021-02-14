<template>
    <div class='d-flex flex-column h-100'>
        <div class='flex-grow-1' id="displayMessages">
            <ul class='p-0'>
                <li v-for="message in messages.messages" class='p-2' :class="{'sender' : senderCheck(message) }">
                    <p :class="{ 'text-end senderMessage' : senderCheck(message) , 'receiverMessage' : !senderCheck(message) }" class='mb-0'>{{ message.message }}</p>
                    <p :class="{ 'text-end' : !senderCheck(message) }" class='mb-0'> {{ formatTime(message.created_at) }}</p>
                </li>
            </ul>
        </div>
        <div  id='makeMessage' class='d-flex flex-row'>

            <div class="form-floating p-0 mx-1 mb-2 flex-1">
                <input type="text" class="form-control" v-model='newMessage' id="message" placeholder="Inserisci il messaggio">
                <label for="message">Inserisci il messaggio</label>
            </div>
            <button class='submitButton rounded-3' @click='submitMessage'>Invia</button>

        </div>
        
                </div>
</template>
<script>

export default {
    data(){
        return{
            newMessage : '',
        }
    },
    mounted(){

        this.changePosition()
    },
    props : {

        messages : Object

    },
    updated() {

        this.changePosition()

    },
    methods : {

        senderCheck(message){


            return (message.id_user_send === this.$parent.user.id) 


            


        },

        formatTime(time){

            return this.$root.moment(time).format('MM/DD/YYYY HH:mm:ss')

        },

        changePosition(){

            const messagesLi = this.$el.querySelector('#displayMessages').children[0].children;
                let lastMessage = messagesLi[messagesLi.length - 1]
                console.log(lastMessage)
                if (lastMessage) {
                    
                    lastMessage.scrollIntoView({behavior: 'smooth'});
                }

        },

        submitMessage : function(){

            if( this.newMessage.length == 0 ) return

            let dataToAppend= {
            
                'id_user_send' : this.$parent.user.id,
                'id_user_received' : this.messages.userChannel.id,
                'seen' : 'no',
                'message' : this.newMessage
            
            }

        
            axios
                .post('api/user/message/new', dataToAppend )
                .then()
                .catch(error => console.log(error))


        }


    }
}
</script>