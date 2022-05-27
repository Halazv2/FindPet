<template>
  <div class="w-full relative rounded-lg lg:flex mb-7">
    <UpdateEvent
      v-if="UpdateEvent"
      class="z-50"
      :event="event"
      @editPost="editPost"
    />
    <VolunteerModal
      class="z-50"
      v-if="OpenVolunteerModal"
      @VolunteerModal="VolunteerModal"
      :event="event"
    />
    <div class="bg-base-200 rounded-lg w-full">
      <div
        class="
          hero-content
          bg-white
          dark:bg-gray-800 dark:text-white
          shadow
          light:bg-gray-800
          p-9
          flex-col
          lg:flex-row lg:justify-start lg:items-center lg:gap-4
        "
      >
        <img
          :src="
            `http://localhost/fil-rouge-find-pet/uploads/Eventimages/` +
            event.Image
          "
          class="lg:max-w-sm w-full rounded-lg shadow-2xl"
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
              @click="VolunteerModal"
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
                <p class="leading-none mb-1">{{ event.City }}</p>
                <p class="text-grey-dark">
                  {{ event.Date }} | {{ event.Time }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="absolute top-0 right-4">
          <div>
            <button @click="menuToggle(event.id)" v-if="Role == 'Admin'">
              <div class="dropdown flex p-1 cursor-pointer rounded-md">
                <span class="text-md mt-4 text-gray-300"
                  ><Icon icon="bi:caret-down-fill"
                /></span>
              </div>
            </button>
          </div>
          <transition name="fade">
            <div
              v-if="menu"
              ref="menu"
              class="
                block
                absolute
                right-2
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
                <div>
                  <li>
                    <a
                      @click="deleteEvent(event.id)"
                      class="
                        block
                        py-2
                        px-4
                        hover:bg-primary-btn hover:text-white
                      "
                    >
                      Delete {{ event.id }}
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
              </ul>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";
import { Icon } from "@iconify/vue";
import axios from "axios";
import UpdateEvent from "./UpdateEvent";
import VolunteerModal from "./VolunteerModal.vue";
export default {
  name: "EventPost",
  props: {
    event: {
      type: Object,
      required: true,
    },
  },
  components: {
    Icon,
    UpdateEvent,
    VolunteerModal,
  },

  data() {
    return {
      Role: localStorage.getItem("Role"),
      menu: false,
      active: null,
      UpdateEvent: false,
      OpenVolunteerModal: false,
    };
  },
  methods: {
    VolunteerModal() {
      this.OpenVolunteerModal = !this.OpenVolunteerModal;
    },
    menuToggle() {
      this.menu = !this.menu;
    },
    menuToggleBlur() {
      this.menu = false;
    },
    deleteEvent(id) {
      axios
        .delete(
          `http://localhost/fil-rouge-find-pet/AdminController/deleteEvent/`,
          {
            data: {
              id: id,
            },
          }
        )
        .then((response) => {
          console.log(response);
          this.$emit("getEvents");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    editPost() {
      this.UpdateEvent = !this.UpdateEvent;
    },
  },
  mounted() {
    document.addEventListener("click", (e) => {
      if (this.menu && !this.$el.contains(e.target)) {
        this.menuToggleBlur();
      }
    });
  },
};
</script>

<style>
</style>