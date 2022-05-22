<template>
  <div class="">
    <div class="text-gray-600 dark:text-white pb-8">
      <div class="flex flex-col gap-1 text-center items-center">
        <div
          class="
            bg-primary-btn
            lg:h-80
            h-40
            relative
            w-[90%]
            mt-10
            rounded-2xl
            justify-center
            flex
            items-end
          "
        >
          <img
            class="image absolute h-40 w-40 bg-white p-2 rounded-full"
            src="../../assets/images/riven.jpeg"
            alt=""
          />
        </div>
        <div class="mt-24">
          <p class="font-semibold">{{ user.FirstName }} {{ user.LastName }}</p>
          <div
            class="
              text-sm
              leading-normal
              text-gray-400
              flex
              justify-center
              items-center
            "
          >
            <svg
              viewBox="0 0 24 24"
              class="mr-1"
              width="16"
              height="16"
              stroke="currentColor"
              stroke-width="2"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            {{ user.City }}
          </div>
        </div>
      </div>
    </div>
    <div class="py-16">
      <div class="flex justify-around items-center flex-col lg:flex-row">
        <div class="flex gap-7">
          <div class="text-center lg:text-left text-blue-600 font-semibold">
            <a href="#Update-Account">Update Account</a>
          </div>
          <div class="text-center lg:text-left text-red-600 font-semibold">
            <label for="my-modal-6" class="cursor-pointer"
              >Delete Account
            </label>
          </div>
        </div>

        <!-- Delete account Model -->
        <input type="checkbox" id="my-modal-6" class="modal-toggle" />
        <delete-account class="modal modal-bottom sm:modal-middle" />
        <!-- Update account Model -->
        <div class="modal" id="Update-Account">
          <div class="modal-box relative">
            <div class="modal-action">
              <a
                href="#"
                for="my-modal-3"
                class="btn btn-error btn-sm btn-circle absolute right-2 top-2"
                >✕</a
              >
            </div>
            <h3 class="font-bold text-lg">Update Account informations</h3>
            <form>
              <div class="my-6">
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
                  First Name
                </label>
                <input
                  type="text"
                  v-model="user.FirstName"
                  class="
                    w-full
                    rounded
                    p-3
                    text-gray-800
                    dark:text-gray-50 dark:bg-slate-700
                    border-gray-500
                    dark:border-slate-600
                    outline-none
                    focus-visible:shadow-none
                    focus:border-primary
                  "
                />
              </div>
              <div class="my-6">
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
                  Last Name
                </label>
                <input
                  type="text"
                  v-model="user.LastName"
                  class="
                    w-full
                    rounded
                    p-3
                    text-gray-800
                    dark:text-gray-50 dark:bg-slate-700
                    border-gray-500
                    dark:border-slate-600
                    outline-none
                    focus-visible:shadow-none
                    focus:border-primary
                  "
                />
              </div>
              <div class="my-6">
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
                  Phone Number
                </label>
                <input
                  type="text"
                  v-model="user.PhoneNumber"
                  class="
                    w-full
                    rounded
                    p-3
                    text-gray-800
                    dark:text-gray-50 dark:bg-slate-700
                    border-gray-500
                    dark:border-slate-600
                    outline-none
                    focus-visible:shadow-none
                    focus:border-primary
                  "
                />
              </div>
              <div class="my-6">
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
                  Phone Number
                </label>
                <input
                  type="text"
                  v-model="user.Email"
                  class="
                    w-full
                    rounded
                    p-3
                    text-gray-800
                    dark:text-gray-50 dark:bg-slate-700
                    border-gray-500
                    dark:border-slate-600
                    outline-none
                    focus-visible:shadow-none
                    focus:border-primary
                  "
                />
              </div>
              <div class="my-6">
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
                  Phone Number
                </label>
                <input
                  type="password"
                  v-model="user.Password"
                  class="
                    w-full
                    rounded
                    p-3
                    text-gray-800
                    dark:text-gray-50 dark:bg-slate-700
                    border-gray-500
                    dark:border-slate-600
                    outline-none
                    focus-visible:shadow-none
                    focus:border-primary
                  "
                />
              </div>
              <div class="my-6">
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
                  City
                </label>
                <select
                  class="
                    select select-bordered
                    w-full
                    text-gray-800
                    dark:text-gray-50 dark:bg-slate-700
                    border-gray-500
                    dark:border-slate-600
                  "
                  v-model="user.City"
                >
                  <option disabled selected>Whare are you from?</option>
                  <option v-for="city in Cities" :key="city">{{ city }}</option>
                </select>
              </div>
              <div class="my-6">
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
                  Profile pic
                </label>
                <input
                  type="file"
                  class="
                    w-full
                    rounded
                    p-3
                    text-gray-800
                    dark:text-gray-50 dark:bg-slate-700
                    border-gray-500
                    dark:bg-secondary-brt
                    outline-none
                    focus-visible:shadow-none
                    focus:border-primary
                  "
                />
              </div>

              <div>
                <div class="modal-action">
                  <a
                    @click="UpadateUser(user.id)"
                    class="
                      btn
                      bg-primary-btn
                      hover:bg-secondary-brn
                      border-none
                      rounded-full
                    "
                    >Save</a
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import DeleteAccount from "./ModalDeleteAccount.vue";
import userData from "./city.json";
export default {
  components: { DeleteAccount },
  name: "ProfileComp",

  data() {
    return {
      user: {
        id: "",
        FirstName: "",
        LastName: "",
        Email: "",
        Password: "",
        PhoneNumber: "",
        City: "",
        ProfilePic: "",
      },
      userData: userData,
      Cities: [],
      id: localStorage.getItem("user_id"),
      errors: {},
    };
  },
  methods: {
    UpadateUser(id) {
      fetch(`http://localhost/fil-rouge-find-pet/UserController/updateUser?id=`+id, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(this.user),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data) {
            console.log(data);
          }
        });
    },
    getuser() {
      axios
        .get(
          `http://localhost/fil-rouge-find-pet/UserController/getUser?id=` +
            this.id
        )
        .then((res) => {
          this.user = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getcity() {
      this.Cities = require("./city.json").map((city) => city.city);
      // this.Cities.forEach((city) => {
      //   console.log(city);
      // });
    },
  },
  mounted() {
    this.getuser();
    this.getcity();
  },
};
</script>

<style lang="scss" scoped>
//center the image in the div bottom
.image {
  left: 50%;
  top: 83%;
  transform: translate(-50%, -15%);
}
</style>