<template>
  <center class="support text-gray-700 dark:text-gray-200">
    <SupportComp />
    <Footer />
  </center>
</template>

<script>
import SupportComp from "../components/visiteur/SupportComp.vue";
import Footer from "../components/FooterComp.vue";

export default {
  name: "SupportView",
  components: { SupportComp, Footer },
};
</script>
<style lang="scss" scoped>
.support {
  background-image: url("../assets/images/PAWSS.png");
  background-size: 100%;
}
</style>
