"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_ts_vue_backend_pages_dashboard_MasterDashboardComponent_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=script&lang=js":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=script&lang=js ***!
  \***********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      audit_stats: [],
      date_range: "weekly",
      total_users: 0,
      auth_user: user,
      url: this.hosturl,
      total_auditors: 0
    };
  },
  methods: {
    getDateRange: function getDateRange(item) {
      var _this = this;

      this.date_range = item;
      this.audit_stats = [];
      axios.get('/dashboard?date_range=' + this.date_range).then(function (response) {
        _this.audit_stats = response.data.audit_stats;
      }); // console.log(this.audit_stats.map(x=>moment(x.date)));
    },
    startDateWithEndDate: function startDateWithEndDate() {
      if (this.audit_stats.length > 0) {
        var date = this === null || this === void 0 ? void 0 : this.audit_stats.map(function (x) {
          return x.date;
        });
        var last_date = date.slice(-1)[0] || [];
        var first_date = date.slice(0, 1)[0] || [];
        return {
          last_date: last_date,
          first_date: first_date
        };
      }

      return {
        last_date: '',
        first_date: ''
      };
    },
    getTotal: function getTotal() {
      var total = 0,
          total_completed = 0,
          total_proccess = 0,
          total_created = 0;

      if (this.audit_stats.length > 0) {
        total = this.audit_stats.map(function (x) {
          return x.total;
        });
        total = total.reduce(function (partialSum, a) {
          return partialSum + a;
        }, 0);
        total_created = this.audit_stats.map(function (x) {
          return parseInt(x.created);
        });
        total_created = total_created.reduce(function (partialSum, a) {
          return partialSum + a;
        }, 0);
        total_proccess = this.audit_stats.map(function (x) {
          return parseInt(x.inproccess);
        });
        total_proccess = total_proccess.reduce(function (partialSum, a) {
          return partialSum + a;
        }, 0);
        total_completed = this.audit_stats.map(function (x) {
          return parseInt(x.completed);
        });
        total_completed = total_completed.reduce(function (partialSum, a) {
          return partialSum + a;
        }, 0);
      }

      return {
        total: total,
        total_created: total_created,
        total_proccess: total_proccess,
        total_completed: total_completed
      };
    },
    loadChart: function loadChart() {
      var options = {
        chart: {
          height: 343,
          type: "line",
          stacked: !1,
          toolbar: {
            show: !1
          }
        },
        stroke: {
          width: [0, 2, 4],
          curve: "smooth"
        },
        plotOptions: {
          bar: {
            columnWidth: "30%"
          }
        },
        colors: ["#5b73e8", "#dfe2e6", "#f1b44c"],
        series: [{
          name: "Created",
          type: "column",
          data: this.audit_stats.map(function (x) {
            return x.created;
          })
        }, {
          name: "Proccess",
          type: "area",
          data: this.audit_stats.map(function (x) {
            return x.inproccess;
          })
        }, {
          name: "Completed",
          type: "line",
          data: this.audit_stats.map(function (x) {
            return x.completed;
          })
        }],
        fill: {
          opacity: [0.85, 0.25, 1],
          gradient: {
            inverseColors: !1,
            shade: "light",
            type: "vertical",
            opacityFrom: 0.85,
            opacityTo: 0.55,
            stops: [0, 100, 100, 100]
          }
        },
        labels: this.audit_stats.map(function (x) {
          return x.date;
        }),
        // /moment(x.date).format('DD/MM/YYYY')
        markers: {
          size: 0
        },
        xaxis: {
          type: "date"
        },
        yaxis: {
          title: {
            text: "Points"
          }
        },
        tooltip: {
          shared: !0,
          intersect: !1,
          y: {
            formatter: function formatter(e) {
              return void 0 !== e ? e.toFixed(0) + " points" : e;
            }
          }
        },
        grid: {
          borderColor: "#f1f1f1"
        }
      };
      (chart = new ApexCharts(document.querySelector("#sales-analytics-chart"), options)).render();
    },
    getDashboard: function getDashboard() {
      var _this2 = this;

      axios.get('/dashboard').then(function (response) {
        _this2.audit_stats = response.data.audit_stats;
        _this2.total_users = response.data.total_users;
        _this2.total_auditors = response.data.total_auditors;

        _this2.loadChart();
      });
    }
  },
  mounted: function mounted() {
    this.getDashboard();
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=template&id=5ae0013d":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=template&id=5ae0013d ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"row\"><div class=\"col-12\"><div class=\"page-title-box d-flex align-items-center justify-content-between\"><h4 class=\"mb-0\">Dashboard</h4><div class=\"page-title-right\"><ol class=\"breadcrumb m-0\"><li class=\"breadcrumb-item active\">Dashboard</li></ol></div></div></div></div>", 1);

var _hoisted_2 = {
  "class": "row"
};
var _hoisted_3 = {
  "class": "col-md-6 col-xl-3"
};
var _hoisted_4 = {
  "class": "card"
};
var _hoisted_5 = {
  "class": "card-body"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "float-end mt-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <div id=\"orders-chart\"> </div> ")], -1
/* HOISTED */
);

var _hoisted_7 = {
  "class": "mb-1 mt-1"
};
var _hoisted_8 = {
  "data-plugin": "counterup"
};

var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "text-muted mb-0"
}, "Total Auditors", -1
/* HOISTED */
);

var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "text-muted mt-3 mb-0"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-danger me-1"
})], -1
/* HOISTED */
);

