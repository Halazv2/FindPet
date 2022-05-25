<template>
  <div class="home">
    <HomeComp />
    <Footer />
  </div>
</template>

<script>
import HomeComp from "../components/visiteur/home/HomeComp.vue";
import Footer from "../components/FooterComp.vue";
export default {
  components: { HomeComp, Footer },
  name: "HomeView",
};
</script>

<style lang="scss" scoped>
.home {
  background-image: url("../assets/images/PAWSS.png");
  background-size: 100%;
}
</style>
