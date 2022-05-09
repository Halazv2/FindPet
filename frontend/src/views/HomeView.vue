<template>
  <div class="home">
    <HomeComp />
  </div>
</template>

<script>
import HomeComp from "../components/visiteur/home/HomeComp.vue";
export default {
  components: { HomeComp },
  name: "HomeView",
};
</script>

<style lang="scss" scoped>
.home {
  background-image: url("../assets/images/PAWSS.png");
  background-size: 100%;
}
</style>
