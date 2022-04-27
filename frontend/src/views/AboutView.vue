<template>
<div class="about">
  <about-comp />
  
</div>
</template>
<script>
import AboutComp from '../components/visiteur/AboutComp.vue'


export default {
  components:{AboutComp},
  name: "AbotView",
};
</script>
<style lang="scss" scoped>
.about{
  background-image: url( '../assets/images/PAWSS.png');
}
</style>
