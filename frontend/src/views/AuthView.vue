<template>
  <div class="login">
    <transition-group name="fade">
      <loginComp @shows="shows" v-if="login" />
      <SignupComp v-if="Signup" @shows="shows" />
    </transition-group>
  </div>
</template>

<script>
import loginComp from "../components/Auth/LoginComp.vue";
import SignupComp from "../components/Auth/SignupComp.vue";

export default {
  name: "SupportView",
  components: { loginComp, SignupComp },
  data() {
    return {
      Signup: false,
      login: true,
    };
  },
  methods: {
    shows() {
      // if signup is true set login to false
      this.login = !this.login;
      this.Signup = !this.Signup;
    },
  },
};
</script>
<style lang="scss" scoped>
.login {
  background-image: url("../assets/images/PAWSS.png");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
  width: 100vw;
}
.fade-enter-active {
  transition: opacity 0.5s;
}
.fade-leave-active {
  transition: opacity 0.5s;
  
}
.fade-enter, .fade-leave-to {
  opacity: 0;
  position: absolute;
}

</style>

