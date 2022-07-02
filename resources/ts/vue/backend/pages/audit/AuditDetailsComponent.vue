<template lang="">
    <div>
        <bread-crumb active_name="Audit Details" :previous="[{name:'Audits',link:'/portal/audits'}]"></bread-crumb>

                        <div class="row mb-4">
                            <div class="col-xl-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="text-center">
                                        <h3><strong>{{audit.title}}</strong></h3>
                                            <!-- <div class="dropdown float-end">
                                                <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                  <i class="uil uil-ellipsis-v"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Remove</a>
                                                </div>
                                            </div> -->
                                            <div class="clearfix"></div>

                                            <h5 class="mt-3 mb-1">{{$filters.DateTimeFormat(audit.created_at)}}</h5>
                                            <p class="text-muted">Status: <span :class="`badge rounded-pill bg-${setStatus(audit?.status?.name)}`">{{audit?.status?.name}}</span></p>

                                            <div class="mt-4">
                                              Created By:   <button type="button" class="btn btn-light btn-sm"><i class="uil uil-user-circle me-2"></i>  {{audit?.user?.name}}</button>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="text-muted">
                                            <h5 class="font-size-16"><strong> Description:</strong></h5>
                                            <p>{{audit.description}}</p>
                                            <div class="table-responsive mt-4">
                                                <!-- <div>
                                                    <p class="mb-1">Title :</p>
                                                    <h5 class="font-size-16">{{audit.title}}</h5>
                                                </div> -->
                                                <div class="mt-1">

                                                     <h5 class="font-size-16"><strong> Mobile:</strong></h5>
                                                    <h5 class="font-size-16">{{audit.phone}}</h5>
                                                </div>
                                                <!-- <div class="mt-4">
                                                    <p class="mb-1">Email :</p>
                                                    <h5 class="font-size-16">marcus@minible.com</h5>
                                                </div> -->
                                                <div class="mt-1">

                                                     <h5 class="font-size-16"><strong> Location:</strong></h5>
                                                    <h5 class="font-size-16">{{audit.location}}</h5>
                                                </div>



                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                         <form>
                                                        <div class="hstack gap-3">
                                                            <!-- <input  type="text" placeholder="Add your item here..."
                                                                aria-label="Add your item here..."> -->
                                                            <textarea rows="2"  class="form-control me-auto" placeholder="Add your remarks here..."></textarea>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
                                                            <!-- <div class="vr"></div> -->

                                                        </div>
                                                    </form>
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
                                                <span class="d-none d-sm-block"> Audit</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                                                <i class="uil uil-clipboard-notes font-size-20"></i>
                                                <span class="d-none d-sm-block">Requests</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                                <i class="uil uil-envelope-alt font-size-20"></i>
                                                <span class="d-none d-sm-block">Messages</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">Audit Log</h5>

                                                    <ul class="activity-feed mb-0 ps-2">
                                                        <li class="feed-item">
                                                            <div class="feed-item-list">
                                                                <p class="text-muted mb-1">2019 - 2020</p>
                                                                <h5 class="font-size-16">UI/UX Designer</h5>
                                                                <p>Abc Company</p>
                                                                <p class="text-muted">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual</p>
                                                            </div>
                                                        </li>
                                                        <li class="feed-item">
                                                            <div class="feed-item-list">
                                                                <p class="text-muted mb-1">{{$filters.DateTimeFormat(audit.created_at)}}  <div class="vr"></div>  Created </p>
                                                                <h5 class="font-size-16">{{audit.title}}</h5>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div>
                                                    <h5 class="font-size-16 mb-4">Audit Dates</h5>

                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Audit</th>
                                                                    <th scope="col">DateTime</th>
                                                                    <th scope="col">Status</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="(item,index) in audit.auditdates" :key="index">
                                                                    <th scope="row">{{index}}</th>
                                                                    <td><a href="#" class="text-dark">{{audit.title}}</a></td>
                                                                    <td>
                                                                      {{$filters.DateTimeFormat(item.audit_date)}}
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-soft-primary font-size-12"  v-if="item.finished==0">Open</span>
                                                                         <span class="badge bg-soft-primary font-size-12"  v-if="item.finished==1">Close</span>
                                                                    </td>

                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tasks" role="tabpanel">
                                            <div>
                                                <h5 class="font-size-16 mb-3">Active</h5>

                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-centered">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 60px;">
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-activeCheck2">
                                                                        <label class="form-check-label" for="tasks-activeCheck2"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">Ecommerce Product Detail</a>
                                                                </td>

                                                                <td>27 May, 2020</td>
                                                                <td style="width: 160px;"><span class="badge bg-soft-primary font-size-12">Active</span></td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-activeCheck1">
                                                                        <label class="form-check-label" for="tasks-activeCheck1"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">Ecommerce Product</a>
                                                                </td>

                                                                <td>26 May, 2020</td>
                                                                <td><span class="badge bg-soft-primary font-size-12">Active</span></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <h5 class="font-size-16 my-3">Upcoming</h5>

                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-centered">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 60px;">
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-upcomingCheck3">
                                                                        <label class="form-check-label" for="tasks-upcomingCheck3"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">Chat app Page</a>
                                                                </td>

                                                                <td>-</td>
                                                                <td style="width: 160px;"><span class="badge bg-soft-secondary font-size-12">Waiting</span></td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-upcomingCheck2">
                                                                        <label class="form-check-label" for="tasks-upcomingCheck2"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">Email Pages</a>
                                                                </td>

                                                                <td>04 June, 2020</td>
                                                                <td><span class="badge bg-soft-primary font-size-12">Approved</span></td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-upcomingCheck1">
                                                                        <label class="form-check-label" for="tasks-upcomingCheck1"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">Contacts Profile Page</a>
                                                                </td>

                                                                <td>-</td>
                                                                <td><span class="badge bg-soft-secondary font-size-12">Waiting</span></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <h5 class="font-size-16 my-3">Complete</h5>

                                                <div class="table-responsive">
                                                    <table class="table table-nowrap table-centered">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 60px;">
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-completeCheck3">
                                                                        <label class="form-check-label" for="tasks-completeCheck3"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">UI Elements</a>
                                                                </td>

                                                                <td>27 May, 2020</td>
                                                                <td style="width: 160px;"><span class="badge bg-soft-success font-size-12">Complete</span></td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-completeCheck2">
                                                                        <label class="form-check-label" for="tasks-completeCheck2"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">Authentication Pages</a>
                                                                </td>

                                                                <td>27 May, 2020</td>
                                                                <td><span class="badge bg-soft-success font-size-12">Complete</span></td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check font-size-16 text-center">
                                                                        <input type="checkbox" class="form-check-input" id="tasks-completeCheck1">
                                                                        <label class="form-check-label" for="tasks-completeCheck1"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="fw-bold text-dark">Admin Layout</a>
                                                                </td>

                                                                <td>26 May, 2020</td>
                                                                <td><span class="badge bg-soft-success font-size-12">Complete</span></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="messages" role="tabpanel">
                                            <div>
                                                <div data-simplebar style="max-height: 430px;">
                                                    <div class="d-flex align-items-start border-bottom py-4">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-3.jpg" alt="avatar-3 images">
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-1">Marion Walker <small class="text-muted float-end">1 hr ago</small></h5>
                                                            <p class="text-muted">If several languages coalesce, the grammar of the resulting .</p>

                                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block"><i
                                                                class="mdi mdi-reply"></i> Reply</a>

                                                            <div class="d-flex align-items-start mt-4">
                                                                <div class="flex-shrink-0 me-2">
                                                                    <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-4.jpg" alt="avatar-4 images">
                                                                </div>

                                                                <div class="flex-grow-1">
                                                                    <h5 class="font-size-15 mb-1">Shanon Marvin <small class="text-muted float-end">1 hr ago</small></h5>
                                                                    <p class="text-muted">It will be as simple as in fact, it will be Occidental. To it will seem like simplified .</p>


                                                                    <a href="javascript: void(0);" class="text-muted font-13 d-inline-block">
                                                                        <i class="mdi mdi-reply"></i> Reply
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start border-bottom py-4">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-5.jpg" alt="avatar-5 images">
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-1">Janice Morgan <small class="text-muted float-end">2 hrs ago</small></h5>
                                                            <p class="text-muted">To achieve this, it would be necessary to have uniform pronunciation.</p>

                                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block"><i
                                                                class="mdi mdi-reply"></i> Reply</a>

                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start border-bottom py-4">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img class="rounded-circle avatar-xs" src="assets/images/users/avatar-7.jpg" alt="avatar-7 images">
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-15 mb-1">Patrick Petty <small class="text-muted float-end">3 hrs ago</small></h5>
                                                            <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit </p>

                                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block"><i
                                                                class="mdi mdi-reply"></i> Reply</a>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="border rounded mt-4">
                                                    <form action="#">
                                                        <div class="px-2 py-1 bg-light">

                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-sm btn-link text-dark text-decoration-none"><i class="uil uil-link"></i></button>
                                                                <button type="button" class="btn btn-sm btn-link text-dark text-decoration-none"><i class="uil uil-smile"></i></button>
                                                                <button type="button" class="btn btn-sm btn-link text-dark text-decoration-none"><i class="uil uil-at"></i></button>
                                                              </div>

                                                        </div>
                                                        <textarea rows="3" class="form-control border-0 resize-none" placeholder="Your Message..."></textarea>

                                                    </form>
                                                </div> <!-- end .border-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
    </div>
</template>
<script>
    import BreadCrumb from "../../components/BreadcrumbComponent.vue";
    import DateEmpty from "../../components/DataEmptyComponent.vue";
export default {
    components: { BreadCrumb,DateEmpty },
    data(){
        return {
            audit:{},
        };
    },
    methods:{

         setStatus(name){
                switch (name) {
                    case 'created':
                            return "primary";
                        break;
                    case "process":
                       return "warning";
                    break;
                    case "completed":
                        return "success";
                    break;
                    case "canceled":
                        return "danger";
                    break


                    default:
                        return "primary";
                        break;
                }
            },
        getAudit(){
            axios.get('/audit/details/'+this.$route.params.id).then((res)=>{
                this.audit=res.data.audit;
            }).catch((er)=>{

            })
        },
    },
    mounted(){
        this.getAudit();
    }
}
</script>
<style lang="">

</style>
