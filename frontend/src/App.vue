<template>
  <div>
    <div class="flex bg-packed font-lexend dark:bg-gray-900" v-if="Role == 'User'" >
      <div
        id="sidebar-scroll"
        ref="flex_sidebar"
        class="
          flex-sidebar
          lg:flex-auto
          w-sidebar
          lg:block
          hidden
          w-full
          lg:w-[20%]
          bg-white
          dark:bg-gray-800
          border-r-2
          dark:border-gray-700
          lg:z-0
          z-40
          overflow-auto
          lg:relative
          h-auto
          fixed
        "
      >
        <Sidebar />
      </div>
      <div class="flex-auto w-full sticky" id="body-scroll">
        <Header />
        <router-view />
      </div>
    </div>
    <div v-if="!Role">
      <navigation-vist  />
      <router-view />
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
    // this.$router.afterEach((to, from) => {
    //   this.$refs.flex_sidebar.classList.add("hidden");
    // });
  },
};
</script>


<style lang="scss">
body {
  background-color: #e5e5e5;
}
</style>
