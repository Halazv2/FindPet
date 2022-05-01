<template>
  <div>
    <div class="relative py-16">
      <div class="m-auto md:w-[90%] lg:w-5/12">
        <div class="rounded-xl bg-white shadow-xl">
          <div class="p-6 sm:p-16">
            <h1 class="mb-6">Join our community</h1>
            <div class="space-y-4">
              <form class="w-full max-w-lg text-left">
                <div class="flex flex-col -mx-3 mb-6">
                  <div class="w-full px-3 mb-6">
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-2
                      "
                      for="grid-first-name"
                    >
                      First Name <span class="text-red-700">*</span>
                    </label>
                    <!-- <input class="appearance-none block w-full  text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane"> -->
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                    <input
                      class="
                        appearance-none
                        block
                        w-full
                        text-gray-700
                        border border-gray-200
                        rounded
                        py-3
                        px-4
                        leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500
                      "
                      id="grid-last-name"
                      type="text"
                      placeholder="Joe Belle"
                    />
                  </div>
                  <div class="w-full px-3 mb-6">
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-2
                      "
                      for="grid-first-name"
                    >
                      Last Name <span class="text-red-700">*</span>
                    </label>
                    <!-- <input class="appearance-none block w-full  text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane"> -->
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                    <input
                      class="
                        appearance-none
                        block
                        w-full
                        text-gray-700
                        border border-gray-200
                        rounded
                        py-3
                        px-4
                        leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500
                      "
                      id="grid-last-name"
                      type="text"
                      placeholder="Joe Belle"
                    />
                  </div>
                  <div class="w-full px-3">
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-2
                      "
                      for="grid-last-name"
                    >
                      Email <span class="text-red-700">*</span>
                    </label>
                    <input
                      class="
                        appearance-none
                        block
                        w-full
                        text-gray-700
                        border border-gray-200
                        rounded
                        py-3
                        px-4
                        leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500
                      "
                      id="grid-last-name"
                      type="text"
                      placeholder="pat@shuffle.dev"
                    />
                  </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                    <label
                      class="
                        block
                        uppercase
                        tracking-wide
                        text-gray-700 text-xs
                        font-bold
                        mb-2
                      "
                      for="grid-password"
                    >
                      Password <span class="text-red-700">*</span>
                    </label>
                    <input
                      type="password"
                      class="
                        appearance-none
                        block
                        w-full
                        text-gray-700
                        border border-gray-200
                        rounded
                        py-3
                        px-4
                        mb-3
                        leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500
                      "
                      id="grid-password"
                    />
                  </div>
                </div>
                <div class="card-actions">
                  <button
                    class="
                      rounded
                      w-[100%]
                      h-[46px]
                      flex
                      items-center
                      justify-center
                      mx-auto
                      bg-primary-btn
                      text-white
                      hover:bg-secondary-brn
                    "
                  >
                    Send
                  </button>
                </div>
                <div class="mt-4 grid space-y-4">
                  <button
                    class="
                      group
                      h-12
                      px-6
                      border-2 border-gray-300
                      rounded
                      transition
                      duration-300
                      hover:border-primary-btn
                      focus:bg-blue-50
                      active:bg-secondary-brn
                    "
                  >
                    <div
                      class="
                        relative
                        flex
                        items-center
                        space-x-4
                        justify-center
                      "
                    >
                      <img
                        src="https://tailus.io/sources/blocks/social/preview/images/google.svg"
                        class="absolute left-0 w-5"
                        alt="google logo"
                      />
                      <span
                        class="
                          block
                          w-max
                          font-semibold
                          tracking-wide
                          text-gray-700 text-sm
                          transition
                          duration-300
                          group-hover:text-primary-btn
                          sm:text-base
                        "
                        >Continue with Google</span
                      >
                    </div>
                  </button>
                </div>
              </form>
              <p>
                Already have an account?
                <span class="text-primary-btn">Sign In</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
h1 {
  font-family: "Montserrat";
  font-style: normal;
  font-weight: 800;
  font-size: 42px;
  line-height: 51px;
}
</style>