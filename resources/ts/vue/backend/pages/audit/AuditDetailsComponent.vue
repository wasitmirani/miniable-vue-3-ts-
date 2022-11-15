<template lang="">
    <div>
        <bread-crumb active_name="Audit Details" :previous="[{name:'Audits',link:'/portal/audits'}]"></bread-crumb>

                        <div class="row mb-4">

                            <div class="col-xl-12">
                                <div class="card mb-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                     <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tasks" role="tab">
                                                <i class=" uil uil-user-circle  font-size-20"></i>
                                                <span class="d-none d-sm-block">Auditor Requests</span>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#about" role="tab">
                                                <i class="uil uil-clipboard-notes font-size-20"></i>
                                                <span class="d-none d-sm-block"> Audit</span>
                                            </a>
                                        </li> -->

                                        <!-- <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                                <i class="uil uil-envelope-alt font-size-20"></i>
                                                <span class="d-none d-sm-block">Messages</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane " id="about" role="tabpanel">
                                            <div>
                                                        <loader-box v-if="loading"></loader-box>
                                                <div v-else>
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
                                        <div class="tab-pane active" id="tasks" role="tabpanel" >
                                            <div>


                                    <a v-tooltip="'Edit Audit'" role="button"  @click="disabled=!disabled" :class="`px-2 ${disabled ? 'bg-primary' : 'bg-danger' }`" style="float: right;">
                                        <i class="uil uil-pen font-size-24 text-white"></i></a>
                                                <audit-form  :disabled="disabled" :auditors="auditors_list" :editmode="true" :editForm="audit" ></audit-form>



                                                <h5 class="font-size-16 mb-3 mt-4 text-primary"><strong> Audit Assignment Details</strong></h5>
                                                  <loader-box v-if="approval_loading" message="Please wait audit  request has been proccessing"></loader-box>
                                                <div class="table-responsive" v-else>

                                                         <table class="table table-nowrap table-hover mb-0">
                                                            <thead>
                                                                <tr>

                                                                    <th scope="col">Auditor</th>
                                                                    <th scope="col" v-for="item in audit?.auditdates">
                                                                        <span class="badge bg-dark" v-tooltip="`total availability request `" style="font-size: 14px;">{{ mapAvailabilityDates(item.id)?.total ?? 0 }}</span>
                                                                    {{item.audit_date}}
                                                                    </th>
                                                                    <!-- <th scope="col">Date</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Availability</th>
                                                                    <th scope="col">Action</th> -->
                                                                </tr>
                                                            </thead>
                                                        <tbody>
                                                            <tr v-for="item in auditors" :key="item.id">
                                                                <td>{{item?.name}}</td>

                                                                <td v-for="auditdate in audit?.auditdates" :key="auditdate.id" v-if="item.auditrequests.length<1">
                                                                     <span v-tooltip="'No Response'"  class="text-danger" >
                                                                    <i class="uil-ban font-size-16"></i>
                                                                      </span>
                                                                  </td>
                                                                <td v-for="request in item.auditrequests" v-else>
                                                                    <span v-tooltip="` ${item.name} available on ${request.auditdate.audit_date}`" class="badge bg-success "  v-if="request.availability==1">
                                                                    <i class="uil-check-circle font-size-16"></i>
                                                                      </span>

                                                                    <span v-tooltip="` ${item.name} unavailable on  ${request.auditdate.audit_date}`" class="badge bg-danger"  v-if="request.availability==0"> <i class="uil-backspace font-size-16"></i> </span>

                                                               <div v-if="request.availability==1" class="mt-2">

                                                                            <a  v-tooltip="'Approve Audit'" role="button" @click="approval(request)"  >
                                                                              <i :class="getApproved(request)" ></i>

                                                                              </a>
                                                                            |
                                                                          <a v-tooltip="'Reject Audit'"  role="button" @click="reject(request)" class=" text-danger" >
                                                                              <i class="bx bx-window-close font-size-22"></i></a>
                                                               </div>


                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>

                                            <hr>
                                            </div>
                                        </div>
                                            <div class="row">
                                              <loader-box v-if="isloading" message="Please wait audit data has been proccessing"></loader-box>
                                              <br>
                                         <form v-on:submit.prevent="onSubmit">
                                                        <div class="hstack gap-3">

                                                            <textarea rows="2"  class="form-control me-auto" v-model="audit.remarks" placeholder="Add your remarks here..."></textarea>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>

                                                        </div>
                                                    </form>
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
       import LoaderBox from "../../components/LoaderBoxComponent.vue";
        import AuditForm from "./AuditForm.vue";
