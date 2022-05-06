<template>
  <div class="">
            <div class="bg-white pb-10 ">
            <div class="flex flex-col gap-1 text-center items-center">
              <div class="bg-primary-btn h-80 relative w-[100%] justify-center flex items-end ">
                <img class="image absolute  h-40 w-40  bg-white p-2 rounded-full " src="../../assets/images/riven.jpeg" alt="">
                </div>
                <div class="mt-24">
                <p class="font-semibold">Riven</p>
                <div class="text-sm leading-normal text-gray-400 flex justify-center items-center">
                <svg viewBox="0 0 24 24" class="mr-1" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Oujda, Oriental
                </div>
                </div>
            </div>
            <div class="flex justify-center items-center gap-2 my-3">
                <div class="font-semibold text-center mx-4">
                    <p class="text-black">102</p>
                    <span class="text-gray-400">Posts</span>
                </div>
                <div class="font-semibold text-center mx-4">
                    <p class="text-black">102</p>
                    <span class="text-gray-400">Followers</span>
                </div>
                <div class="font-semibold text-center mx-4">
                    <p class="text-black">102</p>
                    <span class="text-gray-400">Folowing</span>
                </div>
            </div>
        </div>

<div class=" min-h-screen bg-base-100 py-8">
  <div class="flex justify-around items-center  flex-col lg:flex-row">
    <div class="flex flex-col gap-7">
    <div class="text-center lg:text-left text-blue-600 font-semibold">
      <a href="">Update Account</a>
    </div>
    <div class="text-center lg:text-left text-red-600 font-semibold">
      <a href="">Delete acoount</a>
    </div>
    </div>
    <div class="card flex-shrink-0 w-full max-w-sm ">
      <div class="card-body">
        <div class="form-control">
          <label class="label">
            <span class="label-text">First name</span>
          </label>
          <input type="text" placeholder="First name" class="input input-bordered" />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Last name</span>
          </label>
          <input type="text" placeholder="Last name" class="input input-bordered" />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" placeholder="Email" class="input input-bordered" />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" placeholder="**************" class="input input-bordered" />
        </div>
        <div class="form-control mt-6">
          <button class="btn bg-primary-btn border-none rounded-full hover:bg-secondary-brn">Login</button>
        </div>
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
//center the image in the div bottom 
.image {
  left: 50%;
  top: 83%;
  transform: translate(-50%, -15%);
}
</style>