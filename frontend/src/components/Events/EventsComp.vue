<template>
  <div>
    <div class="alert alert-success shadow-lg mb-3"
     v-if="successAlert"
     >
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
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
        <span>Your purchase has been confirmed!</span>
      </div>
    </div>

    <div v-if="Role == 'Admin'">
      <label
        for="my-modal-3"
        class="btn border-none bg-primary-btn hover:bg-secondary-brn mb-6"
        >Add Post</label
      >
      <input type="checkbox" id="my-modal-3" class="modal-toggle" />
      <AddEvent
        class="modal modal-bottom sm:modal-middle"
        @getEvents="getEvents"
      />
    </div>
    <div>
      <h1 class="text-5xl font-bold text-center mb-10 dark:text-white">
        Volunteer to help animals
      </h1>
    </div>
    <div>
      <EventPost
        v-for="(event, index) in events"
        :key="index"
        :event="event"
        @getEvents="getEvents"
      />
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";
import AddEvent from "@/components/Admin/AddEvent.vue";
import { ref } from "vue";
import axios from "axios";
import EventPost from "@/components/Events/EventPost.vue";
import computed from "vue";
export default {
  components: {
    AddEvent,
    Icon,
    ref,
    EventPost,
  },
  name: "EventsComp",

  data() {
    return {
      events: [],
      Role: localStorage.getItem("Role"),
      menu: false,
      active: null,
      successAlert: true,
    };
  },
  methods: {
    // openSuccessAlert(successAlert){
    //   this.successAlert = successAlert;
    //   successAlert = true;
    // },
    getEvents() {
      axios
        .get("http://localhost/fil-rouge-find-pet/AdminController/getAllEvents")
        .then((res) => {
          this.events = res.data.reverse();
        });
    },
  },
  mounted() {
    this.getEvents();
    
    this.successAlert = this.$store.state.successAlert
  },
  computed(){
    return{
    }
  }
};
</script>

<style>
</style>