<template>
<div>
  <div>{{this.$store.state.isLoggedIn}}</div>
  <profile-comp />
</div>
</template>

<script>
import ProfileComp from '../components/User/ProfileComp.vue';
export default {
  components: { ProfileComp },
  name: "ProfileView",
};
</script>

<style>
</style>