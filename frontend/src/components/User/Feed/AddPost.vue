<template>
  <dialog class="flex fixed inset-0 justify-center bg-black bg-opacity-20">
    <div class="modal-box w-full h-fit relative">
      <label
        @click="closeModal"
        class="
          btn btn-sm
          border-none
          btn-circle
          bg-primary-btn
          hover:bg-secondary-brn
          absolute
          right-2
          top-2
        "
        >✕</label
      >
      <form
        class="bg-white mb-6 p-4"
        @submit.prevent
        action
        method
        enctype="multipart/form-data"
      >
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
            Title
          </label>
          <input
            type="text"
            placeholder="Joe"
            v-model="Post.title"
            class="
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
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
            Pet Type
          </label>
          <input
            type="text"
            placeholder="Joe"
            v-model="Post.PetType"
            class="
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
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
            Description
          </label>
          <textarea
            name="message"
            placeholder="Type something..."
            v-model="Post.description"
            class="
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
            "
          ></textarea>
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
            Post Type
          </label>
          <select
            name=""
            class="
              w-full
              rounded-lg
              p-2
              text-sm
              bg-gray-100
              border border-transparent
              appearance-none
              rounded-tg
              placeholder-gray-400
            "
            v-model="Post.PostType"
          >
            <option value="Offer">Offer</option>
            <option value="Adoption">Adoption</option>
          </select>
        </div>
        <footer class="flex justify-between mt-2">
          <div class="flex gap-2">
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
                @change="upFile"
                type="file"
                class="hidden"
              />
            </label>
            <!-- class="hidden" -->
            <!-- <div id="progress">
              <p>
                Progress: {{ uploadValue.toFixed() + "%" }}
                <progress
                  ref="progress"
                  class="border-none rounded-md text-primary-btn hidden"
                  :value="uploadValue"
                  max="100"
                ></progress>
              </p>
            </div>
            <div class="hidden" ref="done">Done!</div> -->
          </div>
          <button
            @click="AddPost()"
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
        </footer>
      </form>
    </div>
  </dialog>
</template>
<script>
import * as fireStorage from "firebase/storage";
import axios from "axios";
import { ref } from "@vue/reactivity";
export default {
  name: "AddPost",
  data() {
    return {
      Post: [
        {
          title: "",
          description: "",
          PetType: "",
          PostType: "Offre",
          image: "",
        },
      ],
      imageData: null,
      picture: null,
      uploadValue: 0,
    };
  },
  methods: {
    upFile(e) {
      const file = e.target.files[0];
      this.Post.image = file;
      const progresss = this.$refs.progress;
      const done = this.$refs.done;
      progresss.classList.remove("hidden");
      if (this.uploadValue < 100) {
        this.uploadValue += 10;
        setTimeout(() => {
          this.upFile(e);
        }, 100);
        if (this.uploadValue === 100) {
          done.classList.remove("hidden");
        }
      } else {
        progresss.classList.add("hidden");
      }
    },

    // async sendImage() {
    //   try {
    //     this.send = true;
    //     let file = this.imageName;
    //     let newname =
    //       Math.random().toString(36).slice(2) +
    //       new Date().getTime().toString(36);
    //     let storageRef = fireStorage.ref(
    //       fireStorage.getStorage(),
    //       "images/" + newname + ".png"
    //     );
    //     const post = this.Post;
    //     await fireStorage.uploadBytes(storageRef, file).then(function () {
    //       console.log("uploaded");
    //     });
    //     await axios.post("http://localhost/fil-rouge-find-pet/FeedController/addPost", {
    //       ...post,
    //       image: newname,
    //     });
    //   } catch (e) {
    //     console.log(e);
    //   }
    // },

    AddPost() {
      const done = document.getElementById("done");
      const formData = new FormData();
      formData.append("Title", this.Post.title);
      formData.append("Description", this.Post.description);
      formData.append("PetType", this.Post.PetType);
      formData.append("PostType", this.Post.PostType);
      formData.append("Image", this.Post.image);
      formData.append("UserID", localStorage.getItem("user_id"));
      // console.log(this.Post.image);
      axios
        .post(
          "http://localhost/fil-rouge-find-pet/FeedController/addPost",
          formData
        )
        .then((response) => {
          // console.log(response);
          this.$emit("getPosts");
          this.$emit("closeModal");
          this.uploadValue = 0;
          done.classList.add("hidden");
          this.resetPostinput();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    resetPostinput() {
      this.Post.title = "";
      this.Post.description = "";
      this.Post.PetType = "";
      this.Post.PostType = "";
      this.Post.image = "";
    },
    closeModal() {
      this.$emit("closeModal");
    },
  },
  mounted() {},
};
</script>

<style>
dialog {
  width: 100vw !important;
  height: 100vh !important;
  background-color: rgba(0, 0, 0, 0.5);
}
</style>