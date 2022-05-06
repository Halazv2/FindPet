<template>
  <div class="container">
    <figure>
      <img src="../../assets/images/support.png" alt="" />
    </figure>
    <div>
      <div
        class="
          py-16
          font-bold
          text-4xl text-center
          flex
          items-center
          justify-center
          gap-6
          flex-col
          lg:flex-row
        "
      >
        <h1>MAKE A DIFFERENCE <span class="text-primary-btn">DONATE</span></h1>
      </div>
      <div class="flex items-center  flex-col lg:flex-row justify-center">
          <p class="w-[40%] text-left">
            Help the animals by donating items from your home, you can donate
            anything : food, pet clothes, money Please consider donating still
            serviceable medical supplies to our Medical Donation Program
          </p>
        <img src="../../assets/images/halfdog.png"  class="w-[50%] bg-primary-btn rounded-lg" alt="" />
      </div>
      <h2 class="w-2/3 py-7 text-left text-xl font-bold">
        Wish List Top Needs List
      </h2>
      <p class="w-2/3 text-left">
        Canned dog and puppy food – any variety <br />
        Canned cat and kitten food – any variety <br />
        Kitten Milk Replacement <br />
        Pet Ag Esbilac Powder (Puppy Milk Replacement) <br />
        Snuggle Safe Heating Pads <br />
        Universal Adjustable Dog Seatbelts <br />
        Feliway Plugins and Refills<br />

        Wobble Kongs <br />
        Liter Boxes of all sizes <br />
      </p>
      <div class="py-16 flex justify-evenly items-center">
        <p class="py-7 text-left text-xl font-bold">
          You can Donate money from <br />
          <a
            href="https://www.patreon.com/posts/help-animals-by-65621966?utm_medium=clipboard_copy&utm_source=copy_to_clipboard&utm_campaign=postshare"
            class="text-primary-btn"
            >HERE (click me)</a
          >
        </p>
        <!-- <img src="../../assets/images/screen.png" width="30%" alt="" /> -->
        <iframe
          src="https://www.patreon.com/FindPet/"
          allowfullscreen
          width="400"
          height="200"
          title="sqd"
          frameborder="0"
        ></iframe>
        <div></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      patreonPost: {},
    };
  },
  mehtodes: {},
};
</script>

<style lang="scss" scoped>
</style>