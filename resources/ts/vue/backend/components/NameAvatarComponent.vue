<template>
  <div>
    <div class="avatar-xs d-inline-block me-2" v-if="name">
      <span class="avatar-title rounded-circle bg-light text-body"> {{name.charAt(0).toUpperCase()}} </span>
    </div>
  </div>
</template>

<script>
export default {
    props:['name','img']
};
</script>

<style>
</style>
