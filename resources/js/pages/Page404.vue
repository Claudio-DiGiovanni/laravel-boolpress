<template>
    <div class="container bg-warning">
      <h1>- 404 -</h1>
      <h3 class="text-uppercase">questo indirizzo è inesistente</h3>
    </div>
  </template>

  <script>
  export default {

  }
  </script>

  <style lang="scss" scoped>
    .container{
        border-radius: 10px;
        height: 80vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        h1{
            padding: 3rem;
            color: red;
            font-size: 5rem;
        }
    }
  </style>
