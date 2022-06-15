<template>
  <div class="flex flex-col items-center">
    <h1 class="font-bold text-4xl flex flex-col lg:flex-row py-7 ">Our Sponsors & Partners</h1>
    <!-- card -->
    <div class="scrolling flex flex-wrap justify-center mb-16 ">
      <div class="card">
        <div class="card card-compact w-48 bg-base-100 shadow-xl h-48">
          <figure>
            <img
              src="../../assets/images/Sponsors/PetForAdoption.png"
              alt="Pet For Adoption"
            />
          </figure>
        </div>
      </div>
      <div class="card">
        <div class="card card-compact w-48 bg-base-100 shadow-xl h-48">
          <figure>
            <img
              src="../../assets/images/Sponsors/ANIMAL-NOW.png"
              alt="Pet For Adoption"
            />
          </figure>
        </div>
      </div>
      <div class="card">
        <div class="card card-compact w-48 bg-base-100 shadow-xl h-48">
          <figure>
            <img src="../../assets/images/Sponsors/SFT.png" alt="SFT" />
          </figure>
        </div>
      </div>
      <div class="card">
        <div class="card card-compact w-48 bg-base-100 shadow-xl h-48">
          <figure>
            <img
              src="../../assets/images/Sponsors/Logo-SPA-Salon.png"
              alt="SFT"
            />
          </figure>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "App",
  components: {},
};
</script>

<style lang="scss" scoped>
.scrolling {
  gap: 10px;
  .card {
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
</style>