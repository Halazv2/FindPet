<template>
  <div class="contact text-gray-700 dark:text-gray-200">
    <ContactUsComp />
        <Footer />

  </div>
</template>

<script>
import ContactUsComp from "../components/visiteur/ContactUsComp.vue";
import Footer from "../components/FooterComp.vue";

export default {
  name: "ContactUsView",
  components: { ContactUsComp, Footer },
};
</script>
<style lang="scss" scoped>
.contact {
  background-image: url("../assets/images/PAWSS.png");
  background-size: 100%;
  min-height: 100vh;
}
</style>

