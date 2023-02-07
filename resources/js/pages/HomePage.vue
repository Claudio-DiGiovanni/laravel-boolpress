<template>
  <div class="container">
    <h1 class="text-center uppercase">homepage</h1>
    <div class="container text-center">
        <div class="row row-cols-4">
            <div v-for="post in randomGrid" :key="post.id" class="col">
                <router-link :to="{name: 'postsShow', params: {slug: post.slug}}">
                    <img :src="post.image" :alt="post.title" class="img-fluid">
                </router-link>
            </div>
    </div>
</div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            randomGrid: null,
        };
    },
    created() {
    axios.get('/api/posts/random')
      .then(response => this.randomGrid = response.data.posts);
  }
}
</script>

<style>

</style>
