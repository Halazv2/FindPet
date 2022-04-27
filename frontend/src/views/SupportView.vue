<template>
  <center class="support">
    <h1>This is a support page</h1>
    <SupportComp />
  </center>
</template>

<script>
import SupportComp from "../components/visiteur/SupportComp.vue";
export default {
  name: "SupportView",
  components: { SupportComp },
};
</script>
<style lang="scss" scoped>
.support {
  background-image: url("../assets/images/PAWSS.png");
}
</style>
