<template>
    <div class="container" v-if="objPost != null">
        <h2>{{ objPost.category.name }}</h2>
      <h1 class="text-center text-uppercase">{{ objPost.title }}</h1>
      <img :src="objPost.image" :alt="objPost.excerpt">
      <p>{{ objPost.content }}</p>
      <ul class="list-group list-group-horizontal">
        <li class="list-group-item" v-for="tag in objPost.tags" :key="tag.id">{{ tag.name }}</li>
      </ul>
    </div>
  </template>

  <script>
  export default {
    props: [
        'slug',
    ],
    data() {
        return {
            objPost: null,
        };
    },
    created() {
    axios.get('/api/posts/' + this.slug)
      .then(response => this.objPost = response.data.post);
  }

  }
  </script>

  <style>

  </style>
