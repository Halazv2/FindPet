<template>
  <div>
    <h1>Our Sponsors & Partners</h1>
    <!-- card -->
    <hooper class="scrolling flex justify-center m-16 ">
      <div class="card ">
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
      <div class="card ">
        <div class="card card-compact w-48 bg-base-100 shadow-xl h-48">
          <figure>
            <img
              src="../../assets/images/Sponsors/SFT.png"
              alt="SFT"
            />
          </figure>
        </div>
      </div>
      <div class="card ">
        <div class="card card-compact w-48 bg-base-100 shadow-xl h-48">
          <figure>
            <img
              src="../../assets/images/Sponsors/Logo-SPA-Salon.png"
              alt="SFT"
            />
          </figure>
        </div>
      </div>
    </hooper>
  </div>
</template>

<script>
  import { Hooper, Slide } from 'hooper';
  import 'hooper/dist/hooper.css';
  export default {
    name: 'App',
    components: {
      Hooper,
      Slide
    }
  }
</script>

<style lang="scss" scoped>
.scrolling {
  gap: 10px;
  .card{
      display: flex;
      justify-content: center;
      align-items: center;
  }
}

</style>