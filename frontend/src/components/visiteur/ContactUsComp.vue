<template>
  <div class="container mx-auto">
    <div class="ml-14">
      <h1 class="border-2 border-slate-700 ">
        Sign up and stay <br />
        <span class="text-primary-btn">CONNECTED</span>
      </h1>
      
    </div>
    <div class="flex flex-col items-center">
      <center>
        <p>
          Once we have received your enquiry, we will contact you promptly.
          <br />
          Please fill in fields with the
          <span class="text-red-700">*</span> asterisk, so we can send you a
          full and informative reply.
        </p>
      </center>
    </div>

    <div class="flex justify-center py-16">
      <div class="rounded card w-[554px] bg-base-100 shadow-xl">
        <div class="card-body items-center">
          <form class="w-full max-w-lg">
            <div class="flex flex-col -mx-3 mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
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
              <div class="w-full py-3 px-3">
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
                  Message <span class="text-red-700">*</span>
                </label>
                <textarea
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
                ></textarea>
                <p class="text-gray-600 text-xs italic">
                  Make it as long and as crazy as you'd like
                </p>
              </div>
            </div>
            <div class="card-actions">
              <button
                class="
                  rounded-full
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
          </form>
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