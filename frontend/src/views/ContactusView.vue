<template>
  <div class="contact text-gray-700 dark:text-gray-200">
    <ContactUsComp />
  </div>
</template>

<script>
import ContactUsComp from "../components/visiteur/ContactUsComp.vue";
export default {
  name: "ContactUsView",
  components: { ContactUsComp },
};
</script>
<style lang="scss" scoped>
.contact {
  background-image: url("../assets/images/PAWSS.png");
  background-size: 100%;
  min-height: 100vh;
}
</style>

