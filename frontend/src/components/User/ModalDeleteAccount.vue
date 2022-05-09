<template>
  <div>
    <div class="w-full flex justify-center">
      <div class="modal-box relative">
        <div class="modal-action">
          <label
            for="my-modal-6"
            class="btn btn-error btn-sm btn-circle absolute right-2 top-2"
            >✕</label
          >
        </div>
        <h3 class="font-bold text-lg">
          Are You sure you want to delete Your account!
        </h3>
        <p class="py-4">
          Keep in mind if you delete account you can't get it back ! <br />
          Then you have to create a new account.
        </p>
        <div class="modal-action">
          <label @click="DeleteAccount" class="btn btn-error">Yes</label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DeleteAccount",
  methods: {
    DeleteAccount() {
      alert("Account Deleted");
    },
  },
};
</script>

<style>
</style>