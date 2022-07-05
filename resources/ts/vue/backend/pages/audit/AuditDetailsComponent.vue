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
                                         <form v-on:submit.prevent="onSubmit">
                                                        <div class="hstack gap-3">
                                                            <!-- <input  type="text" placeholder="Add your item here..."
                                                                aria-label="Add your item here..."> -->
                                                            <textarea rows="2"  class="form-control me-auto" v-model="audit.remarks" placeholder="Add your remarks here..."></textarea>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
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
                                                <i class="uil uil-clipboard-notes font-size-20"></i>
                                                <span class="d-none d-sm-block"> Audit</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                                                <i class=" uil uil-user-circle  font-size-20"></i>
                                                <span class="d-none d-sm-block">Auditor Requests</span>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                                <i class="uil uil-envelope-alt font-size-20"></i>
                                                <span class="d-none d-sm-block">Messages</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <h5 class="font-size-16 mb-4">Audit Log</h5>

                                                    <ul class="activity-feed mb-0 ps-2"  style="overflow-y: scroll; height:400px;">
                                                        <li class="feed-item" v-for="item in activities" :key="item.id">
                                                            <div class="feed-item-list">
                                                                <p class="text-muted mb-1">{{$filters.DateTimeFormat(audit.created_at)}} <div class="vr"></div>  Response  </p>
                                                                <h5 class="font-size-16">{{item?.properties?.name}}</h5>
                                                                <p class="text-muted mb-1">{{item?.properties?.email}}</p>
                                                                <p class="text-muted">{{item?.description}}</p>
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
                                                                    <th scope="col"> Auditor</th>

                                                                    <th scope="col">DateTime</th>
                                                                    <th scope="col">Status</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="(item,index) in audit.auditdates" :key="index">
                                                                    <th scope="row">{{index}}</th>
                                                                    <td><a href="#" class="text-dark">{{audit.title}}</a></td>
                                                                    <td v-if="item?.auditor">{{item.auditor.name}}</td>
                                                                    <td v-else>-</td>
                                                                    <td>
                                                                      {{$filters.DateTimeFormat(item.audit_date)}}
                                                                    </td>
                                                                    <td>
                                                                        <span class="badge bg-primary font-size-12"  v-if="item.finished==0">Open</span>
                                                                         <span class="badge bg-danger font-size-12"  v-if="item.finished==1">Close</span>
                                                                    </td>

                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tasks" role="tabpanel" style="overflow-y: scroll; height:430px;">
                                            <div v-for="item in audit.auditors" :key="item.id">
                                                <h5 class="font-size-16 mb-3 mt-4 text-primary"><strong> {{item?.auditor?.name}}</strong></h5>

                                                <div class="table-responsive">

                                                         <table class="table table-nowrap table-hover mb-0">
                                                            <thead>
                                                                <tr>

                                                                    <th scope="col">Audit</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Availability</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                        <tbody>
                                                            <tr v-if="item.auditor.auditrequests.length<1">
                                                             <td colspan="5">
                                                                    <div class="alert alert-warning">
                                                                        <h5 class="font-size-16 mb-3 mt-4 text-war"><strong>Not found any request</strong></h5>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr  v-for="request in item?.auditor?.auditrequests" :key="request.id" >

                                                                <td>
                                                                    <small>{{audit.title}}</small>
                                                                </td>

                                                                <td>{{$filters.DateTimeFormat(request.auditdate.audit_date)}}</td>
                                                                <td >
                                                                 <span class="badge bg-success" v-if="request.approval_type==1">
                                                                    Approved
                                                                </span>
                                                                  <span class="badge bg-danger" v-if="request.approval_type==2">
                                                                    Rejected
                                                                </span>
                                                                </td>
                                                                  <td >
                                                                <span class="badge bg-success" v-if="request.availability==1">
                                                                 <i class="uil uil-file-check-alt  text-light   font-size-13"></i>
                                                                Available</span>
                                                                  <span class="badge bg-danger" v-if="request.availability==0">
                                                                 <i class="uil uil-file-times-alt  text-light   font-size-13"></i>
                                                                UnAvailable</span>
                                                                </td>
                                                                <td v-if="request.availability==1 ">

                                                                             <a role="button" @click="approval(request)" class="text-primary">
                                                                              <i class="uil uil-check-circle  font-size-18"></i></a>
                                                                       |
                                                                          <a role="button" @click="reject(request)" class=" text-danger">
                                                                              <i class="uil uil-trash font-size-18"></i></a>
                                                                </td>


                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>

                                            <hr>
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
            activities:{},
        };
    },
    methods:{
        approval(item){
               axios.get(`audit-approve/${item.id}?approval_type=1`).then((res) => {
                    this.$root.alertNotify(res.status, 'Auditor Assistant Successfuly', 'info', res.data);
                    this.getAudit();
                }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);

                    });
        },
       reject(item){
                     Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to reject this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, reject it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.get(`audit-approve/${item.id}?approval_type=2`).then((res) => {

                            this.$root.alertNotify(res.status, 'Audit Request Reject Successfuly', 'info', res.data);
                            this.getAudit();
                        })
                    }
                })

       },
      async  onSubmit(){
                 await axios.post('/update-audit-remark/'+this.audit.id, this.audit).then((res) => {

                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);

                    }).catch((err) => {

                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);

                    })
        },
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
                this.activities=res.data.activities;
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
