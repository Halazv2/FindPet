<template>
  <div class="contact">
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
}
</style>

