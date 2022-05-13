<template>
  <div>
    <div class="flex bg-packed font-lexend dark:bg-gray-900">
      <div
        id="sidebar-scroll"
        class="
          flex-sidebar
          lg:flex-auto
          w-sidebar
          lg:block
          hidden
          w-2/12
          bg-white
          dark:bg-gray-800
          border-r-2
          dark:border-gray-700
          h-screen
          lg:z-0
          z-40
          overflow-auto
          lg:relative
          fixed
        "
      >
        <Sidebar v-if="Role == 'User'" />
      </div>
      <div class="flex-auto w-full" id="body-scroll">
        <Header v-if="Role == 'User'" />
        <navigation-vist v-if="!Role" />
        <router-view />
      </div>
    </div>
  </div>
</template>
<script>
import NavigationUser from "./components/Navigation-User.vue";
import NavigationVist from "./components/Navigation-Vist.vue";
import Header from "@/components/Header.vue";
import Sidebar from "@/components/Admin/nav/Sidebar.vue";

export default {
  components: { NavigationVist, NavigationUser, Sidebar, Header },
  data() {
    return {
      nav: this.$store.state.isLoggedIn,
      Role: "",
    };
  },
  mounted() {
    this.Role = localStorage.getItem("Role");
  },
};
</script>


<style lang="scss">
body {
  background-color: #e5e5e5;
}
</style>
