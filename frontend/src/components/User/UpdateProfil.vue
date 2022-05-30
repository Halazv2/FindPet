<template>
  <div>
    <div class="modal-box relative">
      <div class="modal-action">
        <a
          href="#"
          ref="closeModal"
          for="my-modal-3"
          class="
            btn btn-error btn-sm btn-circle
            absolute
            right-2
            top-2
            bg-primary-btn
            hover:bg-secondary-brn
          "
          >✕</a
        >
      </div>
      <h3 class="font-bold text-lg">Update Account informations</h3>
      <form @submit.prevent action method enctype="multipart/form-data">
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
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              text-gray-800
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
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
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              text-gray-800
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
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
            title="Phone number with 7-9 and remaing 9 digit with 0-9"
            v-model="user.PhoneNumber"
            class="
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              text-gray-800
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
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
            Email
          </label>
          <input
            type="email"
            v-model="user.Email"
            class="
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              text-gray-800
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
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
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              text-gray-800
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
            "
            v-model="user.City"
          >
            <option disabled selected>Whare are you from?</option>
            <option v-for="city in Cities" :key="city">{{ city }}</option>
          </select>
        </div>
        <div class="flex w-full items-center justify-between">
          <div class="">
            <label
              for="dropzone-file"
              class="
                flex flex-col
                justify-center
                items-center
                rounded-lg
                cursor-pointer
              "
            >
              <span
                class="
                  flex
                  items-center
                  transition
                  ease-out
                  duration-300
                  hover:bg-secondary-brn hover:text-white
                  bg-primary-btn
                  w-8
                  h-8
                  px-2
                  rounded-full
                  text-blue-100
                  cursor-pointer
                "
              >
                <svg
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  stroke="currentColor"
                  stroke-width="2"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="css-i6dzq1"
                >
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                  <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
              </span>
              <input
                name="Image"
                id="dropzone-file"
                @change="onFileChange"
                type="file"
                class="hidden"
              />
            </label>
          </div>

          <div class="modal-action">
            <button
              @click="UpadateUser(user.id)"
              class="
                flex
                items-center
                py-2
                px-4
                rounded-lg
                text-sm
                bg-primary-btn
                hover:bg-secondary-brn
                text-white
                shadow-lg
              "
            >
              Save
              <svg
                class="ml-1"
                viewBox="0 0 24 24"
                width="16"
                height="16"
                stroke="currentColor"
                stroke-width="2"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <line x1="22" y1="2" x2="11" y2="13"></line>
                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { ref } from "vue";
export default {
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      Cities: [],
      ProfilePic: "",
    };
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.ProfilePic = file;
      // console.log(this.user.ProfilePic);
    },
    UpadateUser(id) {
      const formData = new FormData();
      formData.append("FirstName", this.user.FirstName);
      formData.append("LastName", this.user.LastName);
      formData.append("Email", this.user.Email);
      formData.append("Password", this.user.Password);
      formData.append("PhoneNumber", this.user.PhoneNumber);
      formData.append("City", this.user.City);

      if (this.ProfilePic) {
        formData.append("ProfilePic", this.ProfilePic);
      } else {
        formData.append("ProfilePic", this.user.ProfilePic);
      }

      axios
        .post(
          `http://localhost/fil-rouge-find-pet/UserController/updateUser?id=${id}`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((res) => {
          console.log(res);
          const closeModal = this.$refs.closeModal;
          closeModal.click();
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getcity() {
      this.Cities = require("../../assets/js/city.json").map(
        (city) => city.city
      );
    },
  },

  mounted() {
    this.getcity();
  },
};
</script>

<style lang="scss" scoped>

</style>