<template>
  <div>
    <navigation-vist />
    <router-view />
  </div>
</template>
<script>
import NavigationUser from "./components/Navigation-User.vue";
import NavigationVist from "./components/Navigation-Vist.vue";
import NavigationVisteur from "./components/Navigation-Vist.vue";

export default {
  components: { NavigationVist },
  component: { NavigationUser, NavigationVisteur },
};
</script>


<style lang="scss">
body{
  background-color: #E5E5E5;
}
</style>
