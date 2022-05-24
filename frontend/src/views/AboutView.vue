<template>
  <div class="about text-gray-700 dark:text-gray-200">
    <about-comp />
  </div>
</template>
<script>
import AboutComp from "../components/visiteur/AboutComp.vue";

export default {
  components: { AboutComp },
  name: "AbotView",
};
</script>
<style lang="scss" scoped>
.about {
  background-image: url("../assets/images/PAWSS.png");
  background-size: 100%;
}
</style>
