(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-327a1c51","chunk-48310780"],{"23d1":function(t,e,r){"use strict";r.r(e);var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("main",{attrs:{id:"main-container"}},[r("div",{staticClass:"content"},[r("form",{ref:"currentxForm"},[r("div",{staticClass:"block block-rounded block-bordered"},[r("div",{staticClass:"block-header block-header-default"},[r("nav",{attrs:{"aria-label":"breadcrumb"}},[r("ol",{staticClass:"breadcrumb"},[t._m(0),r("li",{staticClass:"breadcrumb-item"},[r("router-link",{attrs:{to:"/users"}},[t._v(t._s(t.$t("User")))])],1),t.isEdit?r("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v(t._s(t.$t("Edit User"))+" / "+t._s(t.currentForm.name))]):r("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v(t._s(t.$t("New User")))])])])]),r("div",{staticClass:"block-content"},[r("div",{staticClass:"row justify-content-center py-sm-3 py-md-5"},[r("div",{staticClass:"col-sm-10 col-md-8"},[r("div",{staticClass:"form-group"},[r("label",[t._v(t._s(t.$t("Account's name")))]),r("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:6",expression:"'required|min:6'"},{name:"model",rawName:"v-model",value:t.currentForm.name,expression:"currentForm.name"}],staticClass:"form-control form-control-alt",attrs:{type:"text",name:"username",placeholder:t.$t("Enter an account name")},domProps:{value:t.currentForm.name},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"name",e.target.value)}}}),r("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.first("username")))])]),r("div",{staticClass:"form-group"},[r("label",[t._v("Email")]),r("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|email|min:10",expression:"'required|email|min:10'"},{name:"model",rawName:"v-model",value:t.currentForm.email,expression:"currentForm.email"}],staticClass:"form-control form-control-alt",attrs:{type:"text",name:"email"},domProps:{value:t.currentForm.email},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"email",e.target.value)}}}),r("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.first("email")))])]),r("div",{staticClass:"form-group"},[r("label",[t._v(t._s(t.$t("Password")))]),r("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:6",expression:"'required|min:6'"},{name:"model",rawName:"v-model",value:t.currentForm.password,expression:"currentForm.password"}],staticClass:"form-control form-control-alt",attrs:{type:"password",name:"password"},domProps:{value:t.currentForm.password},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"password",e.target.value)}}}),r("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.first("password")))])])])])]),r("div",{staticClass:"block-content block-content-full block-content-sm bg-body-light text-right"},[r("button",{staticClass:"btn btn-sm btn-success",attrs:{type:"submit"},on:{click:function(e){return e.preventDefault(),t.submitForm(e)}}},[r("i",{staticClass:"fa fa-check"}),t._v(" "+t._s(t.$t("Save"))+"\n            ")])])])])])])},n=[function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("li",{staticStyle:{"margin-top":"-4px","margin-right":"5px"}},[r("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[r("i",{staticClass:"fa fa-plus"})])])}],s=(r("8e6e"),r("ac6a"),r("456d"),r("a481"),r("bd86")),i=r("2612"),o=r("2b0e"),c=r("7bb1"),u=(r("2ef0"),r("2f62"));function l(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(t);e&&(a=a.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),r.push.apply(r,a)}return r}function m(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?l(r,!0).forEach(function(e){Object(s["a"])(t,e,r[e])}):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):l(r).forEach(function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))})}return t}o["a"].use(c["b"],{useConstraintAttrs:!1});var d={username:"",email:"",password:""},p={vn:{custom:{username:{required:"Vui lòng nhập username",min:"Username ít nhất 6 kí tự"},email:{required:"Vui lòng nhập mail bạn",email:"Mail chưa đúng định dạng",min:"Tên ít nhất 6 kí tự"},password:{required:"Vui lòng nhập mật khẩu của bạn",min:"Mật khẩu ít nhất 6 kí tự"}}}};c["a"].localize(p);var f=new c["a"]({first_name:"min",second_name:"required"});f.localize("vn");var b={name:"Detail",props:{isEdit:{type:Boolean,default:!1}},data:function(){return{currentForm:Object.assign({},d),valid:!0,loading:!1,snackbar:!1,txtError:"",nameRules:[function(t){return!!t||"Vui lòng nhập tên"}],emailRules:[function(t){return!!t||"Vui lòng nhập email"},function(t){return/.+@.+/.test(t)||"Vui lòng nhập đúng định dạng email"}],passwordRules:[function(t){return!!t||"Vui lòng nhập mật khẩu"}]}},computed:m({},Object(u["e"])(["locale"])),created:function(){if(this.isEdit){var t=this.$route.params&&this.$route.params.user;this.passwordRules=[],this.getData(t)}else this.currentForm=Object.assign({},d)},methods:{getData:function(t){var e=this;Object(i["b"])(t).then(function(t){e.currentForm=t}).catch(function(t){console.log(t)})},submitFormRequest:function(t){var e=this;return new Promise(function(r,a){if(e.isEdit){var n=e.$route.params&&e.$route.params.user;Object(i["c"])(n,t).then(function(t){r(t)}).catch(function(t){a(t)})}else Object(i["a"])(t).then(function(t){r(t)}).catch(function(t){a(t)})})},submitForm:function(){var t=this;this.$validator.validateAll().then(function(e){e&&(t.loading=!0,t.submitFormRequest(t.currentForm).then(function(e){t.loading=!1,Dashmix.helpers("notify",{type:"success",icon:"fa fa-success mr-1",message:"Lưu người dùng thành công."}),t.isEdit||t.$router.replace("/users/edit/"+e.id)},function(){t.loading=!1,Dashmix.helpers("notify",{type:"danger",icon:"fa fa-times mr-1",message:"Email đã có."})}))})},openFileManager:function(t){var e=this;window.setFileToElement=function(r,a){e.currentForm[t]=r,e.$store.dispatch("file/closeFileManager")},this.$store.dispatch("file/openFileManager")}}},v=b,h=r("2877"),g=Object(h["a"])(v,a,n,!1,null,"152e1b97",null);e["default"]=g.exports},2612:function(t,e,r){"use strict";r.d(e,"b",function(){return s}),r.d(e,"a",function(){return i}),r.d(e,"c",function(){return o});var a=r("b775"),n="ajax/";function s(t){return Object(a["a"])({url:n+"users/"+t,method:"get"})}function i(t){return Object(a["a"])({url:n+"users",method:"post",data:t})}function o(t,e){return Object(a["a"])({url:n+"users/"+t,method:"patch",data:e})}},f95f:function(t,e,r){"use strict";r.r(e);var a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("detail",{attrs:{"is-edit":!0}})},n=[],s=r("23d1"),i={name:"Edit User",components:{Detail:s["default"]}},o=i,c=r("2877"),u=Object(c["a"])(o,a,n,!1,null,null,null);e["default"]=u.exports}}]);
//# sourceMappingURL=chunk-327a1c51.e52f0bdd.js.map