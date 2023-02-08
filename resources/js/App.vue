<template>
    <div>
        <NavBar />
        <main>
            <router-view></router-view>
        </main>
        <Chatbot />
        <Footer></Footer>
    </div>
</template>

<script>
import NavBar from './components/NavBar';
import Footer from './components/Footer';
import Chatbot from './components/Chatbot';
export default {
  name: 'App',
  components: {
    NavBar,
    Footer,
    Chatbot,
  },
}
// aggingi un chatbot con risposte preimpostate casuali
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
</style>
