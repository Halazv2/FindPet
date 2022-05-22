<template>
  <div class="modal">
    <div class="modal-box w-11/12 relative">
      <label
        for="my-modal-5"
        id="close-modal"
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
      <h1>Update Post</h1>
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
                @change="onileChange"
                type="file"
                class="hidden"
              />
            </label>
            <div id="progress" class="hidden">
              <p>
                Progress: {{ uploadValue.toFixed() + "%" }}
                <progress
                  id="progresss"
                  :value="uploadValue"
                  max="100"
                ></progress>
              </p>
            </div>
            <div class="hidden" id="done">Done!</div>
          </div>
          <button
            @click="UpdatePost()"
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
  </div>
</template>

<script>
import * as fireStorage from "firebase/storage";
import axios from "axios";
export default {
  name: "AddPost",
  props: {
    post: {
      type: Object,
    },
  },
  data() {
    return {
      Post: 
        {
          id: this.post.id,
          title: this.post.Title,
          description: this.post.Description,
          PetType: this.post.PetType,
          PostType: this.post.PostType,
          image: this.post.Image,
        },
      imageData: null,
      picture: null,
      uploadValue: 0,
    };
  },
  methods: {
    onileChange(e) {
      const file = e.target.files[0];
      this.Post.image = file;
      console.log(file);
      const progresss = document.getElementById("progress");
      const done = document.getElementById("done");
      progresss.classList.remove("hidden");
      if (this.uploadValue < 100) {
        this.uploadValue += 10;
        setTimeout(() => {
          this.onileChange(e);
        }, 100);
        if (this.uploadValue === 100) {
          done.classList.remove("hidden");
        }
      } else {
        progresss.classList.add("hidden");
      }
    },
    UpdatePost() {
      const formData = new FormData();
      formData.append("id", this.Post.id);
      formData.append("Title", this.Post.title);
      formData.append("Description", this.Post.description);
      formData.append("PetType", this.Post.PetType);
      formData.append("PostType", this.Post.PostType);
      formData.append("Image", this.Post.image);
      axios
        .post(
          "http://localhost/fil-rouge-find-pet/FeedController/updatePost",
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  mounted() {
    console.log(this.post);
  },
};
</script>

<style>
</style>