  <template>
  <dialog
    class="
      w-full
      h-screen
      flex
      fixed
      inset-0
      justify-center
      bg-black bg-opacity-20
    "
  >
    <div class="modal-box w-full relative">
      <label
        @click="editPost"
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
          bg-white
          mb-0
          px-6
          py-6
        "
      >
        <div class="text-center flex justify-between">
          <h6 class="text-blueGray-700 text-xl font-bold">Update event</h6>
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
                v-model="event.Title"
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
                v-model="event.City"
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
                  
                "
                htmlfor="grid-password"
              >
                Date
              </label>
              <input
                :min="new Date().toISOString().substr(0, 10)"
                type="date"
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
                v-model="event.Date"
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
                  
                  mb-2
                "
              >
                Time
              </label>
              <input
                type="time"
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
                v-model="event.Time"
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
                v-model="event.Description"
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
              <!-- <input
                name="Image"
                
                @change="ok"
                type="file"
                class="hidden"
              /> -->
              <input
                name="image"
                id="dropzone-file"
                @change="FileChange"
                type="file"
                class="hidden"
              />
            </label>
          </div>
          <button
            @click="UpdateEvent()"
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
import axios from "axios";
export default {
  name: "AddEvent",
  props: {
    event: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      Cities: [],
      Image: "",
    };
  },
  methods: {
    ok(e) {
      console.log("oooooo");
      this.Image = e.target.files[0];
    },
    FileChange(e) {
      this.Image = e.target.files[0];
      console.log("dsqdq");
    },
    editPost() {
      this.$emit("editPost");
    },

    getcity() {
      this.Cities = require("../../assets/js/city.json").map(
        (city) => city.city
      );
    },
    UpdateEvent() {
      const formData = new FormData();
      formData.append("id", this.event.id);
      formData.append("image", this.Image);
      formData.append("Title", this.event.Title);
      formData.append("City", this.event.City);
      formData.append("Date", this.event.Date);
      formData.append("Time", this.event.Time);
      formData.append("Description", this.event.Description);
      console.log(formData);
      axios
        .post(
          "http://localhost/fil-rouge-find-pet/AdminController/updateEvent",
          formData
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
    this.getcity();
  },
};
</script>

<style>
</style>