<template >
            <i class="mdi mdi-map-marker"></i>
            <a target="_blank"  :href="`https://maps.google.com/?q=${location}`">
              {{this.location}}
        </a>

</template>
<script>
export default {
 props:['location'],
}
</script>
<style >

</style>
