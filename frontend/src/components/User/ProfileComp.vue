<template>
  <div>
    <div class="bg-primary-btn h-96">
      <img
        src="../../assets/images/DonateHome.png"
        alt="Profile Pic"
        class="image absolute rounded-full bg-white w-64 h-64 p-2"
      />
    </div>
    <div class="flex lg:flex-row md:flex-col py-32 justify-center gap-24">
      <div class="left">
        <div>
          <h1 class="text-blue-500">Update Profile</h1>
          <h2 class="text-red-600">Delete Profile</h2>
        </div>
      </div>
      <div><H1>|</H1></div>
      <div class="right">
        <form>
          <div class="flex flex-col">
            <label for="">First Name</label>
            <input type="text" class="border border-gray-400 p-2 lg:w-96" />
            <label for="">Last Name</label>
            <input type="text" class="border border-gray-400 p-2" />
            <label for="">Email</label>
            <input type="text" class="border border-gray-400 p-2" />
            <label for="">Password</label>
            <input type="text" class="border border-gray-400 p-2" />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProfileComp",
};
</script>

<style lang="scss" scoped>
.image {
  transform: translate(-50%, -50%);
  left: 50%;
  top: 57%;
}
</style>