<template>
  <div class="wrapper-card flex gap-5 mt-4 flex-col lg:flex-row">
    <!-- ------------------------------------------------------------------------------  -->
    <div
      class="
        card
        bg-white
        dark:bg-gray-800
        w-full
        h-full
        rounded-md
        p-5
        shadow
        flex
      "
    >
      <div class="p-2 max-w-sm flex">
        <div class="flex items-center">
          <div
            class="
              bg-orange-200
              rounded-full
              w-14
              h-14
              text-lg
              p-3
              text-orange-600
              flex
              items-center
              justify-center
              mx-auto
            "
          >
            <Icon icon="bi:file-post" width="200" />
          </div>
        </div>

        <div class="block p-2 w-full">
          <p class="font-semibold text-gray-900 dark:text-gray-200 text-xl">
            {{ countP }}
          </p>
          <h2 class="font-normal text-gray-400 text-md mt-1">Total Posts</h2>
        </div>
      </div>
    </div>
    <div
      class="
        card
        bg-white
        dark:bg-gray-800
        w-full
        h-full
        rounded-md
        p-5
        shadow
        flex
      "
    >
      <div class="p-2 max-w-sm flex">
        <div class="flex items-center">
          <div
            class="
              bg-green-200
              rounded-full
              w-14
              h-14
              text-lg
              p-3
              text-green-600
              mx-auto
              flex
              items-center
              justify-center
            "
          >
            <Icon icon="fa6-solid:users" width="200" />
          </div>
        </div>

        <div class="block p-2 w-full">
          <p class="font-semibold text-gray-900 dark:text-gray-200 text-xl">
            {{ countU }}
          </p>
          <h2 class="font-normal text-gray-400 text-md mt-1">Total Users</h2>
        </div>
      </div>
    </div>
    <!-- ------------------------------------------------------------------------------  -->

    <div
      class="
        card
        bg-white
        dark:bg-gray-800
        w-full
        h-full
        rounded-md
        p-5
        shadow
        flex
      "
    >
      <div class="p-2 max-w-sm flex">
        <div class="flex items-center">
          <div
            class="
              bg-purple-200
              rounded-full
              w-14
              h-14
              text-lg
              p-3
              text-purple-600
              mx-auto
            "
          >
            <span class="">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                role="img"
                width="30px"
                height="30px"
                preserveAspectRatio="xMidYMid meet"
                viewBox="0 0 16 16"
              >
                <g fill="currentColor">
                  <path d="M15 13v1H1.5l-.5-.5V0h1v13h13Z" />
                  <path
                    d="M13 3.207L7.854 8.354h-.708L5.5 6.707l-3.646 3.647l-.708-.708l4-4h.708L7.5 7.293l5.146-5.147h.707l2 2l-.707.708L13 3.207Z"
                  />
                </g>
              </svg>
            </span>
          </div>
        </div>
        <!-- ------------------------------------------------------------------------------  -->
        <div class="block p-2 w-full">
          <p class="font-semibold text-gray-900 dark:text-gray-200 text-xl">
            {{countE}}
          </p>
          <h2 class="font-normal text-gray-400 text-md mt-1">Total Event</h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";

export default {
  components: {
    Icon,
  },
  data() {
    return {
      countP: 0,
      countU: 0,
      countE: 0,
    };
  },
  methods: {
    countPosts() {
      fetch("http://localhost/fil-rouge-find-pet/AdminController/countPosts", {
        method: "GET",
      })
        .then((res) => res.json())
        .then((data) => {
          this.countP = data.count;
        });
    },
    countUsers() {
      fetch("http://localhost/fil-rouge-find-pet/AdminController/countUsers", {
        method: "GET",
      })
        .then((res) => res.json())
        .then((data) => {
          this.countU = data.count;
        });
    },
    countEvents() {
      fetch("http://localhost/fil-rouge-find-pet/AdminController/countEvents", {
        method: "GET",
      })
        .then((res) => res.json())
        .then((data) => {
          this.countE = data.count;
        });
    },
  },
  mounted() {
    this.countPosts();
    this.countUsers();
    this.countEvents();
  },
};
</script>

<style>
</style>