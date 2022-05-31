<template>
  <!--User row -->
  <div>
    <div
      class="
        user
        flex
        items-center
        text-center
        flex-col
        sm:flex-row sm:text-left
      "
    >
      <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-2.5">
        <img
          class="avatar rounded-full w-16 h-16"
          :src="
            `http://localhost/fil-rouge-find-pet/uploads/profileImages/` +
            comment.ProfilePic
          "
        />
      </div>
      <div class="user-body flex flex-col">
        <a href="#" class="title font-medium no-underline">
          {{ comment.FirstName }}
        </a>
        <div class="skills flex flex-col">
          <span class="subtitle text-slate-500 text-left">
            {{ comment.comment }}
          </span>
        </div>
      </div>
    </div>
    <!--User row -->
  </div>

</template>

<script>
export default {
  props: {
    comment: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style>
</style>