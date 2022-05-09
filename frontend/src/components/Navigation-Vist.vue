<template>
  <nav id="header" class=" w-full z-10 top-0">
    <div class="text-gray-700 bg-gray-50">
      <div
        :x-data="{ open: false }"
        class="
          flex flex-col
          max-w-screen-xl
          px-4
          mx-auto
          md:items-center md:flex-row md:px-6
          lg:px-8
        "
      >
        <div>
          <div class="p-4 flex flex-row items-center justify-between">
            <img src="../assets/images/logo-icon.png" alt="" />
            <button
              class="md:hidden rounded-lg focus:outline-none focus:shadow-none"
              @click="open = !open"
            >
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path
                  v-show="!open"
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
                <path
                  v-show="open"
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
          </div>
        </div>
        <transition-group>
          <div
            :class="{ hidden: !open, flex: open }"
            class="
              font-sans
              flex-col flex-grow
              pb-4
              mt-4
              lg:mt-0 lg:flex-row
              md:pb-0 md:flex md:flex-row md:items-center
              gap-4
              md:justify-end md:gap-40
              w-full
            "
          >
            <div class="flex gap-6 flex-col md:flex-row">
              <router-link
                to="/"
                class="
                  text-xs
                  uppercase
                  font-bold
                  cursor-pointer
                  hover:opacity-75
                "
              >
                Home
              </router-link>
              <router-link
                to="/support"
                class="
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
              <router-link
                to="/about"
                class="
                  text-xs
                  uppercase
                  font-bold
                  leading-snug
                  cursor-pointer
                  hover:opacity-75
                "
              >
                About
              </router-link>
              <router-link
                to="/contactus"
                class="
                  text-xs
                  uppercase
                  font-bold
                  leading-snug
                  hover:opacity-75
                "
              >
                Contact us
              </router-link>
            </div>
            <div class="flex items-center lg:ml-7 flex-col lg:flex-row">
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
              <router-link to="/login">
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
        </transition-group>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Vist-navbar",
  data() {
    return {
      open: false,
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
.fade-enter-active {
  transition: opacity 0.5s ease;
  animation: fade-in 0.5s;
}
.fade-leave-active {
  transition: opacity 0.5s ease;
  animation: fade-in 0.5s reverse;
  transform: translateY(20px);
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
