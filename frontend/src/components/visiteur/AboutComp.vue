<template>
  <div class="container mx-auto">
    <figure class="flex justify-center">
      <img
        src="../../assets/images/AboutHero.png"
        alt=""
        data-aos="zoom-in-up"
        srcset=""
      />
    </figure>
    <div
      class="flex justify-center flex-col items-center py-16"
      data-aos="fade-up"
      data-aos-delay="50"
    >
      <div class="Content">
        <div class="discription lg:w-[40%]">
          <h1>WHO WE ARE</h1>
          <p>
            Our Mission is to promote the welfare and adoption of companion
            animals, and nurture loving, lifelong relationships between animals
            and people.
          </p>
        </div>
        <figure>
          <img src="../../assets/images/AboutLeftImg.png" alt="" />
        </figure>
      </div>
      <div
        class="py-12 Content Content-2"
        data-aos="fade-up"
        data-aos-delay="50"
      >
        <figure>
          <img
            src="../../assets/images/AboutRightImg.png"
            data-aos="fade-up"
            data-aos-delay="50"
            alt=""
          />
        </figure>
        <div class="discription lg:w-[40%]">
          <h1>HOW YOU CAN GET INVOLVED</h1>
          <p>
            We know FindPet will be successful because of our amazing community.
            Whether by adopting, donating, or volunteering, you'll be making a
            difference for a homeless pet in need.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
@media (max-width: 768px) {
  .Content {
    width: 90%;
    .discription {
      width: 100%;
    }
  }
  .Content-2 {
    flex-direction: column-reverse;
  }
}
.Content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  //   width: 75%;
  gap: 30px;
  .discription {
    h1 {
      color: #f18733;
      font-family: "Montserrat";
      font-style: normal;
      font-weight: 800;
      font-size: 42px;
      line-height: 51px;
    }
    p {
      font-family: "Montserrat";
      font-style: normal;
      // font-weight: 400;
      // font-size: 20px;
      line-height: 24px;
    }
  }
}
</style>