  <template>
  <div class="modal">
    <div class="modal-box w-11/12 max-w-5xl relative dark:bg-gray-800 bg-white">
      <label
        for="my-modal-3"
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
      <div
        class="
          rounded-t
          dark:bg-gray-800
          bg-white
          dark:text-white
          mb-0
          px-6
          py-6
        "
      >
        <div class="text-center flex justify-between">
          <h6 class="text-blueGray-700 text-xl font-bold">Add event</h6>
        </div>
      </div>
      <hr class="border-b-1 border-blueGray-300" />

      <form @submit.prevent action method enctype="multipart/form-data">
        <h6
          class="
            text-blueGray-400 text-sm
            mt-3
            mb-6
            font-bold
            uppercase
            dark:text-white
          "
        >
          Event Details
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label
                class="
                  block
                  uppercase
                  text-blueGray-600 text-xs
                  font-bold
                  mb-2
                  dark:text-white
                "
              >
                Titel
              </label>
              <input
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
                v-model="event.title"
              />
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label
                class="
                  block
                  uppercase
                  text-blueGray-600 text-xs
                  font-bold
                  dark:text-white
                  mb-2
                "
              >
                Localisation
              </label>
              <select
                class="
                  select select-bordered
                  w-full
                  text-gray-800
                  dark:text-gray-900
                  border-gray-500
                  dark:border-slate-600
                "
                v-model="event.localisation"
              >
                <option disabled selected>
                  where is this event happening?
                </option>
                <option v-for="city in Cities" :key="city">{{ city }}</option>
              </select>
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label
                class="
                  block
                  uppercase
                  text-blueGray-600 text-xs
                  font-bold
                  mb-2
                  dark:text-white
                "
                htmlfor="grid-password"
              >
                Date
              </label>
              <input
                type="text"
                class="
                  px-3
                  py-3
                  placeholder-blueGray-300
                  text-blueGray-600
                  bg-white
                  rounded
                  text-sm
                  shadow
                  w-full
                "
                v-model="event.date"
              />
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label
                class="
                  block
                  uppercase
                  text-blueGray-600 text-xs
                  font-bold
                  dark:text-white
                  mb-2
                "
              >
                Time
              </label>
              <input
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
                  w-full
                "
                v-model="event.time"
              />
            </div>
          </div>
        </div>

        <hr class="mt-6 border-b-1 border-blueGray-300" />

        <h6
          class="
            text-blueGray-400 text-sm
            mt-3
            mb-6
            font-bold
            uppercase
            dark:text-white
          "
        >
          About the event
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <label
                class="
                  block
                  uppercase
                  text-blueGray-600 text-xs
                  font-bold
                  dark:text-white
                  mb-2
                "
              >
                Description
              </label>
              <textarea
                type="text"
                class="
                  px-3
                  py-3
                  placeholder-blueGray-300
                  text-blueGray-600
                  bg-white
                  rounded
                  text-sm
                  shadow
                  w-full
                "
                v-model="event.description"
              ></textarea>
            </div>
          </div>
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
                @change="onFileChange"
                type="file"
                class="hidden"
              />
            </label>
          </div>
          <button
            @click="AddEvent()"
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
import axios from "axios";
export default {
  name: "AddEvent",
  data() {
    return {
      event: {
        Title: "",
        Description: "",
        Date: "",
        Time: "",
        City: "",
        Image: "",
      },
      Cities: [],
    };
  },
  methods: {
    AddEvent() {
      const api = `http://localhost/fil-rouge-find-pet/AdminController/createEvent`;
      const formData = new FormData();
      formData.append("Title", this.event.Title);
      formData.append("Description", this.event.Description);
      formData.append("Date", this.event.Date);
      formData.append("Time", this.event.Time);
      formData.append("City", this.event.City);
      formData.append("Image", this.event.Image);
      axios
        .post(api, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          const close_model = document.getElementById("close-modal");
          close_model.click();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.Post.Image = file;
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

<style>
</style>