<template>
  <!-- sidebar -->
  <nav
    class="
      sidebar
      bg-white
      dark:bg-gray-800
      fixed
      h-screen
      lg:pr-0
      pr-8
      text-gray-700
      dark:text-gray-200
    "
  >
    <!-- sidebar head -->
    <div class="sidebar-head p-4">
      <router-link to="/" exact>
        <img src="../../../assets/images/logo1.png" alt="logo" class="w-16" />
      </router-link>
      <button class="lg:hidden block float-right -mt-7" @click="sidebarToggle">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          aria-hidden="true"
          role="img"
          width="25px"
          height="25px"
          preserveAspectRatio="xMidYMid meet"
          viewBox="0 0 32 32"
        >
          <path
            fill="currentColor"
            d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z"
          />
        </svg>
      </button>
    </div>
    <!-- sidebar list -->
    <div class="sidebar-list p-4 mt-4">
      <p class="font-medium">Menu</p>
      <div class="wrap-item mt-4">
        <div class="item" v-for="(item, index) in NavElements" :key="index">
          <router-link
            :to="item.link"
            class="
              w-full
              flex
              text-left
              rounded-md
              box-border
              p-3
              hover:bg-gray-100
              dark:hover:bg-gray-700
            "
          >
            <span class="mr-3 text-xl"><Icon :icon="item.icon" width="22"  /></span>
            <span class="w-full"> {{ item.name }} </span>
          </router-link>
        </div>
      </div>
      <p class="font-medium mt-4">User Menu</p>
      <div class="item" v-for="(item, index) in UserNavElements" :key="index">
        <a
          @click="regorecte(item.link)"
          class="
            w-full
            flex
            text-left
            rounded-md
            box-border
            p-3
            hover:bg-gray-100
            dark:hover:bg-gray-700
          "
        >
          <span class="mr-3 text-xl"><Icon :icon="item.icon" width="22" /></span>
          <span class="w-full"> {{ item.name }} </span>
        </a>
      </div>
      <div v-if="Role == 'Admin'">
        <p class="font-medium">Admin Menu</p>
        <div class="item" v-for="(item, index) in adminNavElements" :key="index">
          <a
            @click="regorecte(item.link)"
            class="
              w-full
              flex
              text-left
              rounded-md
              box-border
              items-center
              p-3
              hover:bg-gray-100
              dark:hover:bg-gray-700
            "
          >
            <span class="mr-3 text-xl"><Icon :icon="item.icon" width="22" /></span>
            <span class="w-full"> {{ item.name }} </span>
          </a>
        </div>
      </div>
      <content  class="flex grid-cols-6 absolute bottom-0 w-full" v-if="Role == 'User'">
        <div class="">
          <img
            src="../../../assets/images/catMatch.png"
            class="h-14 w-14 rounded-full"
          />
        </div>

        <div class="col-span-3 px-3 font-semibold flex flex-col" >
          <div class="">Riven Ziani</div>
          <div class="text-sm text-gray-400 font-light">@RivenZiani</div>
        </div>
      </content>
    </div>
  </nav>
</template>
<style>
</style>
<script>
import { Icon } from "@iconify/vue";
import MenuAccordion from "./MenuAccordion.vue";
export default {
  components: {
    Icon,
    MenuAccordion,
  },
  data() {
    return {
      Role: localStorage.getItem("Role"),
      NavElements: [
        {
          name: "Home",
          icon: "bxs:home",                                
          link: "/",
        },
        {
          name: "About",
          icon: "mdi:account-group",
          link: "/about",
        },
        {
          name: "Support us",
          icon: "bxs:donate-heart",
          link: "/support",
        },
        {
          name: "Contact us",
          icon: "mdi:tooltip-text",
          link: "/contactus",
        },
      ],

      UserNavElements: [
        {
          name: "Feed",
          icon: "bi:table",
          link: "/feed",
        },
        {
          name: "Events",
          icon: "carbon:data-table",
          link: "/events",
        },
      ],
      adminNavElements: [
        {
          name: "Dashboard",
          icon: "eos-icons:admin",
          link: "/admin/dashboard",
        },
        {
          name: "Volunteers Table",
          icon: "carbon:data-table",
          link: "/admin/EventAdmin",
        },
      ]
    };
  },
  methods: {
    sidebarToggle() {
      document.querySelector(".flex-sidebar").classList.add("hidden");
    },
    regorecte(link) {
      this.$router.push(link);
    },
    
  },
  mounted() {},
};
</script>
