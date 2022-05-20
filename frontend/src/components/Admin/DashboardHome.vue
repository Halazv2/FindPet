<template>
  <div class="dashboard p-4">
    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a
            href="#"
            class="
              inline-flex
              items-center
              text-sm
              font-medium
              text-gray-700
              hover:text-gray-900
              dark:text-gray-400 dark:hover:text-white
            "
          >
            <svg
              class="mr-2 w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
              ></path>
            </svg>
            Dashboard
          </a>
        </li>
      </ol>
    </nav>
    <div
      class="
        wrapper-card
        flex
        gap-5
        mt-4
        border-2 border-orange-500
        flex-col
        lg:flex-row
      "
    >
      <!-- card  -->
      <div
        class="
          card
          bg-white
          dark:bg-gray-800
          w-full
          h-full
          rounded-md
          p-5
          shadow
          flex
        "
      >
        <div class="p-2 max-w-sm border-2 border-orange-500 flex">
          <div class="border-2 border-orange-500 flex items-center">
            <div
              class="
                bg-orange-200
                rounded-full
                w-14
                h-14
                text-lg
                p-3
                border-2 border-orange-500
                text-orange-600
                flex
                items-center
                justify-center
                mx-auto
              "
            >
              <Icon icon="bi:file-post" width="200" />
            </div>
          </div>

          <div class="block p-2 w-full">
            <p class="font-semibold text-gray-900 dark:text-gray-200 text-xl">
              2 300 Posts
            </p>
            <h2 class="font-normal text-gray-400 text-md mt-1">Total Posts</h2>
          </div>
        </div>
      </div>
      <!-- end card -->
      <div
        class="
          card
          bg-white
          dark:bg-gray-800
          w-full
          h-full
          rounded-md
          p-5
          shadow
          flex
        "
      >
        <div class="p-2 max-w-sm border-2 border-orange-500 flex">
          <div class="border-2 border-orange-500 flex items-center">
            <div
              class="
                bg-green-200
                rounded-full
                w-14
                h-14
                text-lg
                p-3
                text-green-600
                mx-auto
                flex
                items-center
                justify-center
              "
            >
              <Icon icon="fa6-solid:users" width="200" />
            </div>
          </div>

          <div class="block p-2 w-full">
            <p class="font-semibold text-gray-900 dark:text-gray-200 text-xl">
              2 300 908
            </p>
            <h2 class="font-normal text-gray-400 text-md mt-1">Total Users</h2>
          </div>
        </div>
      </div>
      <!-- end card -->
      <div
        class="
          card
          bg-white
          dark:bg-gray-800
          w-full
          h-full
          rounded-md
          p-5
          shadow
          flex
        "
      >
        <div class="p-2 max-w-sm border-2 border-orange-500 flex">
          <div class="border-2 border-orange-500 flex items-center">
            <div
              class="
                bg-purple-200
                rounded-full
                w-14
                h-14
                text-lg
                p-3
                text-purple-600
                mx-auto
              "
            >
              <span class="">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true"
                  role="img"
                  width="30px"
                  height="30px"
                  preserveAspectRatio="xMidYMid meet"
                  viewBox="0 0 16 16"
                >
                  <g fill="currentColor">
                    <path d="M15 13v1H1.5l-.5-.5V0h1v13h13Z" />
                    <path
                      d="M13 3.207L7.854 8.354h-.708L5.5 6.707l-3.646 3.647l-.708-.708l4-4h.708L7.5 7.293l5.146-5.147h.707l2 2l-.707.708L13 3.207Z"
                    />
                  </g>
                </svg>
              </span>
            </div>
          </div>

          <div class="block p-2 w-full">
            <p class="font-semibold text-gray-900 dark:text-gray-200 text-xl">
              7 230
            </p>
            <h2 class="font-normal text-gray-400 text-md mt-1">Total Visit</h2>
          </div>
        </div>
      </div>
      <!-- end card -->
    </div>
    <div class="mt-2 lg:flex block lg:gap-2 border-2 border-orange-500">
      <div
        class="
          bg-white
          dark:bg-gray-800
          p-5
          w-full
          rounded-md
          box-border
          shadow
        "
      >
        <h2 class="font-bold text-lg text-gray-800 dark:text-gray-200">
          Users table
        </h2>
        <p class="text-gray-400 font-lexend font-normal">your users table</p>
        <!-- <span class="float-right mr-20">
          <h2 class="text-red-500 -mt-12 flex">
            <span class="mr-2"> sdqsdq </span
            ><span>
              <Icon icon="akar-icons:arrow-down" />
            </span>
          </h2>
        </span>
        <span class="float-right">
          <h2 class="text-green-500 -mt-12 flex">
            <span class="mr-2"> qsdq </span
            ><span>
              <Icon icon="akar-icons:arrow-up" />
            </span>
          </h2>
        </span> -->
        <br />
        <!--- table -->
        <div class="table-responsive">
          <section class="container mx-auto font-mono">
            <div class="w-full mb-8 overflow-hidden">
              <div class="w-full overflow-x-auto">
                <table class="w-full">
                  <thead>
                    <tr
                      class="
                        text-md
                        font-semibold
                        tracking-wide
                        text-left text-gray-900
                        bg-gray-100
                        uppercase
                        border-b border-gray-600
                      "
                    >
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">Age</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3">Date</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr class="text-gray-700">
                      <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                          <div
                            class="relative w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src=""
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold text-black">Sufyan</p>
                            <p class="text-xs text-gray-600">Developer</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-ms font-semibold border">22</td>
                      <td class="px-4 py-3 text-xs border">
                        <span
                          class="
                            px-2
                            py-1
                            font-semibold
                            leading-tight
                            text-green-700
                            bg-green-100
                            rounded-sm
                          "
                        >
                          Acceptable
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm border">6/4/2000</td>
                    </tr>
                    <tr class="text-gray-700">
                      <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                          <div class="relative w-8 h-8 mr-3 rounded-full">
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src=""
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold text-black">Stevens</p>
                            <p class="text-xs text-gray-600">Programmer</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-md font-semibold border">27</td>
                      <td class="px-4 py-3 text-xs border">
                        <span
                          class="
                            px-2
                            py-1
                            font-semibold
                            leading-tight
                            text-orange-700
                            bg-gray-100
                            rounded-sm
                          "
                        >
                          Pending
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm border">6/10/2020</td>
                    </tr>
                    <tr class="text-gray-700">
                      <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                          <div class="relative w-8 h-8 mr-3 rounded-full">
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src=""
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">Nora</p>
                            <p class="text-xs text-gray-600">Designer</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-md font-semibold border">17</td>
                      <td class="px-4 py-3 text-xs border">
                        <span
                          class="
                            px-2
                            py-1
                            font-semibold
                            leading-tight
                            text-red-700
                            bg-red-100
                            rounded-sm
                          "
                        >
                          Nnacceptable
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm border">6/10/2020</td>
                    </tr>
                    <tr class="text-gray-700">
                      <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                          <div class="relative w-8 h-8 mr-3 rounded-full">
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src=""
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">Ali</p>
                            <p class="text-xs text-gray-600">Programmer</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 border text-md font-semibold">23</td>
                      <td class="px-4 py-3 border text-xs">
                        <span
                          class="
                            px-2
                            py-1
                            font-semibold
                            leading-tight
                            text-green-700
                            bg-green-100
                            rounded-sm
                          "
                        >
                          Acceptable
                        </span>
                      </td>
                      <td class="px-4 py-3 border text-sm">6/10/2020</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
        <hr />
        <br />
        <div class="wrapper-button mt-3">
          <button
            class="
              uppercase
              float-right
              -mt-7
              border-b border-red-600
              text-red-600
            "
          >
            Sales Report
          </button>
        </div>
      </div>

      <div
        class="
          bg-white
          dark:bg-gray-800
          p-5
          lg:w-96 lg:mt-0
          mt-4
          shadow
          rounded-md
          w-full
        "
      >
        <h2 class="dark:text-gray-200 text-xl font-bold">New Users</h2>
        <p class="text-gray-400">This is list if your new users.</p>
        <div class="mt-4 grid grid-cols-1 gap-4">
          <button class="w-full box-border flex items-center gap-4">
            <span>
              <img src="" alt="" width="50" height="50" class="rounded-full" />
            </span>
            <span class="text-left">
              <h1 class="font-bold text-xl dark:text-gray-200">Hafid Fauzi</h1>
            </span>
          </button>
          <button class="w-full box-border flex items-center gap-4">
            <span>
              <img src="" alt="" width="50" height="50" class="rounded-full" />
            </span>
            <span class="text-left">
              <h1 class="font-bold text-xl dark:text-gray-200">Hala Ziani</h1>
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";
export default {
  components: {
    Icon,
  },
  name: "dashboard-card",
};
</script>

<style>
</style>