<template>
  <!--User row -->
  <div class="flex relative justify-between w-full">
    <div class="user flex sm:flex-row sm:text-left">
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
        <a href="#" class="title font-semibold no-underline">
          {{ comment.FirstName }}
        </a>
        <div class="skills flex flex-col">
          <span
            class="subtitle text-slate-500 text-left"
            v-if="commentbeforEdit"
          >
            {{ comment.comment }}
          </span>

          <span
            class="subtitle text-slate-500 text-left"
            v-if="inputUpdateComment"
          >
            <div class="relative mt-4">
              <div class="container">
                <div class="content">
                  <form class="subscription">
                    <input
                      class="add-email border-2 border-primary-btn px-4 py-2"
                      type="text"
                      v-model="comment.comment"
                    />
                    <button
                      @click="updateComment(comment.id)"
                      class="submit-email"
                      ref="submitEmail"
                      type="button"
                    >
                      <span class="before-submit">Edit</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
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
                  @click="editComment()"
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
      inputUpdateComment: false,
      commentbeforEdit: true,
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
    editComment() {
      this.commentbeforEdit = !this.commentbeforEdit;
      this.inputUpdateComment = !this.inputUpdateComment;
    },
    updateComment(id) {
      axios
        .put(
          `http://localhost/fil-rouge-find-pet/CommentController/updateComment`,
          {
            comment_id: id,
            comment: this.comment.comment,
          }
        )
        .then((res) => {
          this.$emit("getComments");
          this.editComment();
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.container {
  width: 100%;
  height: 100%;
}

.content {
  width: 360px;
  height: 40px;
  border-radius: 60px;
  overflow: hidden;
}

.subscription {
  position: relative;
  width: 100%;
  height: 100%;
}

.subscription .add-email {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 60px;

  padding: 0 20px;
}

.subscription .submit-email {
  position: absolute;
  top: 0;
  right: 0;
  height: 38px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 4px;
  margin-right: 8px;
  height: calc(100% - 2px);
  width: 100px;
  border: none;
  border-radius: 60px;
  outline: none;
  margin: 1px;
  padding: 0 20px;
  cursor: pointer;
  background: #f18733;
  color: #ffffff;
  transition: width 0.35s ease-in-out, background 0.35s ease-in-out;
}

.subscription.done .submit-email {
  width: calc(100% - 2px);
  background: #f18733;
}

.subscription .submit-email .before-submit,
.subscription .submit-email .after-submit {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  text-align: center;
  line-height: 38px;
  transition: visibility 0.35s ease-in-out, opacity 0.35s ease-in-out;
}

.subscription.done .submit-email .before-submit,
.subscription:not(.done) .submit-email .after-submit {
  visibility: hidden;
  opacity: 0;
}

.subscription .submit-email .after-submit {
  transition-delay: 0.35s;
}

.subscription:not(.done) .submit-email .before-submit,
.subscription.done .submit-email .after-submit {
  visibility: visible;
  opacity: 1;
}
</style>