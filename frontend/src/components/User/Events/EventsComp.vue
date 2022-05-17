<template>
  <div>
    <div class="w-full lg:flex">
      <div class="bg-base-200 rounded-lg">
        <div
          class="
            hero-content
            bg-white
            dark:bg-gray-800 dark:text-white
            shadow
            light:bg-gray-800
            px-4
            flex-col
            lg:flex-row
          "
        >
          <img
            src="https://moroccoanimalaid.com/wp-content/uploads/2020/04/Adoption2.jpg"
            class="max-w-sm rounded-lg shadow-2xl"
          />
          <div>
            <div>
              <h1 class="text-5xl font-bold">
                Animal Shelter Group Volunteering
              </h1>
              <p class="py-6">
                Provident cupiditate voluptatem et in. Quaerat fugiat ut
                assumenda excepturi exercitationem quasi. In deleniti eaque aut
                repudiandae et a id nisi.
              </p>
            </div>
            <div class="flex items-center justify-between">
              <button
                class="btn bg-primary-btn hover:bg-secondary-brn border-none"
              >
                VOLUNTEER
              </button>
              <div class="mr-6 flex items-center">
                <img
                  class="w-14 h-14 rounded-full mr-1"
                  src="../../../assets/images/iconLocalisation.png"
                  alt="Avatar of Jonathan Reinink"
                />
                <div class="text-sm">
                  <p class="text-black leading-none">Safi</p>
                  <p class="text-grey-dark">Aug 18</p>
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
export default {
  name: "EventsComp",
};
</script>

<style>
</style>