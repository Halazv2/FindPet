<template>
  <div class="container mx-auto">
    <header class="flex items-center justify-evenly">
      <div class="w-[30%] flex flex-col gap-4">
        <h1 class="text-2xl">
          Let's make a better community <span class="font-bold">TOGETHER</span>
        </h1>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
        </p>

        <button
          class="
            rounded-full
            w-[180px]
            h-[46px]
            flex
            items-center
            justify-center
            bg-primary-btn
            text-white
            hover:bg-secondary-brn
          "
        >
          <img
            src="../../../assets/images/AdoptPetIcon.png"
            class="w-9"
            alt=""
          />
          <h1 class="font-semibold">ADOPT A PET</h1>
        </button>
      </div>
      <div>
        <img
          class="w-[600px]"
          src="../../../assets/images/Home-hero.png"
          alt="DogAndCat"
        />
      </div>
    </header>
    <HomeHeroComp />
  </div>
</template>

<script>
import HomeHeroComp from "./HomeHeroComp.vue";
export default {
  name: "Home-Comp",
  components: { HomeHeroComp },
};
</script>

<style>
</style>