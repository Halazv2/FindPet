<template>
  <div class="flex items-center">
    <div class="flex gap-3">
      <div>
        <img
          class="inline-block h-20 w-20 rounded-full"
          :src="
            `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
            post.ProfilePic
          "
        />
      </div>
      <div
        class="
          flex
          justify-center
          text-gray-600
          dark:text-white
          text-sm
          flex-col
        "
      >
        <div class="mb-1 font-semibold">
          {{ post.FirstName }} {{ post.LastName }}
        </div>
        <div class="flex">
          <Icon icon="ic:outline-place" width="20" /> {{ post.City }}
          &nbsp;
          <Icon icon="ic:outline-alternate-email" width="24" />
          {{ post.Email }}
        </div>
        <div class="flex ju">
          <a :href="`https://wa.me/` + post.PhoneNumber" target="_blanc">
            <button
              class="
                text-white
                flex
                p-2
                rounded-md
                font-semibold
                bg-primary-btn
                hover:bg-secondary-brn
                outline-none
                border-none
              "
            >
              <Icon icon="akar-icons:whatsapp-fill" width="19" /> &nbsp; Contact
            </button>
          </a>
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
  props: {
    post: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>