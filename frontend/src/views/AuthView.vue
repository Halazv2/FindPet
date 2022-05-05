<template>
  <div class="login">
    <!-- <transition-group name="fade" :duration="{ enter: 500, leave: 800 }" > -->
    <transition-group name="fade">
      <loginComp @shows="shows" v-if="!Signup" />
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
    };
  },
  methods: {
    shows() {
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
}
.fade-enter-active {
  transition: opacity 0.5s ease;
  animation: fade-in 0.5s;
}
.fade-leave-active {
  transition: opacity 0.5s ease;
  animation: fade-in 0.5s reverse;
  transform: translateX(20%);
}
.fade-enter-to,
.fade-leave-to {
  opacity: 0;
}
@keyframes fade-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.25);
  }
  100% {
    transform: scale(1);
  }
}
</style>

