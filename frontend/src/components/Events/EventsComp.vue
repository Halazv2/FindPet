<template>
  <div>
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
    };
  },
  methods: {
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
  },
};
</script>

<style>
</style>