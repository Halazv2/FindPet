<template>
  <div class="container">
    <figure>
      <img src="../../assets/images/support.png" class="px-11" alt="" />
    </figure>
    <div>
      <div class="flex items-center flex-col lg:flex-row justify-center p-11">
        <div class="lg:w-[45%] pb-7">
          <div class="font-bold text-4xl flex flex-col lg:flex-row py-7">
            <h1>
              MAKE A DIFFERENCE <span class="text-primary-btn">DONATE</span>
            </h1>
          </div>
          <p class="text-left">
            Help the animals by donating items from your home, you can donate
            anything : food, pet clothes, money Please consider donating still
            serviceable medical supplies to our Medical Donation Program
          </p>
        </div>

        <img
          src="../../assets/images/halfdog.png"
          class="lg:w-[50%] bg-primary-btn rounded-lg"
          alt=""
        />
      </div>
      <div class="flex justify-center flex-col-reverse lg:flex-row gap-20 p-11">
        <figure class=" bg-primary-btn rounded-lg">
          <img src="../../assets/images/aa.png" class=" " alt="" />
        </figure>
        <div>
          <h2 class=" py-7 text-left text-4xl font-bold">
            <span class="text-primary-btn">Wish-List</span>
             Top Needs List
          </h2>
          <p class=" text-left">
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
        </div>
      </div>
      <div class="py-16 flex flex-col p-11 justify-evenly items-center">
        <h2 class="h2y-7 text-4xl font-bold text-center py-5">
          You can Donate money from <br />
          <a
            href="https://www.patreon.com/posts/help-animals-by-65621966?utm_medium=clipboard_copy&utm_source=copy_to_clipboard&utm_campaign=postshare"
            class="text-primary-btn"
            >HERE (click me)</a
          >
        </h2>
        <img src="../../assets/images/screen.png" width="" alt="" />
        <!-- <iframe
          src="https://www.patreon.com/FindPet/"
          allowfullscreen
          width="400"
          height="200"
          title="sqd"
          frameborder="0"
        ></iframe> -->
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
h2 {
  font-family: "Montserrat";
  font-style: normal;
}
p {
  font-family: "Montserrat";
  font-style: normal;
  font-size: 16px;
  line-height: 24px;
}
</style>