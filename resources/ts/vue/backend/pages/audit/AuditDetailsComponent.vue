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
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#about" role="tab">
                                                <i class="uil uil-clipboard-notes font-size-20"></i>
                                                <span class="d-none d-sm-block"> Audit</span>
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
                                        <div class="tab-pane " id="about" role="tabpanel">
                                            <div>

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
                                        <div class="tab-pane active" id="tasks" role="tabpanel" >
                                            <div>

                                                <h5 class="font-size-16 mb-3 mt-4 text-primary"><strong> Audit Assignment Details</strong></h5>

                                                <div class="table-responsive">

                                                         <table class="table table-nowrap table-hover mb-0">
                                                            <thead>
                                                                <tr>

                                                                    <th scope="col">Auditor</th>
                                                                    <th scope="col" v-for="item in audit?.auditdates">
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
                                                                <td v-for="request in item.auditrequests">
                                                                    <span v-tooltip="` ${item.name} available on ${request.auditdate.audit_date}`" class="badge bg-success "  v-if="request.availability==1">
                                                                    <i class="uil-check-circle font-size-16"></i>
                                                                      </span>
                                                                    <span v-tooltip="` ${item.name} unavailable on  ${request.auditdate.audit_date}`" class="badge bg-danger"  v-if="request.availability==0"> <i class="uil-backspace font-size-16"></i> </span>
                                                               <div v-if="request.availability==1">

                                                                            <a  v-tooltip="'Approve Audit'" role="button" @click="approval(request)" class="text-primary" >
                                                                              <i class="uil-check-square  font-size-18"></i>

                                                                              </a>
                                                                       |
                                                                          <a v-tooltip="'Reject Audit'"  role="button" @click="reject(request)" class=" text-danger" >
                                                                              <i class="uil-ban font-size-18"></i></a>
                                                               </div>


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
            auditors:{},
        };
    },
    methods:{
        findAuditorRequest(requests,auditor){
            let data= requests.filter(request=>request.auditor_id==auditor);
            console.log('tag', data);
            return data;
        },
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
                this.auditors=this.audit.auditors.map((item)=>{
                     let data= item.auditrequests.filter(request=>request.auditor_id==item.auditor_id);
                    return {
                        ...item.auditor,
                        auditrequests:data.sort((a,b)=> (a.auditdate.audit_date > b.auditdate.audit_date? 1 : -1))};

                })

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
