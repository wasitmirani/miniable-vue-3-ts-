<template>
    <div>

        <div class="form-inline float-md-end mb-3">
            <div class="search-box ms-2">
                <div class="position-relative">
                    <!-- <label class="form-label" for="basicInput">{{ label }}</label> -->
                    <input type="search" class="form-control rounded bg-light border-0" :placeholder="label" v-model="query" v-on:keyup="searchQuery">
                    <i class="mdi mdi-magnify search-icon"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            default: "Search",
        },
        query: {
            type: String,
            default: "",
        },
        apiurl: {
            type: String,
            default: "",
        },
    },

    data() {
        return {
            query: "",
        };
    },
    methods: {
        //asyncdata
        searchQuery: _.debounce(
            function () {
                this.$emit("loading", true);
                setTimeout(() => {
                    this.search();
                }, 700);
            },
            500 // 500 milliseconds
        ),
        async search() {
            if (this.query.length > 2) {
                await axios.get(this.apiurl + "&query=" + this.query)
                    .then((response) => {
                        this.$emit("loading", false);
                        this.$emit("filterData", response.data);
                        this.$emit("query", this.query);
                    });
            } else {
                this.query = "";
                this.$emit("query", this.query);
                this.$emit("reload");
            }
        },
    },
    watch: {
        query() {
            if (this.query == "") {
                this.query = "";
                this.$emit("query", this.query);
                this.$emit("reload");
            }
        },
    },
};
</script>

<style>
</style>