var _hoisted_11 = {
  "class": "row"
};
var _hoisted_12 = {
  "class": "col-xl-12"
};
var _hoisted_13 = {
  "class": "card"
};
var _hoisted_14 = {
  "class": "card-body"
};
var _hoisted_15 = {
  "class": "float-end"
};
var _hoisted_16 = {
  "class": "dropdown"
};
var _hoisted_17 = {
  "class": "dropdown-menu dropdown-menu-end",
  "aria-labelledby": "dropdownMenuButton5"
};

var _hoisted_18 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h4", {
  "class": "card-title mb-4"
}, "Audit Analytics ", -1
/* HOISTED */
);

var _hoisted_19 = {
  "class": "mt-1"
};
var _hoisted_20 = {
  "class": "list-inline main-chart mb-0"
};
var _hoisted_21 = {
  "class": "list-inline-item chart-border-left me-0 border-0"
};
var _hoisted_22 = {
  "class": "text-primary"
};
var _hoisted_23 = {
  "data-plugin": "counterup"
};

var _hoisted_24 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-muted d-inline-block font-size-15 ms-3"
}, "Total Audit", -1
/* HOISTED */
);

var _hoisted_25 = {
  "class": "list-inline-item chart-border-left me-0"
};
var _hoisted_26 = {
  "class": "text-success"
};
var _hoisted_27 = {
  "data-plugin": "counterup"
};

var _hoisted_28 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-muted d-inline-block font-size-15 ms-3"
}, "Completed", -1
/* HOISTED */
);

var _hoisted_29 = {
  "class": "list-inline-item chart-border-left me-0"
};
var _hoisted_30 = {
  "class": "text-wearing"
};
var _hoisted_31 = {
  "data-plugin": "counterup"
};

var _hoisted_32 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-muted d-inline-block font-size-15 ms-3"
}, "Completed", -1
/* HOISTED */
);

var _hoisted_33 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "mt-3"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  id: "sales-analytics-chart",
  "class": "apex-charts",
  dir: "ltr"
})], -1
/* HOISTED */
);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" start page title "), _hoisted_1, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end page title "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <div class=\"col-md-6 col-xl-3\">\n                                <div class=\"card\">\n                                    <div class=\"card-body\">\n                                        <div class=\"float-end mt-2\">\n\n                                        </div>\n                                        <div>\n                                            <h4 class=\"mb-1 mt-1\"><span data-plugin=\"counterup\">{{total_users}}</span></h4>\n                                            <p class=\"text-muted mb-0\">Total Users</p>\n                                        </div>\n                                        <p class=\"text-muted mt-3 mb-0\"><span class=\"text-success me-1\">\n\n                                        </span>\n                                        </p>\n                                    </div>\n                                </div>\n                            </div> "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end col"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h4", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_8, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.total_auditors), 1
  /* TEXT */
  )]), _hoisted_9]), _hoisted_10])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end col")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end row"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_14, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <a class=\"dropdown-toggle text-reset\" href=\"#\" id=\"dropdownMenuButton5\"\n                                                    data-bs-toggle=\"dropdown\" aria-haspopup=\"true\"\n                                                    aria-expanded=\"false\">\n                                                    <span class=\"fw-semibold\">Sort By:</span> <span class=\"text-muted\">{{date_range}}<i class=\"mdi mdi-chevron-down ms-1\"></i></span>\n                                                </a> "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    role: "button",
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return $options.getDateRange('Monthly');
    })
  }, "Monthly"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    role: "button",
    onClick: _cache[1] || (_cache[1] = function ($event) {
      return $options.getDateRange('Yearly');
    })
  }, "Yearly"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    role: "button",
    onClick: _cache[2] || (_cache[2] = function ($event) {
      return $options.getDateRange('Weekly');
    })
  }, "Weekly"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
    "class": "dropdown-item",
    role: "button",
    onClick: _cache[3] || (_cache[3] = function ($event) {
      return $options.getDateRange('Daily');
    })
  }, "Daily")])])]), _hoisted_18, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, "Dates: " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.startDateWithEndDate().first_date) + " - " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.startDateWithEndDate().last_date), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_20, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_21, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_22, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_23, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.getTotal().total), 1
  /* TEXT */
  ), _hoisted_24])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_26, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_27, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.getTotal().total_completed), 1
  /* TEXT */
  ), _hoisted_28])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", _hoisted_30, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_31, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.getTotal().total_proccess), 1
  /* TEXT */
  ), _hoisted_32])])])]), _hoisted_33]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end card-body")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end card")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end col")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end row"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end row "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end row ")]);
}

/***/ }),

/***/ "./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue":
/*!*******************************************************************************!*\
  !*** ./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _MasterDashboardComponent_vue_vue_type_template_id_5ae0013d__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MasterDashboardComponent.vue?vue&type=template&id=5ae0013d */ "./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=template&id=5ae0013d");
/* harmony import */ var _MasterDashboardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MasterDashboardComponent.vue?vue&type=script&lang=js */ "./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=script&lang=js");
/* harmony import */ var C_laragon_www_miniable_vue_3_ts_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_miniable_vue_3_ts_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_MasterDashboardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_MasterDashboardComponent_vue_vue_type_template_id_5ae0013d__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=script&lang=js":
/*!*******************************************************************************************************!*\
  !*** ./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=script&lang=js ***!
  \*******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MasterDashboardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MasterDashboardComponent_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MasterDashboardComponent.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=template&id=5ae0013d":
/*!*************************************************************************************************************!*\
  !*** ./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=template&id=5ae0013d ***!
  \*************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MasterDashboardComponent_vue_vue_type_template_id_5ae0013d__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_MasterDashboardComponent_vue_vue_type_template_id_5ae0013d__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./MasterDashboardComponent.vue?vue&type=template&id=5ae0013d */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/ts/vue/backend/pages/dashboard/MasterDashboardComponent.vue?vue&type=template&id=5ae0013d");


/***/ })

}]);