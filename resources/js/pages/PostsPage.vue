<template>
    <div class="container" v-if="results">
      <h1 class="text-center text-uppercase">Posts</h1>
      <div class="row g-3">
            <div v-for="post in results.data" :key="post.id" class="col-6 col-md-3">
                <div class="card text-bg-dark h-100">
                    <img :src="post.image" class="card-img-top" :alt="post.title">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p v-for="category in arrCategories" :key="category.id" v-show="category.id == post.category_id" class="card-text flex-grow-1">{{ category.name  }}</p>
                        <router-link :to="{name: 'postsShow', params: {slug: post.slug}}" class="btn btn-secondary">Leggi</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4">
            <ul class="pagination">
                <li class="page-item" :class="{disabled: results.current_page == 1}" @click="changePage(results.current_page - 1)">
                    <span class="page-link" aria-label="Previous" aria-hidden="true">&laquo;</span>
                </li>
                <li @click="changePage(page)" v-for="page in results.last_page" :key="page" class="page-item" :class="{active: results.current_page == page}">
                    <span class="page-link">{{ page }}</span>
                </li>
                <li class="page-item" :class="{disabled: results.current_page == results.last_page}" @click="changePage(results.current_page + 1)">
                    <span class="page-link"  aria-label="Next" aria-hidden="true">&raquo;</span>
                </li>
            </ul>
        </div>
    </div>
  </template>

  <script>
  export default {
    data() {
        return {
            results: [],
            arrCategories: [],
    };
    },
    methods: {
        changePage(page) {
            axios.get('/api/posts?page=' + page)
                .then(response => this.results = response.data.posts);
        },
    },
  created() {
    this.changePage(1);
    axios.get('/api/posts')
      .then(response => this.arrCategories = response.data.categories);
  }
}
  </script>

  <style lang="scss" scoped>
    li{
        cursor: pointer;
    }
  </style>
