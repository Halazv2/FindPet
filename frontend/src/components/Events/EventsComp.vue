<template>
  <div>
    <div class="alert alert-success shadow-lg mb-3" v-if="successAlert">
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
        <span> your application has been sent! We will contact you   </span>
      </div>
    </div>

    <div v-if="Role == 'Admin'">
      <label
        class="btn border-none bg-primary-btn hover:bg-secondary-brn mb-6"
        @click="OpenAddEventModal"
      >
        Add Post</label
      >
      <AddEvent
        class="z-50"
        v-if="AddEvent"
        @getEvents="getEvents"
        @OpenAddEventModal="OpenAddEventModal"
      />
    </div>
    <div class="mb-10 " v-if="Role == 'User'">
      <h1 class="text-5xl font-bold text-center mb-2  dark:text-white">
        Get Involved
      </h1>
      <p class="text-center text-lg dark:text-white ">
        There are so afun ways to get involved and support our lifesaving
        mission. We offer events and training classes that are for, about and
        sometimes even with your favorite animal friend. We’re pleased to say
        that there’s something truly for everyone.
      </p>
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
import { mapMutations } from "vuex";
import { mapState } from "vuex";
import { mapGetters } from "vuex";
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
      AddEvent: false,
    };
  },
  methods: {
    ...mapMutations(["setSuccessAlert"]),
    getEvents() {
      axios
        .get("http://localhost/fil-rouge-find-pet/AdminController/getAllEvents")
        .then((res) => {
          this.events = res.data.reverse();
        });
    },
    OpenAddEventModal() {
      this.AddEvent = !this.AddEvent;
    },
  },
  mounted() {
    this.getEvents();
  },
  computed: {
    // mix the getters into computed with object spread operator
    ...mapGetters(["successAlert"]),
  },
};
</script>

<style>
</style>