<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
      <h1
        class="
          text-3xl
          font-semibold
          text-center text-gray-800
          capitalize
          lg:text-4xl
          dark:text-white
        "
      >
        Assign your role
      </h1>
      <p
        class="
          max-w-2xl
          mx-auto
          my-6
          text-center text-gray-500
          dark:text-gray-300
        "
      >
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt
        ex placeat modi magni quia error alias, adipisci rem similique, at omnis
        eligendi optio eos harum.
      </p>
      <div class="flex justify-evenly">
        <div
          v-for="(item, index) in card"
          :key="index"
          class="grid grid-cols-1 gap-8 mt-8 "
        >
          <router-link
          :to="item.link"
            class="
              flex flex-col
              items-center
              p-8
              transition-colors
              duration-200
              transform
              cursor-pointer
              justify-center
              text-center
              group
              hover:bg-secondary-brn
              rounded-xl
            "
          >
            <img
              class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300"
              :src="item.image"
              alt=""
            />

            <h1
              class="
                mt-4
                text-2xl
                font-semibold
                text-gray-700
                capitalize
                dark:text-white
                group-hover:text-white
              "
            >
              {{ item.name }}
            </h1>

            <p
              class="
                mt-2
                text-gray-700
                capitalize
                dark:text-white
                group-hover:text-white
              "
            >
              {{ item.title }}
            </p>
          </router-link>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      card: [
        {
          name: "Admin",
          title: "Admin Dashboard",
          image:
            "https://us.123rf.com/450wm/igoun/igoun1903/igoun190300114/120383965-king-user-icon-logo-design-element-admin-icon-administrator-crowned-king-sign-manager-symbol-power-u.jpg?ver=6",
          link: "/LoginAdmin",
        },
        {
          name: "User",
          title: "User Dashboard",
          image:
            "https://as2.ftcdn.net/v2/jpg/01/88/16/11/1000_F_188161178_iyfS7Nv8tPefqfIFYaVF1ZdoDXW6w3LV.jpg",
          link: "/Login",
        },
      ],
    };
  },
};
</script>

<style>
</style>