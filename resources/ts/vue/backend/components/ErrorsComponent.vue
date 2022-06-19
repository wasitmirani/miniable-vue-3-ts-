<template>
    <div class="mb-4 text-danger" v-if="errors?.errors">
        <div class="font-medium text-red-600">
            Whoops! Something went wrong.
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <li v-for="error in errors.errors">{{   error.join(", ")}}</li>

        </ul>
    </div>
</template>

<script>
export default {
 props:['errors'],
 created(){
    console.log("error",this.errors);
 }
}
</script>

<style>
</style>
