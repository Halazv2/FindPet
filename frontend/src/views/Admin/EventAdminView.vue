<template>
  <div class="adminEvent">
      <EventAdmin />
  </div>
</template>

<script>
import EventAdmin from "../../components/Admin/EventAdmin.vue";
export default {
    components: {
        EventAdmin,
    },

}
</script>

<style lang="scss" scoped>
.adminEvent {
    height: 100vh;
}
</style>