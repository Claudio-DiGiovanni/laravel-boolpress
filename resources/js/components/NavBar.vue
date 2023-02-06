<template>
<div>
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <router-link class="nav-link active" aria-current="page" :to="{name: 'home'}">Home</router-link>
  </li>
  <li class="nav-item">
    <router-link class="nav-link" :to="{name: 'postsIndex'}">Posts</router-link>
  </li>
  <li class="nav-item">
    <router-link class="nav-link" :to="{name: 'about'}">About Us</router-link>
  </li>
</ul>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>
