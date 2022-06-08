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
      <div>notification</div>
    </div>
    <div v-if="Anwsers.length <= 0" class="ml-3">
      <a>No notifacation</a>
    </div>
    <ul
      v-for="(Anwser, index) in Anwsers"
      :key="index"
      class="py-1 text-sm text-gray-700 dark:text-gray-200"
      aria-labelledby="dropdownSmallButton"
    >
      <li class="flex">
        <img
          v-if="Anwser"
          src="https://thumbs.dreamstime.com/b/default-profile-picture-avatar-photo-placeholder-vector-illustration-default-profile-picture-avatar-photo-placeholder-vector-189495158.jpg"
          class="w-20 h-20 m-2 rounded-full"
          alt=""
        />
        <div class="ml-2">
          <p class="font-bold">{{ Anwser.title }}</p>
          <p>
            <span
              v-if="Anwser.status === 'Rejected'"
              class="text-red-500 cursor-pointer"
            >
              rejected
            </span>
            <span
              v-if="Anwser.status === 'Accepted'"
              class="text-green-500 cursor-pointer"
            >
              Accepted
            </span>
          </p>
          <p>
            {{ Anwser.message }}
          </p>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
// import Pusher from "pusher-js";
import { computed } from "vue";
import { useStore } from "vuex";

// Pusher.logToConsole = true;
// var pusher = new Pusher("a69b81e700aaa217eaf4", {
//   cluster: "eu",
// });
// let resultO = ref([]);
// var Anwser = computed(() => {
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
const Anwsers = computed(() => {
  return store.state.answers;
});
</script>

<style>
</style>