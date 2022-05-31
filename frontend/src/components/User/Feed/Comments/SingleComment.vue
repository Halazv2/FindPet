<template>
  <!--User row -->
  <div class="flex relative justify-between w-full">
    <div
      class="
        user
        flex
        sm:flex-row sm:text-left
      "
    >
      <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-2.5">
        <img
          class="avatar rounded-full w-16 h-16"
          :src="
            `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
            comment.ProfilePic
          "
        />
      </div>
      <div class="user-body flex flex-col">
        <a href="#" class="title font-semibold no-underline ">
          {{ comment.FirstName }} 
        </a> 
        <div class="skills flex flex-col">
          <span class="subtitle text-slate-500 text-left">
            {{ comment.comment }}
          </span>
        </div>
      </div>
    </div>
    <!--User row -->
    <div class="relative" @click="CommentsOptions">
      <svg
        class="h-4 fill-current text-grey-dark cursor-pointer"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
      >
        <path
          d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z"
        />
      </svg>
      <transition name="fade" v-if="commentsOptions">
        <div
          ref="menu"
          class="
            block
            absolute
            right-10
            z-10
            w-44
            border
            dark:border-gray-700
            bg-white
            dark:bg-gray-800
            rounded
            divide-y
            dark:divide-gray-700
            divide-gray-100
            shadow
          "
        >
          <ul
            class="py-1 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownSmallButton"
          >
            <div>
              <li>
                <a
                  @click="deleteComment()"
                  class="block py-2 px-4 hover:bg-primary-btn hover:text-white"
                >
                  Delete
                </a>
              </li>

              <li>
                <a
                  @click="editPost"
                  class="block py-2 px-4 hover:bg-primary-btn hover:text-white"
                  >Edit</a
                >
              </li>
            </div>
          </ul>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: {
    comment: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      commentsOptions: false,
    };
  },
  methods: {
    CommentsOptions() {
      this.commentsOptions = !this.commentsOptions;
    },
    deleteComment() {
      axios
        .delete(
          `http://localhost/fil-rouge-find-pet/CommentController/deleteComment`,
          {
            data: {
              comment_id: this.comment.id,
            },
          }
        )
        .then((res) => {
          this.$emit("getComments");
        })
        .catch((err) => {
          console.log(err);
        });
    },
    editPost() {
      this.$emit("editPost");
    },
  },
};
</script>

<style>
</style>