<template>
    <div>
        <NavBar />
        <main>
            <router-view></router-view>
        </main>
        <Footer></Footer>
    </div>
</template>

<script>
import NavBar from './components/NavBar';
import Footer from './components/Footer';
export default {
  name: 'App',
  components: {
    NavBar,
    Footer,
  },
    data() {
        return {
            arrPosts: [],
            arrCategories: [],
    };
    },
  created() {
    axios.get('/api/posts')
      .then(response => this.arrPosts = response.data.posts);
    axios.get('/api/posts')
      .then(response => this.arrCategories = response.data.categories);
  }
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
</style>
