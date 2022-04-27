<template>
  <div class="py-16" data-aos="fade-up" data-aos-delay="50">
    <div class="py-16 font-bold text-3xl text-center">
      Lend a helping hand and <span class="text-primary-btn">CHANGE LIVES</span>
    </div>
    <div class="flex justify-evenly flex-wrap gap-4">
      <div
        class="card w-80 bg-base-100 shadow-xl"
        v-for="(cards, index) in cards"
        :key="index"
      >
        <figure class="px-10 pt-10">
          <img :src="cards.img" alt="Cat" class="rounded-xl" />
        </figure>
        <div class="card-body items-center text-center">
          <h2 class="card-title">{{ cards.titel }}</h2>
          <div class="card-actions">
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
              {{ cards.but }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HeroComp",
  data() {
    return {
      cards: [
        {
          img: require(`@/assets/images/adoptHome.png`),
          titel: "ADOPT YOUR NEW FURRY FRIEND",
          but: "Addopt",
        },
        {
          img: require(`@/assets/images/VolunteerHome.png`),
          titel: "JOIN OUR CAUSE: VOLUNTEER",
          but: "Volunteer",
        },
        {
          img: require(`@/assets/images/DonateHome.png`),
          titel: "MAKE A DIFFERENCE: DONATE",
          but: "Donate",
        },
      ],
    };
  },
};
</script>
