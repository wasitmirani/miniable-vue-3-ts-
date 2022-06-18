<template>
  <div>
      <form method="post">
      <div class="row">

                      <div class="col-lg-12">
                                <div id="addproduct-accordion" class="custom-accordion">
                                    <div class="card">
                                        <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                01
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">User Info</h5>
                                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>

                                        <div id="addproduct-billinginfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                                            <div class="p-4 border-top">


                                                    <div class="row">
                                                        <div class="col-lg-6">

                                                            <div class="mb-3">
                                                                <label class="form-label" for="manufacturername">Full Name*</label>
                                                                <input  v-model="user.name" type="text" class="form-control" placeholder="Enter your Full Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">

                                                            <div class="mb-3">
                                                                <label class="form-label" for="manufacturerbrand">Email Address* </label>
                                                                <input  v-model="user.email" type="text" class="form-control" placeholder="Enter your Email Address" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" >Username</label>
                                                                <input  type="text" v-model="user.username"  class="form-control" placeholder="Enter your Username">
                                                            </div>
                                                        </div>
                                                         <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" >Phone</label>
                                                                <input  type="text" v-model="user.phone"  class="form-control" placeholder="Enter your Phone Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="price">Password*</label>
                                                                <input  type="text" v-model="user.password"  class="form-control" placeholder="Enter your Password" required>
                                                            </div>
                                                        </div>
                                                         <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="price">Confirmed Password*</label>
                                                                <input  type="text" v-model="user.password_confirmation"  required class="form-control" placeholder="Enter your Password Confirmation">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="mb-0">
                                                        <label class="form-label" for="productdesc">User Address</label>
                                                        <textarea class="form-control" id="productdesc" rows="4" placeholder="Enter your Product Description"></textarea>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <a href="#addproduct-img-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-controls="addproduct-img-collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                02
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">User Image</h5>
                                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>

                                        <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                            <div class="p-4 border-top">

                                                    <div class="fallback">
                                                        <input name="file"  type="file" >
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                        </div>

                                                        <h4>Drop files here or click to upload.</h4>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <a href="#addproduct-metadata-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-controls="addproduct-metadata-collapse">
                                            <div class="p-4">

                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-xs">
                                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                03
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="font-size-16 mb-1">Meta Data</h5>
                                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>

                                        <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                                            <div class="p-4 border-top">

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="metatitle">Meta title</label>
                                                                <input id="metatitle" name="metatitle" type="text" class="form-control" placeholder="Enter your Meta title">
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="metakeywords">Meta Keywords</label>
                                                                <input id="metakeywords" name="metakeywords" type="text" class="form-control" placeholder="Enter your Meta Keywords">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-0">
                                                        <label class="form-label" for="metadescription">Meta Description</label>
                                                        <textarea class="form-control" id="metadescription" rows="4" placeholder="Enter your Meta Description"></textarea>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-4 mt-2">
                            <div class="col ms-auto " >
                                <div class="d-flex flex-reverse flex-wrap gap-2" style="float:right;">
                                    <a role="button" class="btn btn-danger"  data-bs-dismiss="modal"> <i class="uil uil-times"></i> Cancel </a>
                                    <button type="submit" class="btn btn-primary"> <i class="uil uil-file-alt"></i> Submit </button>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
       </form>
  </div>
</template>

<script>
export default {
    data(){
        return {
            user:{},
        }
    }
}
</script>

<style>

</style>
