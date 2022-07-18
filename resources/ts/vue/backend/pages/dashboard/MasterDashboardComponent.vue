<template>
  <div>

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">

                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                            <!-- <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">

                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{total_users}}</span></h4>
                                            <p class="text-muted mb-0">Total Users</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0"><span class="text-success me-1">

                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                             <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end mt-2">
                                            <!-- <div id="orders-chart"> </div> -->
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{total_auditors}}</span></h4>
                                            <p class="text-muted mb-0">Total Auditors</p>
                                        </div>
                                        <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"></span>
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end col-->


                        </div> <!-- end row-->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <div class="dropdown">
                                                <!-- <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="fw-semibold">Sort By:</span> <span class="text-muted">{{date_range}}<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a> -->

                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                                    <a class="dropdown-item" role="button" @click="getDateRange('Monthly')">Monthly</a>
                                                    <a class="dropdown-item" role="button" @click="getDateRange('Yearly')">Yearly</a>
                                                    <a class="dropdown-item" role="button" @click="getDateRange('Weekly')">Weekly</a>
                                                     <a class="dropdown-item" role="button" @click="getDateRange('Daily')">Daily</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title mb-4">Audit Analytics    </h4>
                                        <small>Dates: {{startDateWithEndDate().first_date}} - {{startDateWithEndDate().last_date}}</small>

                                        <div class="mt-1">
                                            <ul class="list-inline main-chart mb-0">
                                                <li class="list-inline-item chart-border-left me-0 border-0">
                                                    <h3 class="text-primary"><span data-plugin="counterup">{{getTotal().total}}</span><span class="text-muted d-inline-block font-size-15 ms-3">Total Audit</span></h3>
                                                </li>
                                                <li class="list-inline-item chart-border-left me-0">
                                                    <h3 class="text-success"><span data-plugin="counterup">{{getTotal().total_completed}}</span><span class="text-muted d-inline-block font-size-15 ms-3">Completed</span>
                                                    </h3>
                                                </li>
                                                  <li class="list-inline-item chart-border-left me-0">
                                                    <h3 class="text-wearing"><span data-plugin="counterup">{{getTotal().total_proccess}}</span><span class="text-muted d-inline-block font-size-15 ms-3">Completed</span>
                                                    </h3>
                                                </li>

                                            </ul>
                                        </div>

                                                  <div class="mt-3">
                                            <div id="sales-analytics-chart" class="apex-charts" dir="ltr"></div>
                                        </div>

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->


                        </div> <!-- end row-->

                        <!-- end row -->


                        <!-- end row -->
  </div>
</template>

<script>
export default {
data(){
    return {
        audit_stats:[],
        date_range:"weekly",
        total_users:0,
        auth_user:user,
        url:this.hosturl,
        total_auditors:0,
    };
},
methods:{
    getDateRange(item){
        this.date_range = item;
        this.audit_stats=[];
          axios.get('/dashboard?date_range='+this.date_range).then(response => {
            this.audit_stats = response.data.audit_stats;
        });
        // console.log(this.audit_stats.map(x=>moment(x.date)));

    },
    startDateWithEndDate(){
         if(this.audit_stats.length>0)
         {
           let date=this?.audit_stats.map(x=>x.date);
          const last_date=date.slice(-1)[0] || [];
          const first_date=date.slice(0,1)[0] || [];
        return {last_date,first_date}
         }
         return {last_date:'',first_date:''};
    },
    getTotal(){
       let total=0,total_completed=0,total_proccess=0,total_created=0;
       if(this.audit_stats.length>0){
        total=this.audit_stats.map(x=>x.total);
        total=total.reduce((partialSum, a) => partialSum + a, 0);
        total_created=this.audit_stats.map(x=>parseInt(x.created));
        total_created=total_created.reduce((partialSum, a) => partialSum + a, 0);
        total_proccess=this.audit_stats.map(x=>parseInt(x.inproccess));
        total_proccess=total_proccess.reduce((partialSum, a) => partialSum + a, 0);
        total_completed=this.audit_stats.map(x=>parseInt(x.completed));
        total_completed=total_completed.reduce((partialSum, a) => partialSum + a, 0);

       }
    return {total,total_created,total_proccess,total_completed};

    },
    loadChart(){

       let options = {
            chart: { height: 343, type: "line", stacked: !1, toolbar: { show: !1 } },
            stroke: { width: [0, 2, 4], curve: "smooth" },
            plotOptions: { bar: { columnWidth: "30%" } },
            colors: ["#5b73e8", "#dfe2e6", "#f1b44c"],
            series: [
                { name: "Created", type: "column", data: this.audit_stats.map(x=>x.created) },
                { name: "Proccess", type: "area", data:  this.audit_stats.map(x=>x.inproccess)},
                { name: "Completed", type: "line", data: this.audit_stats.map(x=>x.completed)},
            ],
            fill: { opacity: [0.85, 0.25, 1], gradient: { inverseColors: !1, shade: "light", type: "vertical", opacityFrom: 0.85, opacityTo: 0.55, stops: [0, 100, 100, 100] } },
            labels: this.audit_stats.map(x=>x.date),
            // /moment(x.date).format('DD/MM/YYYY')
            markers: { size: 0 },
            xaxis: { type: "date" },
            yaxis: { title: { text: "Points" } },
            tooltip: {
                shared: !0,
                intersect: !1,
                y: {
                    formatter: function (e) {
                        return void 0 !== e ? e.toFixed(0) + " points" : e;
                    },
                },
            },
            grid: { borderColor: "#f1f1f1" },
            };
            (chart = new ApexCharts(document.querySelector("#sales-analytics-chart"), options)).render();

            },


    getDashboard(){
        axios.get('/dashboard').then(response => {
            this.audit_stats = response.data.audit_stats;
            this.total_users=response.data.total_users;
            this.total_auditors=response.data.total_auditors;
            this.loadChart();
        });
    }
},
mounted() {
    this.getDashboard();
}
}
</script>

<style>

</style>
