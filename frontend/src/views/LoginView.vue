<template>
  <center class="login">
    <loginComp />
  </center>
</template>

<script>
import loginComp from "../components/Auth/LoginComp.vue";
export default {
  name: "SupportView",
  components: { loginComp },
};
</script>
<style lang="scss" scoped>
.login {
  background-image: url("../assets/images/PAWSS.png");
}
</style>

