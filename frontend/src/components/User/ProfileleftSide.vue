<template>
  <div class="grid">
    <!-- User Profile Tab Card -->
    <div
      class="
        flex
        lg:flex-row
        flex-col
        w-full
        bg-white
        justify-center
        items-center
        dark:bg-gray-800
        p-6
        relative
      "
    >
      <!-- Avaar Container -->
      <div class="relative">
        <!-- User Avatar -->
        <img
          class="w-40 h-40 rounded-md object-cover"
          :src="
            `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
            user.ProfilePic
          "
          alt="User Profile Picture"
        />

        <!-- Online Status Dot -->
        <div
          class="
            absolute
            -right-3
            bottom-5
            h-5
            w-5
            sm:top-2
            rounded-full
            border-4 border-white
            dark:border-gray-800
            bg-green-400
            sm:invisible
            md:visible
          "
          title="User is online"
        ></div>
      </div>

      <!-- Meta Body -->
      <div class="flex flex-col px-6 lg:items-start items-center">
        <!-- Username Container -->
        <div class="flex h-8 flex-row">
          <!-- Username -->
          <a>
            <h2 class="text-lg font-semibold">
              {{ user.FirstName }} {{ user.LastName }}
            </h2>
          </a>
        </div>

        <!-- Meta Badges -->
        <div class="my-2 flex flex-row space-x-2">
          <!-- Badge Location -->
          <div class="flex flex-row">
            <svg
              class="mr-2 h-4 w-4 fill-gray-500/80"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              version="1.1"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <path
                d="M12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5M12,2A7,7 0 0,1 19,9C19,14.25 12,22 12,22C12,22 5,14.25 5,9A7,7 0 0,1 12,2M12,4A5,5 0 0,0 7,9C7,10 7,12 12,18.71C17,12 17,10 17,9A5,5 0 0,0 12,4Z"
              />
            </svg>

            <div class="text-xs text-gray-400/80 hover:text-gray-400">
              {{ user.City }}
            </div>
          </div>

          <!-- Badge Email-->
          <div class="flex flex-row">
            <svg
              class="mr-2 h-4 w-4 fill-gray-500/80"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              version="1.1"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <path
                d="M12,15C12.81,15 13.5,14.7 14.11,14.11C14.7,13.5 15,12.81 15,12C15,11.19 14.7,10.5 14.11,9.89C13.5,9.3 12.81,9 12,9C11.19,9 10.5,9.3 9.89,9.89C9.3,10.5 9,11.19 9,12C9,12.81 9.3,13.5 9.89,14.11C10.5,14.7 11.19,15 12,15M12,2C14.75,2 17.1,3 19.05,4.95C21,6.9 22,9.25 22,12V13.45C22,14.45 21.65,15.3 21,16C20.3,16.67 19.5,17 18.5,17C17.3,17 16.31,16.5 15.56,15.5C14.56,16.5 13.38,17 12,17C10.63,17 9.45,16.5 8.46,15.54C7.5,14.55 7,13.38 7,12C7,10.63 7.5,9.45 8.46,8.46C9.45,7.5 10.63,7 12,7C13.38,7 14.55,7.5 15.54,8.46C16.5,9.45 17,10.63 17,12V13.45C17,13.86 17.16,14.22 17.46,14.53C17.76,14.84 18.11,15 18.5,15C18.92,15 19.27,14.84 19.57,14.53C19.87,14.22 20,13.86 20,13.45V12C20,9.81 19.23,7.93 17.65,6.35C16.07,4.77 14.19,4 12,4C9.81,4 7.93,4.77 6.35,6.35C4.77,7.93 4,9.81 4,12C4,14.19 4.77,16.07 6.35,17.65C7.93,19.23 9.81,20 12,20H17V22H12C9.25,22 6.9,21 4.95,19.05C3,17.1 2,14.75 2,12C2,9.25 3,6.9 4.95,4.95C6.9,3 9.25,2 12,2Z"
              />
            </svg>

            <div class="text-xs text-gray-400/80 hover:text-gray-400">
              {{ user.Email }}
            </div>
          </div>
        </div>

        <!-- Mini Cards -->
        <div class="mt-2 flex flex-row items-center space-x-5">
          <!-- Comments -->
          <a
            href="#"
            class="
              flex
              h-20
              w-40
              flex-col
              lg:items-start lg:justify-start
              rounded-md
            "
          >
            <div class="flex flex-row items-center justify-center">
              <span class="font-bold text-gray-600"> {{ postCount }} </span>
              &nbsp;
              <svg
                class="mr-3 fill-gray-500/95"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  d="M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7A2,2 0 0,1 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.89 12.76,23 12.5,23H12M13,17V20.08L16.08,17H21V7H7V17H13M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15M9,9H19V11H9V9M9,13H17V15H9V13Z"
                />
              </svg>
            </div>

            <div class="mt-2 text-sm text-gray-400">Posts</div>
          </a>
        </div>
      </div>

      <!-- Right Actions Container -->
      <div class="w-100 flex flex-grow flex-col lg:items-end lg:justify-start">
        <div class="flex lg:flex-row space-x-3">
          <!-- Follow Button -->
          <button
            class="
              flex
              rounded-md
              bg-primary-btn
              py-2
              px-4
              text-white
              transition-all
              duration-150
              ease-in-out
              hover:bg-secondary-brn
              justify-center
              items-center
            "
          >
            <Icon icon="bxs:edit" />
            <a href="#Update-Account" class="lg:block hidden">Update Profile</a>
          </button>

          <!-- More Actions Button -->
          <UpdateModel :user="user"  class="modal" id="Update-Account" />
          <button
            @click="deleteModal()"
            class="
              flex
              rounded-md
              bg-gray-100
              py-2
              px-1
              text-white
              transition-all
              duration-150
              ease-in-out
              hover:bg-gray-200
            "
          >
            <svg
              class="fill-gray-500"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              version="1.1"
              width="24"
              height="24"
              viewBox="0 0 24 24"
            >
              <path
                d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z"
              />
            </svg>
          </button>
          <!-- <div v-show="deleteModal">
            <a> Delete </a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { Icon } from "@iconify/vue";
import UpdateModel from "./UpdateProfil.vue";
export default {
  components: {
    Icon,
    UpdateModel,
  },
  props: {
    user: {
      type: Object,
      required: true,
    },
    data() {
      return {
        postCount: 0,
        deleteModal: false,
        updateModel: false,
      };
    },
  },
  methods: {
    deleteModal() {
      this.deleteModal = !this.deleteModal;
    },
    countUserPosts() {
      const user_id = localStorage.getItem("user_id");
      const url = `http://localhost/fil-rouge-find-pet/FeedController/countUserPosts?id=${user_id}`;
      axios
        .get(url)
        .then((res) => {
          this.postCount = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updateProfile() {
      // console.log("kqsjdqk");
      this.updateModel = !this.updateModel;
    },
  },
  mounted() {
    this.countUserPosts();
  },
};
</script>

<style>
</style>