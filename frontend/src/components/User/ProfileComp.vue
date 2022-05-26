<template>
  <div class="flex flex-col justify-between">
    <div class="text-gray-600 dark:text-white pb-8 w-full">
      <div class="flex flex-col gap-1 text-center">
        <ProfileCard :user="user" />
        <!-- <div
          class="
            bg-primary-btn
            h-80
            relative
            w-[90%]
            rounded-2xl
            justify-evenly
            flex
            gap-1
            items-center
          "
        >
          <img
            class="h-40 w-40 bg-white p-2 rounded-full"
            :src="
              `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
              user.ProfilePic
            "
            alt=""
          />
          <div class="">
            <p class="font-semibold">
              {{ user.FirstName }} {{ user.LastName }}
            </p>
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
              <a
                href="#"
                class="
                  flex
                  h-20
                  w-40
                  flex-col
                  items-center
                  justify-center
                  rounded-md
                  border border-dashed border-gray-200
                  transition-colors
                  duration-100
                  ease-in-out
                  hover:border-gray-400/80
                "
              >
                <div class="flex flex-row items-center justify-center">
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

                  <span class="font-bold text-gray-600">{{ postCount }} </span>
                </div>

                <div class="mt-2 text-sm text-gray-400">Posts</div>
              </a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <div class="px-5 w-full">
      <h1 class="py-5 lg:text-left text-center dark:text-white">MY POSTS</h1>
      <div class="flex justify-around items-center flex-col lg:flex-row">
        <div class="overflow-y-auto h-[670px]">
          <UserPost
            v-for="post in posts.filter((post) => post.UserID == user.id)"
            :key="post.id"
            :post="post"
            @getPosts="getPosts"
          />
        </div>
      </div>
      <!-- Delete account Model -->
      <!-- <input type="checkbox" id="my-modal-6" class="modal-toggle" />
      <delete-account class="modal modal-bottom sm:modal-middle" /> -->
      <!-- Update account Model -->
    </div>
  </div>
</template>

<script>
import axios from "axios";
import DeleteAccount from "./ModalDeleteAccount.vue";
import UserPost from "../User/Feed/FeedPost.vue";
import ProfileCard from "./ProfileleftSide.vue";
export default {
  components: { DeleteAccount, UserPost, ProfileCard },
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
      id: localStorage.getItem("user_id"),
      errors: {},
      posts: [],
    };
  },
  methods: {
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

    getPosts() {
      fetch("http://localhost/fil-rouge-find-pet/FeedController/getFeed", {
        method: "GET",
      })
        .then((result) => {
          return result.json();
        })
        .then((reponse) => {
          this.posts = reponse.reverse();
        });
    },
  },
  mounted() {
    this.getuser();
    this.getPosts();
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
h1 {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 800;
  font-size: 42px;
  line-height: 51px;
}
</style>