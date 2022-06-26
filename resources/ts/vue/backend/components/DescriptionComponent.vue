<template >
 <p v-if="value.length < 40">
    {{value}}
 </p>
  <p v-if="value.length > 40 && !readMore" >
    {{value.substring(0,50)}}...
    <a role="button" @click="readMore =! readMore">
    <span class="badge rounded-pill bg-primary">Read more</span>
    </a>
 </p>
 <p v-show="readMore">
 {{value}}
 </p>
</template>
<script>
export default {
props:['value'],
data(){
   return
   {readMore:false};
},

}
</script>
<style >

</style>
