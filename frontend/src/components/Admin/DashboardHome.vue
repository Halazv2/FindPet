<template>
  <div class="">
    <DashboardHeader />
    <div class="mt-2 lg:flex-row flex-col flex lg:gap-2">
      <div
        class="
          bg-white
          dark:bg-gray-800
          p-5
          w-full
          rounded-md
          box-border
          shadow
        "
      >
        <h2 class="font-bold text-lg text-gray-800 dark:text-gray-200">
          Users table
        </h2>
        <p class="text-gray-400 font-lexend font-normal">your users table</p>
        <br />
        <!--- table -->
        <div class="table-responsive">
          <section class="container mx-auto font-mono">
            <div class="w-full mb-8 overflow-hidden">
              <div class="w-full overflow-x-auto">
                <table class="w-full">
                  <thead>
                    <tr
                      class="
                        text-md
                        font-semibold
                        tracking-wide
                        text-left text-gray-900
                        bg-gray-100
                        uppercase
                        border-b border-gray-600
                      "
                    >
                      <th class="px-4 py-2">ID</th>
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Phone Number</th>
                      <th class="px-4 py-3">City</th>
                      <th class="px-4 py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white overflow-y-auto">
                    <tr
                      class="text-gray-700"
                      v-for="(user, index) in users"
                      :key="index"
                    >
                      <td class="px-4 py-3 text-ms font-semibold border">
                        {{ user.id }}
                      </td>
                      <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                          <div
                            class="relative w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              :src="
                                `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
                                user.ProfilePic
                              "
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold text-black">
                              {{ user.FirstName }} {{ user.LastName }}
                            </p>
                            <p class="text-xs text-gray-600">Developer</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-ms font-semibold border">
                        {{ user.Email }}
                      </td>
                      <td class="px-4 py-3 text-xs border">
                        <span
                          class="
                            px-2
                            py-1
                            font-semibold
                            leading-tight
                            text-primary-btn
                            bg-orange-200
                            rounded-sm
                          "
                        >
                          {{ user.PhoneNumber }}
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm border">{{ user.City }}</td>
                      <td class="px-4 py-3 text-sm border">
                        <a class="cursor-pointer text-red-600" @click="deleteUser(user.id)">Delete</a>
                        &nbsp;
                        <a class="cursor-pointer text-blue-600">Contact</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
        <hr />
        <br />
        <div class="wrapper-button mt-3">
          <button
            class="
              uppercase
              float-right
              -mt-7
              border-b border-red-600
              text-red-600
            "
          >
            Sales Report
          </button>
        </div>
      </div>

      <div
        class="
          bg-white
          dark:bg-gray-800
          p-5
          lg:w-96 lg:mt-0
          mt-4
          shadow
          rounded-md
          w-full
        "
        style="width: 100%"
      >
        <h2 class="dark:text-gray-200 text-xl font-bold">New Users</h2>
        <p class="text-gray-400">This is list if your new users.</p>
        <div class="mt-4 grid grid-cols-1 gap-4">
          <div
            class="w-full box-border flex items-center gap-4"
            v-for="(last, index) in lastThree"
            :key="index"
          >
            <span>
              <img
                :src="
                  `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
                  last.ProfilePic
                "
                alt=""
                class="rounded-full w-8 h-8"
              />
            </span>
            <span class="text-left">
              <h1 class="font-bold text-xl dark:text-gray-200">
                {{ last.FirstName }} {{ last.LastName }}
              </h1>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";
import { onMounted, ref } from "vue";
import DashboardHeader from "./DashboardHeader.vue";

export default {
  components: {
    Icon,
    DashboardHeader,
  },
  name: "dashboard-card",
  data() {
    return {
      users: [],
      lastThree: [],
    };
  },
  methods: {
    getUsers() {
      fetch("http://localhost/fil-rouge-find-pet/AdminController/getAllUsers", {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => response.json())
        .then((data) => {
          this.users = data;
        });
    },
    getlast3() {
      fetch(
        "http://localhost/fil-rouge-find-pet/AdminController/getlastthreeusers",
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }
      )
        .then((response) => response.json())
        .then((data) => {
          this.lastThree = data;
        });
    },
    deleteUser(id) {
      fetch(
        "http://localhost/fil-rouge-find-pet/AdminController/deleteUser/" + id,
        {
          method: "DELETE",
          headers: {
            "Content-Type": "application/json",
          },
        }
      )
        .then((response) => response.json())
        .then((data) => {
          this.getUsers();
        });
    },
  },
  mounted() {
    this.getUsers();
    this.getlast3();
  },
};
</script>

<style lang="scss" scoped>
</style>


// <script setup>
// import { defineComponent } from '@vue/composition-api'

// const users = ref([]);
// const getUsers = async () => {
//   const response = await fetch(
//     "http://localhost/fil-rouge-find-pet/AdminController/getAllUsers",
//     {
//       method: "GET",
//       headers: {
//         "Content-Type": "application/json",
//       },
//     }
//   );
//   const data = await response.json();
//   users.value = data;
// };
// getUsers();

// const users = ref([])

// onMounted(()=>{

// })

// const taha = computed(()=> {
//   return users.value
// })

// jkhkjhkj
// khgih()
// jhsiqjbdijqd
// qqsuhiqsdn()

//
</script>
