<template>
  <div>
    <div class="container mx-auto">
      <header class="flex items-center justify-evenly">
        <div class="header-container w-[40%] flex flex-col gap-4">
          <h1 class="text-3xl">
            Let's make a better community
            <span class="font-bold text-primary-btn"><br> TOGETHER</span>
          </h1>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever
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
            class="dogandcat w-[600px]"
            src="../../../assets/images/Home-hero.png"
            alt="DogAndCat"
          />
        </div>
      </header>
    </div>
    <div class="cards-section ">
    <HomeHeroComp />
    <MatchHomeComp />
    </div>
  </div>
</template>

<script>
import HomeHeroComp from "./HomeHeroComp.vue";
import MatchHomeComp from "./MatchHomeComp.vue";
export default {
  name: "Home-Comp",
  components: { HomeHeroComp, MatchHomeComp },
};
</script>

<style lang="scss" scoped>
.cards-section {
  background-image: url(../../../assets/images/paws.png);
  background-size: 100vh;
}
@media (max-width: 768px) {
  header {
    flex-direction: column;
    .header-container {
      width: 100%;
      padding-left: 10px;
      padding-right: 10px;
      text-align: center;
      align-items: center;
      margin-top: 50px;
      .dogandcat {
        height: 20%;
        width: 400px;
      }
    }
  }
}
</style>