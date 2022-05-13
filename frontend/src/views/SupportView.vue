<template>
  <center class="support text-gray-700 dark:text-gray-200 ">
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
  background-size: 100%;
}
</style>
