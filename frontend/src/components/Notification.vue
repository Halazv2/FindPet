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
    <ul
      class="py-1 text-sm text-gray-700 dark:text-gray-200"
      aria-labelledby="dropdownSmallButton"
    >
      <li class="flex">
        <img
          src="https://thumbs.dreamstime.com/b/default-profile-picture-avatar-photo-placeholder-vector-illustration-default-profile-picture-avatar-photo-placeholder-vector-189495158.jpg"
          class="w-20 h-20 m-2 rounded-full"
          alt=""
        />
        <div class="ml-2">
          <p class="font-bold">3onwan</p>
          <p>
            <span class="text-green-500 cursor-pointer"> accepted </span>
            or
            <span class="text-red-500 cursor-pointer"> rejected </span>
          </p>
          <ul>
            <!-- <li v-for="message in Anwser" :key="message">
              {{ Anwser.status }}
            </li> -->
            {{
              Anwser
            }}
          </ul>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>

import Pusher from "pusher-js";
import {computed,ref} from "vue";
Pusher.logToConsole = true;
var pusher = new Pusher("a69b81e700aaa217eaf4", {
  cluster: "eu",
});
let resultO = ref([]);
var Anwser = computed(()=>{
    return resultO;
});

const id = localStorage.getItem("user_id");
var channel = pusher.subscribe("my-channel-" + id);

channel.bind("my-event", function (data) {
  resultO.value.push(data);
});

</script>

<style>
</style>