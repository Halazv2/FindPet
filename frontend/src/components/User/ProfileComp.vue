<template>
  <div class="flex justify-center">
    <!-- <div class="bg-primary-btn h-96">
      <img
        src="../../assets/images/DonateHome.png"
        alt="Profile Pic"
        class="image absolute rounded-full bg-white w-64 h-64 p-2"
      />
    </div>
    <div class="flex lg:flex-row md:flex-col py-32 justify-center gap-24">
      <div class="left flex items-center">
        <div class="flex flex-col gap-6">
          <a class="text-blue-500">Update Profile</a>
          <a class="text-red-600">Delete Profile</a>
        </div>
      </div>
      <div class="line"></div>
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
    </div> -->
    <div
      class="
        relative
        w-screen
        h-
        bg-white
        rounded-lg
        shadow-lg
        overflow-hidde
        mb-32
      "
    >
      <div class="absolute inset-0 overflow-hidden bg-primary-btn h-96">
        <div
          class="
            absolute
            inset-0
            backdrop backdrop-blur-10
            bg-gradient-to-b
            from-transparent
            to-black
          "
        ></div>
      </div>
      <div class="  flex items-end">
        <div class="profile absolute flex space-x-6">
          <div class="w-36 h-36 rounded-lg shadow-lg overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1543794327-59a91fb815d1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
              alt=""
            />
          </div>
          <div class="text-white pt-12">
            <h3 class="font-bold">Joe Boe</h3>
            <div class="text-sm opacity-60">Riven</div>
          </div>
        </div>
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
//create vertical line
.line {
  border-left: 1px solid #777;
}
//design input field
input {
  border-radius: 12px;
  background: rgba(255, 255, 255, 0.627);
  font-size: 1.2rem;
}
label {
  margin-top: 6px;
  margin-bottom: 3px;
}
</style>