<template>
  <div>
    <div class="relative pb-16">
      <div class="flex justify-center">
        <div class="rounded mt-[59px] bg-white shadow-xl">
          <div class="p-6 sm:p-16">
            <h1 class="mb-6">Join our community</h1>
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
                      type="email"
                      placeholder="pat@shuffle.dev"
                      v-model="login.Email"
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
                      v-model="login.Password"
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
        Email: "",
        Password: "",
      },
      errors: "",
    };
  },
  methods: {
    loginUser() {
      fetch("http://localhost/fil-rouge-find-pet/UserController/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(this.login),
      })
        .then((Response) => Response.json())
        .then((data) => {
          if (data.id) {
            localStorage.setItem("user_id", data.id);
            localStorage.setItem("Role", "User");
            localStorage.setItem("Email", data.Email);
            this.$router.push("feed");
            this.setRole("User");
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