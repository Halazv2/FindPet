<template>
  <dialog class="flex fixed inset-0 justify-center bg-black bg-opacity-20 z-20">
    <div
      class="
        user-list
        lg:w-1/2
        w-full
        mx-auto
        bg-white
        rounded-xl
        shadow-xl
        flex flex-col
        py-4
        relative
      "
    >
    <!-- heeder -->
      <header
        class="
          show-more
          block
          w-full
          bottom-0
          mx-auto
          py-2.5
          px-12
          font-bold
          no-underline
          rounded
          mb-4
          duration-300
        "
      >
        <div class="text-center flex justify-between">
          <h6 class="text-blueGray-700 text-xl font-bold">Comments</h6>
          <label
            @click="closeComments"
            class="
              btn btn-sm
              border-none
              btn-circle
              bg-primary-btn
              hover:bg-secondary-brn
              right-2
              top-2
            "
            >✕</label
          >
        </div>
        <hr class="border-b-1 mt-2 border-blueGray-300" />
      </header>
    <!-- heeder -->

      <!-- comment -->
      <div v-for="(comment, index) in comments" :key="index">
        <div
          class="
            user-row
            flex flex-col
            cursor-pointer
            p-4
            duration-300
            sm:py-4 sm:px-8
            w-full
          "
        >
          <SingleComment :comment="comment" />
        </div>
      </div>
      <!-- comment -->

      <!-- add comment -->
      <form class="p-4 absolute w-full bottom-0" @submit.prevent>
        <div class="relative w-full mb-3 flex gap-2">
          <img
            src="https://randomuser.me/api/portraits/men/32.jpg"
            class="rounded-full h-11 w-11"
            alt=""
          />
          <input
            placeholder="Add a comment ..."
            type="text"
            class="
              border-0
              px-3
              py-3
              placeholder-blueGray-300
              text-blueGray-600
              bg-white
              rounded
              text-sm
              shadow
              focus:outline-none focus:ring
              w-full
            "
            v-model="comments.comment"
          />
          <button
            @click="addComment"
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
              shadow
            "
          >
            Send
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
      </form>
      <!-- add comment -->
    </div>
  </dialog>
</template>

<script>
import axios from "axios";
import SingleComment from "./SingleComment.vue";
export default {
  components: {
    SingleComment,
  },
  props: {
    post: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      comments: [
        {
          comment: "",
        },
      ],
    };
  },

  methods: {
    closeComments() {
      this.$emit("closeComments");
    },
    addComment() {
      axios
        .post(
          "http://localhost/fil-rouge-find-pet/CommentController/addComment",
          {
            post_id: this.post.id,
            comment: this.comments.comment,
            user_id: localStorage.getItem("user_id"),
          }
        )
        .then((response) => {
          this.comments.comment = "";
          this.comments.push(response.data);
          this.getComments();
        });
    },
    getComments() {
      axios
        .get(
          "http://localhost/fil-rouge-find-pet/CommentController/getComments?post_id=" +
            this.post.id
        )
        .then((response) => {
          this.comments = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  mounted() {
    this.getComments();
  },
};
</script>

<style>
</style>