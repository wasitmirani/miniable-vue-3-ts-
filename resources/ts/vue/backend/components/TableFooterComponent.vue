<template>
    <div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <div>
                    <p class="mb-sm-0">Showing {{rows?.current_page}} to {{rows?.per_page}} of {{rows?.total}} entries</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-end">
                    <Pagination :data="rows" @pagination-change-page="getData" class="mb-sm-0" />
                </div>
            </div>

        </div>
    </div>


</template>
<script>
import LaravelVuePagination from 'laravel-vue-pagination';
export default {
    props: {
        rows: {
            type: Array,
            required: true
        },
        getData: {
            type: Function,
            required: true
        }
    },
    components: { 'Pagination': LaravelVuePagination },
}
</script>
