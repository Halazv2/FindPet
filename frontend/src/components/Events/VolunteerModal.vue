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
    <div class="modal-box w-full h-fit relative">
      <label
        @click="closeModal"
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
        <div class="alert alert-error shadow-lg mb-3" v-if="alert">
          <div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="stroke-current flex-shrink-0 h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            <span>{{ message }}</span>
          </div>
        </div>

        <div class="text-center flex justify-between">
          <h6 class="text-blueGray-700 text-xl font-bold">Volunteer</h6>
        </div>
      </div>
      <hr class="border-b-1 border-blueGray-300 mb-5" />

      <form @submit.prevent action method enctype="multipart/form-data">
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
                Why do you want to volunteer?
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
                v-model="volunteer.description"
              ></textarea>
            </div>
          </div>
        </div>
        <footer class="flex justify-between mt-2">
          <button
            @click="volunteerEvent()"
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
import computed from "vue";
import { mapMutations } from 'vuex'
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
      volunteer: {
        description: "",
        id: localStorage.getItem("user_id"),
        event_id: this.event.id,
      },

      Cities: [],
      message: "",
      alert: false,
      // successAlert: false,
    };
  },
  methods: {
    ...mapMutations(["setSuccessAlert"]),


    closeModal() {
      this.$emit("VolunteerModal");
    },

    onFileChange(e) {
      const file = e.target.files[0];
      this.event.Image = file;
    },
    volunteerEvent() {
      fetch("http://localhost/fil-rouge-find-pet/UserController/volunteer", {
        method: "POST",
        body: JSON.stringify(this.volunteer),
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => response.json())
        .then((data) => {
          this.message = data.message;
          if (data.message == "Volunteer added") {
            this.$emit("VolunteerModal");
            // alert(this.message);
            // this.$store.commit("setSuccessAlert", true);
            // this.$store.commit("setSuccessAlert", true);
            // this.$emit("openSuccessAlert(successAlert)");
            this.setSuccessAlert(true);
          } else {
            this.message = data.message;
            this.alert = true;
          }
        });
    },
  },
  mounted() {},
  computed() {
    return {
      successAlert: this.$store.state.successAlert,
      // setSuccesAlert: ()=> this.$store.commit('setSuccesAlert', this.successAlert)
    };
  },
};
</script>

<style>
</style>