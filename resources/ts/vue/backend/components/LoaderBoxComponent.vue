<template>
  <div class="text-center">
  <div class="spinner-border text-dark" role="status">

  </div>
  <span style="margin-left: 10px;margin-bottom: 20px;" v-if="message">{{message}}...</span>
</div>
</template>

<script>
export default {
    props:['message'],
}
</script>

<style>

</style>
