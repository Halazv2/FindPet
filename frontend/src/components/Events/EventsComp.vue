<template>
  <div>
    <div v-if="Role == 'Admin'">
      <label
        for="my-modal-3"
        class="btn border-none bg-primary-btn hover:bg-secondary-brn mb-6"
        >Add Post</label
      >
      <input type="checkbox" id="my-modal-3" class="modal-toggle" />
      <AddEvent class="modal modal-bottom sm:modal-middle" />
    </div>
    <div>
      <h1 class="text-5xl font-bold text-center mb-10 dark:text-white">
        Volunteer to help animals
      </h1>
    </div>
    <div
      class="w-full rounded-lg lg:flex mb-7"
      v-for="(event, index) in events"
      :key="index"
    >
      <div class="bg-base-200 rounded-lg w-full">
        <div
          class="
            hero-content
            bg-white
            dark:bg-gray-800 dark:text-white
            shadow
            light:bg-gray-800
            px-4
            flex-col
            lg:flex-row lg:justify-start lg:items-center lg:gap-4
          "
        >
          <img
            :src="
              `http://localhost/fil-rouge-find-pet/uploads/Eventimages/` +
              event.Image
            "
            class="max-w-sm rounded-lg shadow-2xl"
          />
          <div>
            <div>
              <h1 class="text-5xl font-bold">
                {{ event.Title }}
              </h1>
              <p class="py-6">
                {{ event.Description }}
              </p>
            </div>
            <div class="flex items-center justify-between">
              <button
                v-if="Role == 'User'"
                class="btn bg-primary-btn hover:bg-secondary-brn border-none"
              >
                VOLUNTEER
              </button>
              <div class="mr-6 flex items-center">
                <img
                  class="w-14 h-14 rounded-full mr-1"
                  src="../../assets/images/iconLocalisation.png"
                  alt="Avatar of Jonathan Reinink"
                />
                <div class="text-sm">
                  <p class="leading-none">{{ event.City }}</p>
                  <p class="text-grey-dark">
                    {{ event.Date }} {{ event.Time }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";
import AddEvent from "@/components/Admin/AddEvent.vue";
import axios from "axios";

export default {
  components: {
    AddEvent,
    Icon,
  },
  name: "EventsComp",

  data() {
    return {
      events: {
        id: "",
        Tite: "",
        Description: "",
        Date: "",
        Time: "",
        City: "",
        Image: "",
      },
      Role: localStorage.getItem("Role"),
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