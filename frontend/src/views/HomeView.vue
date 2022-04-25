<template>
  <div class="home">
    <HomeComp />
    <center>home page</center>
  </div>
</template>

<script>
import HomeComp from "../components/visiteur/home/HomeComp.vue";
export default {
  components: { HomeComp },
  name: "HomeView",
};
</script>
