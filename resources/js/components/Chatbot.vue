

<template>
    <div class="chatbot">
      <div class="chatbot-container">
        <div class="chatbot-message" v-for="message in messages" :key="message">
          <p>{{ message }}</p>
        </div>
      </div>

      <form @submit.prevent="sendMessage">
        <input type="text" v-model="userMessage" placeholder="Mamma matura e calda near you...">
        <button type="submit" class="btn btn-secondary w-100">Send</button>
      </form>
    </div>
  </template>


  <script>
    export default {
    data() {
        return {
            userMessage: '',
            messages: [],
            botResponses: [
                'Ciao! Come posso aiutarti?',
                'Cosa posso fare per te?',
                'Come posso aiutarti oggi?',
                'Come posso essere utile?',
                'Che palle non ho voglia',
                'Ma fattelo tu',
                'Secondo me sei gay',
                '2 + 2 = 4',
                'Scaccabarozza',
                'E noi qui a parlare di fica',
                'Un\'opera d\'acqua',
                'Non so che dire',
                'sono stragay',
                'Mi annoio',
                'Quanto fa ridere la parola "ano"?',
                'Ho fame',
                'Goku spacca',
                'Combatti per trovare il drago!',
                'Questa cosa che sto facendo è inutile',
                'Piuttosto che seguire la lezione...',
            ],
        };
    },
            methods: {
              sendMessage() {
                  this.messages.push(this.userMessage);
                  this.userMessage = '';
                  let randomIndex = Math.floor(Math.random() * this.botResponses.length);
                  this.messages.push(this.botResponses[randomIndex]);     }   } };
  </script>

<style lang="scss" scoped>
.chatbot{
    position: fixed;
    bottom: 1rem;
    right: 1rem;
    z-index: 10;
    border: 1px solid grey;
    border-radius: 5px;
    padding: 2rem 1rem .2rem;
    background-color: lightgray;
    input{
        border: none;
        border-radius: 3px;
        background-color: lightblue;
        width: 100%;
        margin: 5px 0;
    }
    .chatbot-container{
        background-color: whitesmoke;
        padding: .7rem;
        border-radius: 5px;
    }
}
</style>
