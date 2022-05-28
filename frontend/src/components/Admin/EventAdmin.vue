<template>
  <div class="dashboard p-4">
    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <router-link
            to="/admin/dashboard"
            class="
              inline-flex
              items-center
              text-sm
              font-medium
              text-gray-700
              hover:text-gray-900
              dark:text-gray-400 dark:hover:text-white
            "
          >
            <svg
              class="mr-2 w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
              ></path>
            </svg>
            Dashboard
          </router-link>
        </li>
      </ol>
    </nav>
    <!--Table-->
    <div class="mt-3">
      <div>
        <h1>
          <span class="text-gray-700 dark:text-gray-400 text-xl">
            Volunteers list
          </span>
        </h1>
      </div>
      <div class="overflow-x-auto w-full">
        <table class="table w-full">
          <!-- head -->
          <thead>
            <tr>
              <th>ID</th>
              <th>User ID</th>
              <th>Event ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 4 -->
            <tr v-for="(Volunteer, index) in Volunteers" :key="index">
              <td class="font-bold">{{ Volunteer.id }}</td>

              <td>
                {{ Volunteer.fullName }}
                <br />
                <div class="flex gap-2">
                  <span class="badge badge-ghost badge-sm"
                    >{{ Volunteer.Email }}
                  </span>
                  <span class="badge badge-ghost badge-sm">
                    {{ Volunteer.PhoneNumber }}
                  </span>
                </div>
              </td>
              <td>
                <div class="flex items-center space-x-3">
                  <div>
                    <div class="font-bold">{{ Volunteer.event_id }}</div>
                    <div class="text-sm opacity-50">
                      {{ Volunteer.event_City }}
                    </div>
                  </div>
                </div>
              </td>
              <th>
                <div>
                  <button class="btn btn-ghost text-green-500 btn-xs">
                    Accept
                  </button>
                  <button
                    class="btn btn-ghost text-red-600 btn-xs"
                    @click="RejectVolunteer(Volunteer.id)"
                  >
                    Reject
                  </button>
                </div>
              </th>
            </tr>
          </tbody>
          <!-- foot -->
          <tfoot>
            <tr>
              <th>ID</th>
              <th>User ID</th>
              <th>Event ID</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "EventAdmin",
  data() {
    return {
      Volunteers: [],
    };
  },
  methods: {
    getAllVoulunteer() {
      axios
        .get(
          "http://localhost/fil-rouge-find-pet/AdminController/getAllVolunteers"
        )
        .then((response) => {
          this.Volunteers = response.data;
        });
    },

    // RejectVolunteer(id) {
    //   axios
    //     .delete(
    //       "http://localhost/fil-rouge-find-pet/AdminController/deleteVolunteer",
    //       {
    //         params: {
    //           id: id,
    //         },
    //       }
    //     )
    //     .then((response) => {
    //       console.log(response);
    //       this.getAllVoulunteer();
    //     });
    // },
    RejectVolunteer(id) {
      fetch(
        "http://localhost/fil-rouge-find-pet/AdminController/deleteVolunteer",
        {
          method: "DELETE",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id: id,
          }),
        }
      )
        .then((response) => {
          console.log(response);
          this.getAllVoulunteer();
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    //
  },
  mounted() {
    this.getAllVoulunteer();
  },
};
</script>

<style>
</style>