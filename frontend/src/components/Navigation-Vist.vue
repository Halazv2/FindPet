<template>
  <nav class="relative flex px-2 py-3">
    <div class="container mx-auto flex flex-wrap justify-evenly">
      <div
        class="
          w-full
          relative
          lg:w-auto
          px-4
          justify-between
          flex
          items-center
          lg:block
        "
      >
        <img src="../assets/images/logo-icon.png" alt="" />
        <button
          class="
            cursor-pointer
            text-xl
            leading-none
            px-3
            py-1
            border border-solid
            rounded
            block
            lg:hidden
            outline-none
          "
          v-on:click="toggleNavbar()"
        >
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <div
        v-bind:class="{ hidden: !showMenu, flex: showMenu }"
        class="nav-res lg:flex lg:items-center lg:gap-11"
      >
        <ul class="flex lg:flex-row list-none text-center lg:items-center">
          <li class="nav-item">
            <router-link
              to="/"
              class="
                px-3
                py-2
                text-xs
                uppercase
                font-bold
                cursor-pointer
                hover:opacity-75
              "
            >
              Home
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              to="/support"
              class="
                px-3
                py-2
                text-xs
                uppercase
                font-bold
                leading-snug
                cursor-pointer
                hover:opacity-75
              "
            >
              Support us
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
            to="/about"
              class="
                px-3
                py-2
                text-xs
                uppercase
                font-bold
                leading-snug
                cursor-pointer
                hover:opacity-75
              "
            >
              <span class="ml-2">About</span>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
            to="/contactus"
              class="
                px-3
                py-2
                text-xs
                uppercase
                font-bold
                leading-snug
                hover:opacity-75
              "
            >
              <span class="ml-2">Contact us</span>
            </router-link>
          </li>
        </ul>
          <div class="numberNbutt flex items-center lg:ml-7">
            <a
              class="
                text-sm
                font-bold
                leading-relaxed
                inline-block
                mr-4
                py-2
                whitespace-nowrap
                uppercase
              "
              ><i class="fa-solid fa-phone"></i> +212 7 00 94 07 62</a
            >
            <router-link to="/AuthView">
            <button
              class="
                rounded-full
                w-[142px]
                h-[46px]
                bg-primary-btn
                text-white
                hover:bg-secondary-brn
              "
            >
            login
            </button>
            </router-link>
          </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Vist-navbar",
  data() {
    return {
      showMenu: false,
    };
  },
  methods: {
    toggleNavbar() {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>
<style lang="scss" scoped>
@media (max-width: 768px) {
  .nav-res {
    position: absolute;
    right: 2px;
    top: 60px;
    background-color: #f7c333;
    border-radius: 10px;
    display: hidden;
    width: 35%;
    height: 100vh;
    padding: 30px;
    flex-direction: column;
    ul,
    .numberNbutt {
      flex-direction: column;
    }
  }
}
</style>
