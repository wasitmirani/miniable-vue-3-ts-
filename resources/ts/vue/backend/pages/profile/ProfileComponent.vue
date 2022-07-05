<template lang="">
    <div>
      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row mb-4">
                            <div class="col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="dropdown float-end">
                                                <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                  <i class="uil uil-ellipsis-v"></i>
                                                </a>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <img :src="`${url}/assets/images/man.png`" alt="" class="avatar-lg rounded-circle img-thumbnail">
                                            </div>
                                            <h5 class="mt-3 mb-1">{{auth_user.name}}</h5>
                                            <p class="text-muted">{{auth_user?.email}}</p>

                                            <div class="mt-4">
                                                <!-- <button type="button" class="btn btn-light btn-sm"><i class="uil uil-envelope-alt me-2"></i> Message</button> -->
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="text-muted">
                                            <h5 class="font-size-16">About</h5>
                                            <p>N/A</p>
                                            <div class="table-responsive mt-4">
                                                <div>
                                                    <p class="mb-1">Name :</p>
                                                    <h5 class="font-size-16">{{auth_user.name}}</h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Mobile :</p>
                                                    <h5 class="font-size-16">{{auth_user.phone}}</h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Email :</p>
                                                    <h5 class="font-size-16">{{auth_user.email}}</h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Location :</p>
                                                    <h5 class="font-size-16">N/A</h5>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                                <i class="uil uil-user-circle font-size-20"></i>
                                                <span class="d-none d-sm-block">Settings</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                                    <h5 class="font-size-16 mb-4">Update User Information</h5>

                                        <form v-on:submit.prevent="onSubmit">
            <div class="row">
                <errors :errors="errors"></errors>
            </div>
            <div class="row">


                <!-- end row -->

                <div class="col-lg-6">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturername">Full Name*</label>
                        <input v-model="user.name" type="text" class="form-control" placeholder="Enter your Full Name"
                            required>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="mb-3">
                        <label class="form-label" for="manufacturerbrand">Email Address* </label>
                        <input v-model="user.email" type="text" class="form-control"
                            placeholder="Enter your Email Address" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" v-model="user.username" class="form-control"
                            placeholder="Enter your Username">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" v-model="user.phone" class="form-control"
                            placeholder="Enter your Phone Number">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="price">Password*</label>
                        <input type="password" v-model="user.password" class="form-control"
                            placeholder="Enter your Password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="price">Confirmed Password*</label>
                        <input type="password" v-model="user.password_confirmation" class="form-control"
                            placeholder="Enter your Password Confirmation">
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="mb-0">
                        <p class="fw-bolder">Password requirements:</p>
                        <ul class="ps-1 ms-25">
                            <li class="mb-50">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-50">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-4 mt-2">
                    <div class="col ms-auto ">
                        <div class="d-flex flex-reverse flex-wrap gap-2" style="float:right;">

                                    <button type="submit" class=" btn btn-primary "> <i class="uil uil-file-alt"></i>
                                        Submit
                                        </button>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
    </div>
    </div>

</template>
<script>
    import Errors from "../../components/ErrorsComponent.vue";
export default {
    components:{Errors},
    data() {
        return {
            auth_user: user,
            url: this.hosturl,
            user:user,
        };
    },
    methods:{
        async onSubmit() {

                    await axios.put('/user/' + this.user.id, this.user).then((res) => {

                        this.$root.alertNotify(res.status, 'Updated Successfuly', 'success', res.data);
                        //   this.restForm();
                    }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);

                    })

            }
    }
}
</script>
<style lang="">

</style>