export default {
    components: { BreadCrumb,DateEmpty,AuditForm,LoaderBox },
    data(){
        return {
            audit:{},
            activities:{},
            auditors:{},
            auditors_list:[],
            loading:false,
            approval_loading:false,
            disabled:true,
            isloading:false,
            availability_dates:{},
            audit_request_by_date:{},
        };
    },
    methods:{
        editItem(){
            this.disabled=false;
        },
        getApproved(item){

            if(item.approval_type==1){
                return 'bx bx-user-check  font-size-22 text-success';
            }
            else{
                return 'bx bx-check-circle font-size-22 text-primary';
            }
        },
        findAuditorRequest(requests,auditor){
            let data= requests.filter(request=>request.auditor_id==auditor);
            console.log('tag', data);
            return data;
        },
        approval(item){
            this.approval_loading=true;
               axios.get(`audit-approve/${item.id}?approval_type=1`).then((res) => {
                    this.$root.alertNotify(res.status, 'Auditor Assistant Successfuly', 'info', res.data);
                    this.getAudit();
                    this.approval_loading=false;
                }).catch((err) => {
                        this.errors = err.response.data;
                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                        this.approval_loading=false;
                    });
                     this.approval_loading=false;
        },
       reject(item){
        this.approval_loading=true;
           axios.get(`audit-reject/${item.id}`).then((res) => {

                            this.$root.alertNotify(res.status, 'Audit Request Reject Successfuly', 'info', res.data);
                            this.getAudit();

                        })
                //      Swal.fire({
                //     title: 'Are you sure?',
                //     text: "You won't be able to reject this!",
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Yes, reject it!'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         axios.get(`audit-approve/${item.id}?approval_type=2`).then((res) => {

                //             this.$root.alertNotify(res.status, 'Audit Request Reject Successfuly', 'info', res.data);
                //             this.getAudit();
                //         })
                //     }
                // })
                this.approval_loading=false;

       },
      async  onSubmit(){
        this.isloading=true;
                 await axios.post('/update-audit-remark/'+this.audit.id, this.audit).then((res) => {

                        this.$root.alertNotify(res.status, 'Created Successfuly', 'success', res.data);
                         this.isloading=false;
                    }).catch((err) => {

                        this.$root.alertNotify(err.response.status, null, 'error', err.response.data);
                                     this.isloading=false;

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
            mapAvailabilityDates(id){
               const data= this.availability_dates.filter(el => el.id == id);
               console.log('data_date',data);
               return data[0];
            },
        getAudit(){
             this.loading=true;
            axios.get('/audit/details/'+this.$route.params.id).then((res)=>{

                this.audit=res.data.audit;
                this.activities=res.data.activities;
                this.auditors_list=res.data.auditors;
                this.availability_dates=res.data.availability_dates;
                this.auditors=this.audit.auditors.map((item)=>{
                     let data= item.auditrequests.filter(request=>request.auditor_id==item.auditor_id);
                    return {
                        ...item.auditor,
                        auditrequests:data.sort((a,b)=> (a.auditdate.audit_date > b.auditdate.audit_date? 1 : -1))};

                });
   this.auditors= this.auditors.sort((a, b) => {
                if (a.auditrequests === null) {
                    return 1;
                }

                if (b.auditrequests === null) {
                    return -1;
                }

                if (a.auditrequests === b.auditrequests) {
                    return 0;
                }

                return a.auditrequests < b.auditrequests ? 1 : -1;
                });


              this.audit.auditors=collection.auditors.map(x=>x.auditor);


                this.loading=false;

            }).catch((er)=>{

            })
        },
    },
    mounted(){
        this.getAudit();

          console.log("auditor222",  this.audit);
    }
}
</script>

<style >
.dp__action_row {
    display: flex;
    align-items: center;
    width: 100%;
    padding: 10px;
    height: 100px !important;
    overflow-y: scroll !important;
    box-sizing: border-box;
    color: var(--dp-text-color);
    background: var(--dp-background-color);
}
</style>
