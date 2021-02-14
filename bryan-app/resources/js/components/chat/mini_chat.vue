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
        this.openChannel()
        console.log(this.getChannelName())
    },
    props : {

        messages : Object

    },

    watch : {

        'messages.userChannel' : function(newVal,oldVal){

            this.closeChannel()
            this.openChannel()


        }

    },
    updated() {

        this.changePosition()


    },
    methods : {

        openChannel(){

            Echo.join(this.getChannelName())
            .listen('.message.stored',(ev) => { this.newMessages(ev.message) })


        },

        closeChannel(){

            Echo.leaveChannel(this.getChannelName());
    
        },

        getChannelName(){

            let smaller = this.$parent.user.id > this.messages.userChannel.id ? this.messages.userChannel.id : this.$parent.user.id
            let bigger = smaller == this.$parent.user.id ? this.messages.userChannel.id : this.$parent.user.id
          

            return 'chat.' + smaller + '.' + bigger

        },

        newMessages(message){
            console.log('ok')
            if(message.id_user_send != this.messages.userChannel.id) return

            this.messages.messages.push(message)

        },
        senderCheck(message){


            return (message.id_user_send === this.$parent.user.id) 


            


        },

        formatTime(time){

            return this.$root.moment(time).format('MM/DD/YYYY HH:mm:ss')

        },

        changePosition(){

            const messagesLi = this.$el.querySelector('#displayMessages').children[0].children;
                let lastMessage = messagesLi[messagesLi.length - 1]
               
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
                .then(this.messages.messages.push(dataToAppend))
                .catch(error => console.log(error))

            this.newMessage=''
        }


    }
}
</script>