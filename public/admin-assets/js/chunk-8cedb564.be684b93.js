(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-8cedb564"],{"12f5":function(t,s,a){},2730:function(t,s,a){"use strict";a.r(s);var e=function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("main",{attrs:{id:"main-container"}},[a("div",{staticClass:"content"},[a("div",{staticClass:"block block-rounded block-bordered"},[a("div",{staticClass:"block-header block-header-default"},[a("h3",{staticClass:"block-title"},[t._v(t._s(t.$t("Statistical information")))]),a("button",{staticClass:"btn btn-outline-info",attrs:{type:"button","data-toggle":"block-option","data-action":"state_toggle","data-action-mode":"demo"},on:{click:function(s){return s.preventDefault(),t.loadNew(s)}}},[a("i",{staticClass:"si si-refresh"}),t._v(t._s(t.$t("Update"))+"\n                ")])]),a("div",{staticClass:"block-content"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-md-6 col-xl-4"},[a("router-link",{staticClass:"nav-main-link bg-body-dark",attrs:{to:"/posts"}},[a("div",{staticClass:"block-content block-content-full d-flex align-items-center justify-content-between"},[a("div",[a("i",{staticClass:"fa fa-2x fa-arrow-alt-circle-up "})]),a("div",{staticClass:"ml-3 text-right"},[a("p",{staticClass:"text-xwork-darker font-size-h3 font-w500 mb-0"},[t._v("\n                                        "+t._s(t.statisticals.count_posts)+"\n                                    ")]),a("p",{staticClass:"text-xwork-dark mb-0"},[t._v("\n                                        "+t._s(t.$t("Post"))+"\n                                    ")])])])])],1),a("div",{staticClass:"col-md-6 col-xl-4"},[a("router-link",{staticClass:"nav-main-link bg-body-dark",attrs:{to:"/products"}},[a("div",{staticClass:"block-content block-content-full d-flex align-items-center justify-content-between"},[a("div",[a("i",{staticClass:"fa fa-2x fa-chart-line text-success"})]),a("div",{staticClass:"ml-3 text-right"},[a("p",{staticClass:"text-xwork-darker font-size-h3 font-w500 mb-0"},[t._v("\n                                        "+t._s(t.statisticals.count_products)+"\n                                    ")]),a("p",{staticClass:"ttext-xwork-dark mb-0"},[t._v("\n                                        "+t._s(t.$t("Product"))+"\n                                    ")])])])])],1),a("div",{staticClass:"col-md-6 col-xl-4"},[a("router-link",{staticClass:"nav-main-link bg-body-dark",attrs:{to:"/users"}},[a("div",{staticClass:"block-content block-content-full d-flex align-items-center justify-content-between"},[a("div",[a("i",{staticClass:"far fa-2x fa-user text-danger"})]),a("div",{staticClass:"ml-3 text-right"},[a("p",{staticClass:"text-xwork-darker font-size-h3 font-w500 mb-0"},[t._v("\n                                        "+t._s(t.statisticals.count_users)+"\n                                    ")]),a("p",{staticClass:"text-xwork-dark mb-0"},[t._v("\n                                        "+t._s(t.$t("User"))+"\n                                    ")])])])])],1),a("div",{staticClass:"col-md-6 col-xl-6"},[a("router-link",{staticClass:"nav-main-link bg-body-dark",attrs:{to:"/subscribers"}},[a("div",{staticClass:"block-content block-content-full d-flex align-items-center justify-content-between"},[a("div",[a("i",{staticClass:"fa fa-2x fa-boxes text-info"})]),a("div",{staticClass:"ml-3 text-right"},[a("p",{staticClass:"text-xwork-darker font-size-h3 font-w500 mb-0"},[t._v("\n                                        "+t._s(t.statisticals.count_subscribers)+"\n                                    ")]),a("p",{staticClass:"text-xwork-dark mb-0"},[t._v("\n                                        "+t._s(t.$t("Registered customers"))+"\n                                    ")])])])])],1),a("div",{staticClass:"col-md-6 col-xl-6"},[a("router-link",{staticClass:"nav-main-link bg-body-dark",attrs:{to:"/customercontacts"}},[a("div",{staticClass:"block-content block-content-full d-flex align-items-center justify-content-between"},[a("div",[a("i",{staticClass:"fa fa-2x fa-arrow-alt-circle-up text-warning"})]),a("div",{staticClass:"ml-3 text-right"},[a("p",{staticClass:"text-xwork-darker font-size-h3 font-w500 mb-0"},[t._v("\n                                        "+t._s(t.statisticals.count_contacts)+"\n                                    ")]),a("p",{staticClass:"text-xwork-dark mb-0"},[t._v("\n                                        "+t._s(t.$t("Custommer contact"))+"\n                                    ")])])])])],1)]),a("div",{staticClass:"row"},[a("div",{staticClass:"col-xl-6"},[a("div",{staticClass:"block block-rounded block-bordered"},[a("div",{staticClass:"block-header block-header-default"},[a("h3",{staticClass:"block-title"},[t._v(t._s(t.$t("Register get the latest infomation")))])]),a("div",{staticClass:"block-content"},[a("div",{staticClass:"table-responsive"},[a("table",{staticClass:"table table-bordered table-striped table-vcenter"},[a("thead",[a("tr",t._l(t.headersubscribers,function(s,e){return a("th",{key:e},[t._v(" "+t._s(s.text)+"\n                                            ")])}),0)]),a("tbody",t._l(t.statisticals.new_subscribers,function(s,e){return t.statisticals.new_subscribers?a("tr",{key:e},[a("td",{staticClass:"font-w600"},[t._v("\n                                                "+t._s(s.name)+"\n                                            ")]),a("td",[t._v(t._s(s.email))])]):t._e()}),0)])])])])]),a("div",{staticClass:"col-xl-6"},[a("div",{staticClass:"block block-rounded block-bordered"},[a("div",{staticClass:"block-header block-header-default"},[a("h3",{staticClass:"block-title"},[t._v(t._s(t.$t("Recent contact person")))])]),a("div",{staticClass:"block-content"},[a("div",{staticClass:"table-responsive"},[a("table",{staticClass:"table table-bordered table-striped table-vcenter"},[a("thead",[a("tr",t._l(t.headercontacts,function(s,e){return a("th",{key:e},[t._v(" "+t._s(s.text)+"\n                                            ")])}),0)]),a("tbody",t._l(t.statisticals.new_contacts,function(s,e){return t.statisticals.new_contacts?a("tr",{key:e},[a("td",{staticClass:"font-w600"},[t._v("\n                                                "+t._s(s.email)+"\n                                            ")]),a("td",[t._v("\n                                                "+t._s(s.full_name)+"\n                                            ")]),a("td",[t._v("\n                                                "+t._s(s.phone)+"\n                                            ")])]):t._e()}),0)])])])])])])])])])])},i=[],n=a("b775"),l="ajax/";function c(){return Object(n["a"])({url:l+"statisticals/",method:"get"})}var o={name:"Statisticals",data:function(){return{headercomments:[{sortable:!1,text:"Tên",value:"name"},{sortable:!1,text:"Nội dung",value:"content"}],headersubscribers:[{sortable:!1,text:"Tên",value:"name"},{sortable:!1,text:"Email",value:"email"}],headercontacts:[{sortable:!1,text:"Email",value:"email"},{sortable:!1,text:"Tên",value:"full_name"},{sortable:!1,text:"Điện thoại",value:"phone"}],listLoading:!0,statisticals:{}}},created:function(){this.getList()},methods:{getList:function(){var t=this;this.listLoading=!0,c().then(function(s){t.statisticals=s})},loadNew:function(){var t=this;this.listLoading=!0,c().then(function(s){t.statisticals=s})}}},r=o,d=(a("d173"),a("2877")),b=Object(d["a"])(r,e,i,!1,null,"5a585452",null);s["default"]=b.exports},d173:function(t,s,a){"use strict";var e=a("12f5"),i=a.n(e);i.a}}]);
//# sourceMappingURL=chunk-8cedb564.be684b93.js.map