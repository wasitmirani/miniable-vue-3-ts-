<template >
    <div>
        <div class="text-center">
            <div>
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <div class="error-img">
                            <img src="/assets/images/not-authorized.svg" alt=""
                                class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="text-uppercase mt-4">Sorry, You are not authorized! 🔐</h4>
            <p class="text-muted">USR account credentials to access the web pages it serves.</p>
            <div class="mt-5">
                <router-link class="btn btn-primary waves-effect waves-light"
                    to="/portal/dashboard">Back to Dashboard</router-link>
            </div>
        </div>

    </div>
</template>p
<script>
export default {

}
</script>
<style lang="">

</style>
