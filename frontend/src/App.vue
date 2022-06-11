<template>
  <div>
    <div
      class="flex bg-packed font-lexend dark:bg-gray-900"
      v-if="Role == 'Admin' || Role == 'User'"
    >
      <div
        id="sidebar-scroll"
        ref="flex_sidebar"
        class="
          flex-sidebar
          lg:flex-auto
          w-sidebar
          lg:block
          hidden
          lg:w-[20%]
          bg-white
          dark:bg-gray-800
          border-r-2
          dark:border-gray-700
          lg:z-0
          z-40
          lg:relative
          h-inherit
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
      <navigation-vist />
      <router-view />
    </div>
  </div>
</template>
<script>
import NavigationUser from "./components/Navigation-User.vue";
import NavigationVist from "./components/Navigation-Vist.vue";
import Header from "@/components/Header.vue";
import Sidebar from "@/components/Admin/nav/Sidebar.vue";
import { computed } from "@vue/runtime-core";
// import { computed, ref } from "vue";
export default {
  components: { NavigationVist, NavigationUser, Sidebar, Header },
  data() {
    return {
      nav: this.$store.state.isLoggedIn,
      Role: localStorage.getItem("Role"),
      user_id: localStorage.getItem("user_id"),
    };
  },
  provide() {
    return {
      setRole: this.setRole,
      Role: computed(() => {
        return this.Role;
      }),
    };
  },
  methods: {
    setRole(role) {
      this.Role = role;
    },
  },
 
  mounted() {
    // if (this.user_id) {
    //   this.$store.state.Connected = true;
    // }
  },
};

</script>


<style lang="scss">
body {
  background-color: #e5e5e5;
  height: screen height;
}
</style>
