<template>
    <div class='d-flex flex-column h-100'>
        <div class='flex-grow-1' id="displayMessages">
            <ul>
                <li></li>
            </ul>
        </div>
        <div  id='makeMessage' class='d-flex flex-row'>

            <div class="form-floating p-0 mx-1 mb-2 flex-1">
                <input type="text" class="form-control" id="message" placeholder="Inserisci il messaggio">
                <label for="message">Inserisci il messaggio</label>
            </div>
            <button class='submitButton rounded-3'>Invia</button>

        </div>
        
                </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    mounted(){
        
    },
    methods : {

    }
}
</script>