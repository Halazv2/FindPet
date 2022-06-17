<template>
  <div
    class="
      block
      absolute
      right-24
      mt-12
      z-10
      w-80
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
    <div class="py-3 px-4 text-sm text-gray-900 dark:text-gray-200">
      <div>notifications</div>
    </div>
    <div v-if="Notifications.length <= 0 && !notificationDb[0]">
      <img src="../assets/images/no_notifications.png" alt="" />
      <a class="dark:text-gray-400 flex justify-center pb-5">No notifacation</a>
    </div>
    <div>
      <!-- notifacation with web socket -->
      <ul
        v-for="(Notification, index) in Notifications"
        :key="index"
        class="py-1 text-sm text-gray-700 dark:text-gray-200"
        aria-labelledby="dropdownSmallButton"
      >
        <li class="flex">
          <img
            v-if="Notification"
            src="https://thumbs.dreamstime.com/b/default-profile-picture-avatar-photo-placeholder-vector-illustration-default-profile-picture-avatar-photo-placeholder-vector-189495158.jpg"
            class="w-20 h-20 m-2 rounded-full"
            alt=""
          />
          <div class="ml-2">
            <p class="font-bold">{{ Notification.title }} </p>
            <p>
              <span
                v-if="
                  Notification.status === 'Rejected' || Notification.status == 0
                "
                class="text-red-500 cursor-pointer"
              >
                rejected
              </span>
              <span
                v-if="
                  Notification.status === 'Accepted' || Notification.status == 1
                "
                class="text-green-500 cursor-pointer"
              >
                Accepted
              </span>
            </p>
            <p>
              {{ Notification.message }}
            </p>
          </div>
        </li>
      </ul>
      <!-- end of notifacation with web socket -->

      <!-- notifacation from data base -->
      <ul
        v-for="Notification in notificationDb"
        :key="Notification.id"
        class="py-1 text-sm text-gray-700 dark:text-gray-200"
        aria-labelledby="dropdownSmallButton"
      >
        <li class="flex">
          <img
            v-if="Notification"
            src="https://thumbs.dreamstime.com/b/default-profile-picture-avatar-photo-placeholder-vector-illustration-default-profile-picture-avatar-photo-placeholder-vector-189495158.jpg"
            class="w-20 h-20 m-2 rounded-full"
            alt=""
          />
          <div class="ml-2">
            <p class="font-bold">{{ Notification.title }} {{Notification.event_id}}</p>
            <p>
              <span
                v-if="
                  Notification.status === 'Rejected' ||
                  Notification.status == 0
                "
                class="text-red-500 cursor-pointer"
              >
                rejected
              </span>
              <span
                v-if="
                  Notification.status === 'Accepted' ||
                  Notification.status == 1
                "
                class="text-green-500 cursor-pointer"
              >
                Accepted
              </span>
            </p>
            <p>
              {{ Notification.message }}
            </p>
          </div>
        </li>
      </ul>
      <!-- end of notifacation from data base -->
    </div>
  </div>
</template>

<script setup>
// import Pusher from "pusher-js";
import { computed, onMounted, ref } from "vue";
import { useStore } from "vuex";
import axios from "axios";

// Pusher.logToConsole = true;
// var pusher = new Pusher("a69b81e700aaa217eaf4", {
//   cluster: "eu",
// });
// let resultO = ref([]);
// var answers = computed(() => {
//   return resultO.value;
// });

// const id = localStorage.getItem("user_id");
// var channel = pusher.subscribe("my-channel-" + id);

// channel.bind("my-event", function (data) {
//   var result1 = JSON.stringify(data);
//   var result = JSON.parse(result1);
//   resultO.value= result;
// });
const store = useStore();
const Notifications = computed(() => {
  return store.state.countC;
});
const notificationDb = computed(() => {
  return store.state.notificationDb;
});
onMounted(() => {
  if (!store.state.notificationDb.length) {
    store.dispatch("getNotifications");
  }
});
// store.dispatch("getNotifications");
</script>

<style>
</style>