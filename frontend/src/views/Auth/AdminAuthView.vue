<template>
  <div>
    <div class="relative pb-16">
      <div class="flex justify-center">
        <div class="rounded mt-[59px] bg-white shadow-xl">
          <div class="p-6 sm:p-16">
            <div class="flex flex-col items-center justify-center">
              <img
                src="../../assets/images/logo1.png"
                alt=""
                width="100"
                class="mb-2"
              />
              <h1 class="mb-6">FindPet - Admin</h1>
            </div>
            <p class="text-red-600 text-center mb-3">{{ errors }}</p>
            <div class="space-y-4">
              <form
                @submit.prevent
                action
                method
                class="w-full max-w-lg text-left"
              >
                <div class="flex flex-col -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-2
                      "
                      for="grid-last-name"
                    >
                      Email <span class="text-red-700">*</span>
                    </label>
                    <input
                      class="
                        appearance-none
                        block
                        w-full
                        text-gray-700
                        border border-gray-200
                        rounded
                        py-3
                        px-4
                        leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500
                      "
                      type="text"
                      placeholder="pat@shuffle.dev"
                      v-model="login.email"
                    />
                  </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-2
                      "
                      for="grid-password"
                    >
                      Password <span class="text-red-700">*</span>
                    </label>
                    <input
                      type="password"
                      class="
                        appearance-none
                        block
                        w-full
                        text-gray-700
                        border border-gray-200
                        rounded
                        py-3
                        px-4
                        mb-3
                        leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500
                      "
                      v-model="login.password"
                    />
                  </div>
                </div>
                <div class="card-actions">
                  <button
                    class="
                      rounded
                      w-[100%]
                      h-[46px]
                      flex
                      items-center
                      justify-center
                      mx-auto
                      bg-primary-btn
                      text-white
                      hover:bg-secondary-brn
                    "
                    @click="loginUser"
                  >
                    Send
                  </button>
                </div>
                <div class="mt-4 grid space-y-4">
                  <button
                    class="
                      group
                      h-12
                      px-6
                      border-2 border-gray-300
                      rounded
                      transition
                      duration-300
                      hover:border-primary-btn
                      focus:bg-blue-50
                      active:bg-secondary-brn
                    "
                  >
                    <div
                      class="
                        relative
                        flex
                        items-center
                        space-x-4
                        justify-center
                      "
                    >
                      <img
                        src="https://tailus.io/sources/blocks/social/preview/images/google.svg"
                        class="absolute left-0 w-5"
                        alt="google logo"
                      />
                      <span
                        class="
                          block
                          w-max
                          font-semibold
                          tracking-wide
                          text-gray-700 text-sm
                          transition
                          duration-300
                          group-hover:text-primary-btn
                          sm:text-base
                        "
                        >Continue with Google</span
                      >
                    </div>
                  </button>
                </div>
              </form>
              <p @click="$emit('shows')" class="cursor-pointer">
                You don't have an account?
                <span class="text-primary-btn">Sign Up</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from "@vue/runtime-core";
export default {
  name: "LoginComp",
  inject: ["setRole"],
  data() {
    return {
      login: {
        email: "",
        password: "",
      },
      errors: "",
    };
  },
  methods: {
    loginUser() {
      fetch("http://localhost/fil-rouge-find-pet/AdminController/adminLogin", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(this.login),
      })
        .then((Response) => Response.json())
        .then((data) => {
          if (data.id) {
            console.log(data);
            localStorage.setItem("Admin_id", data.id);
            localStorage.setItem("Role", "Admin");
            this.$router.push("/admin/dashboard");
            this.setRole("Admin");
          } else if (data.message) {
            this.errors = data.message;
          }
        });
    },
  },
};
</script>

<style lang="scss" scoped>
h1 {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 800;
  font-size: 42px;
  line-height: 51px;
}
</style>