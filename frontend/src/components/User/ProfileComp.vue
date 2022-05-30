<template>
  <div class="flex flex-col justify-between">
    <div class="text-gray-600 dark:text-white pb-8 w-full">
      <div class="flex flex-col gap-1 text-center">
        <ProfileCard :user="user" />
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