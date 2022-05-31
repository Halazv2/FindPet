<template>
  <div class="">
    <CardHover
      v-show="cardHover"
      @mouseover.native="cardHover = true"
      @mouseleave.native="cardHover = false"
      class="
        bg-white
        dark:bg-gray-800 dark:text-white
        p-7
        h-32
        absolute
        top-16
        left-14
        rounded-lg
        shadow-lg
        z-10
      "
      :post="post"
    />
    <Comments
      :post="post"
      v-if="commentModel"
      @closeComments="openCommentModel"
    />
    <article
      ref="feed"
      class="
        bg-white
        dark:bg-gray-800 dark:text-white
        shadow
        rounded-lg
        relative
        light:bg-gray-800
        px-4
        mb-6
      "
    >
      <UpdatePost
        :post="post"
        v-if="updateModal"
        @closeModal="editPost"
        @updateModal="updateModal"
      />
      <div class="flex justify-between">
        <div class="flex flex-shrink-0 p-4 pb-0">
          <a
            class="flex-shrink-0 group block"
            @mouseover.native="cardHover = true"
            @mouseleave.native="cardHover = false"
          >
            <div class="flex items-center">
              <div>
                <img
                  class="inline-block h-12 w-12 rounded-full"
                  :src="
                    `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
                    post.ProfilePic
                  "
                />
              </div>
              <div class="flex flex-col mb-2 ml-4 mt-1">
                <div
                  class="text-gray-600 dark:text-white text-sm font-semibold"
                >
                  {{ post.FirstName }} {{ post.LastName }}
                </div>
                <div class="flex w-full mt-1">
                  <div
                    class="text-blue-700 font-base text-xs mr-1 cursor-pointer"
                  >
                    {{ post.PetType }} - {{ post.PostType }}
                  </div>
                  <div
                    class="text-gray-400 dark:text-gray-200 font-thin text-xs"
                  >
                    • 30 seconds ago
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div>
          <button @click="menuToggle">
            <div class="dropdown flex p-1 cursor-pointer rounded-md">
              <span class="text-md mt-4 text-gray-300"
                ><Icon icon="bi:caret-down-fill"
              /></span>
            </div>
          </button>
        </div>
        <transition name="fade">
          <div
            v-show="menu"
            ref="menu"
            class="
              block
              absolute
              right-10
              mt-12
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
              <div v-if="post.UserID == userID">
                <li>
                  <a
                    @click="deletePost(post.id)"
                    class="
                      block
                      py-2
                      px-4
                      hover:bg-primary-btn hover:text-white
                    "
                  >
                    Delete
                  </a>
                </li>

                <li>
                  <a
                    @click="editPost"
                    class="
                      block
                      py-2
                      px-4
                      hover:bg-primary-btn hover:text-white
                    "
                    >Edit</a
                  >
                </li>
              </div>
              <div v-else>
                <li>
                  <a
                    class="
                      flex
                      items-center
                      gap-2
                      py-2
                      px-4
                      hover:bg-primary-btn hover:text-white
                    "
                  >
                    <Icon icon="ic:round-report-problem" />
                    <p class="">Report</p>
                  </a>
                </li>
              </div>
            </ul>
          </div>
        </transition>
      </div>
      <div class="pl-16">
        <p class="text-base width-auto font-medium flex-shrink">
          {{ post.Description }}
        </p>

        <div class="md:flex-shrink pr-6 pt-3">
          <!-- <div class="bg-cover bg-no-repeat bg-center rounded-lg w-full h-64" style="height: 200px; background-image: url(https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg);"> -->
          <img
            class="w-full h-full bg-cover rounded-lg"
            :src="
              `http://localhost/fil-rouge-find-pet/uploads/Feedimages/` +
              post.Image
            "
            alt=""
          />
          <!-- </div> -->
        </div>

        <div class="flex items-center justify-center w-full py-4">
          <!-- comment -->
          <div
          @click="openCommentModel"
            class="
              flex-1 flex
              items-center
              text-xs text-gray-400
              hover:text-blue-400
              transition
              justify-center
              duration-350
              ease-in-out
            "
          >
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
              <g>
                <path
                  d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"
                ></path>
              </g>
            </svg>
            12.3 k
          </div>
          <!-- end of comment -->

          <div
            @click="LikePost(post.id)"
            :class="{ 'text-red-600': active }"
            class="
              flex-1 flex
              items-center
              text-xs text-gray-400
              transition
              justify-center
              duration-350
              ease-in-out
            "
          >
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
              <g>
                <path
                  d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"
                ></path>
              </g>
            </svg>
            {{ post.likesCount }}
          </div>
          <div
            class="
              flex-1 flex
              items-center
              text-xs text-gray-400
              hover:text-blue-400
              transition
              justify-center
              duration-350
              ease-in-out
            "
          >
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
              <g>
                <path
                  d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z"
                ></path>
                <path
                  d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z"
                ></path>
              </g>
            </svg>
          </div>
        </div>
      </div>
    </article>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";
import UpdatePost from "./UppdatePost.vue";
import axios from "axios";
import CardHover from "./CardHover.vue";
import Comments from "./Comments/Comments.vue";
export default {
  name: "Post",
  components: { Icon, UpdatePost, CardHover, Comments },
  props: {
    post: {
      type: Object,
      required: true,
    },
  },
  computed() {
    return {
      isVisible() {
        return this.cardHover;
      },
    };
  },
  data() {
    return {
      menu: false,
      active: false,
      userID: localStorage.getItem("user_id"),
      updateModal: false,
      cardHover: false,
      commentModel: false,
    };
  },

  methods: {
    openCommentModel() {
      this.commentModel = !this.commentModel;
    },
    // open menu
    menuToggle: function () {
      this.menu = !this.menu;
    },
    menuToggleBlur: function () {
      this.menu = false;
    },
    editPost: function () {
      this.updateModal = !this.updateModal;
    },
    getpost() {
      fetch(
        "http://localhost/fil-rouge-find-pet/FeedController/getPost?id=" +
          this.post.id,
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }
      )
        .then((res) => res.json())
        .then((data) => {
          // console.log(data)
        });
    },
    //deletePost
    deletePost(id) {
      console.log(id);
      fetch(`http://localhost/fil-rouge-find-pet/FeedController/deletePost`, {
        method: "DELETE",
        body: JSON.stringify({ id: id }),
      }).then(() => {
        this.$emit("getPosts");
      });
    },
    //like POST
    LikePost(id) {
      axios
        .post("http://localhost/fil-rouge-find-pet/FeedController/likePost", {
          post_id: id,
          user_id: localStorage.getItem("user_id"),
        })
        .then((response) => {
          this.$emit("getPosts");
          if (response.data.likesCount > this.post.likesCount) {
            this.active = true;
          } else {
            this.active = false;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  //close menu when click outside
  mounted() {
    // this.getpost();
    document.addEventListener("click", (e) => {
      if (this.menu && !this.$el.contains(e.target)) {
        this.menuToggleBlur();
      }
    });
  },
};
</script>

<style lang="scss" scoped>
</style>