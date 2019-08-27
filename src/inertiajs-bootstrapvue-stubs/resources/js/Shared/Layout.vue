<template>
  <main class="flex-shrink-0 mb-5" role="main">
    <header>
      <NavBar/>
    </header>

    <article>
      <slot/>
    </article>
  </main>
</template>

<script>
  import NavBar from './NavBar.vue'

  export default {
    name: 'Layout',
    components: {
      NavBar,
    },
  }
</script>