<template>

    <div class="avatar-xs d-inline-block me-3" v-if="name">
      <h4 :class="`avatar-title rounded-circle ${getRandomColor()}  text-white`">
          {{name.charAt(0).toUpperCase()}}
        </h4>
    </div>

   <img v-if="img" :src="url+img" alt="" class="avatar-xs rounded-circle me-2">
</template>

<script>
export default {
    props:['name','img'],
    data(){
        return {
            url:this.hosturl,
        }
    },
    methods:{
        getRandomColor(){

            let colors = ['bg-gradient-warning','bg-warning','opacity-75','bg-secondary','bg-gradient-secondary','bg-danger','bg-primary','bg-success','bg-gradient-info','bg-soft-info','bg-gradient-primary','bg-info','bg-gradient-dark','bg-gradient-danger'];
               let x = Math.floor((Math.random() * colors.length) + 1);
            return colors[x];
        }
    }
};
</script>

<style>
</style>
