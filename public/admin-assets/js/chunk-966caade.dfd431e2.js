(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-966caade","chunk-08562e33"],{"433e":function(t,e,s){"use strict";s.r(e);var i=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("main",{attrs:{id:"main-container"}},[s("div",{staticClass:"row no-gutters flex-md-10-auto"},[s("div",{staticClass:"col-md-4 col-lg-5 col-xl-3 order-md-1 bg-white"},[s("div",{staticClass:"content p-0"},[s("div",{staticClass:"d-md-none p-3"},[s("button",{staticClass:"btn btn-block btn-hero-primary",attrs:{type:"button","data-toggle":"class-toggle","data-target":"#side-content","data-class":"d-none"}},[t._v("\n                      "+t._s(t.$t("Setting"))+"\n                  ")])]),s("div",{staticClass:"d-none d-md-block push",attrs:{id:"side-content"}},[s("div",{attrs:{id:"settings-accordion",role:"tablist","aria-multiselectable":"true"}},[s("div",{staticClass:"block mb-0"},[s("div",{staticClass:"block-header block-header-default p-0",attrs:{role:"tab",id:"settings-accordion_h1"}},[s("a",{staticClass:"font-w600 d-block w-100 p-3",attrs:{"data-toggle":"collapse","data-parent":"#settings-accordion",href:"#settings-accordion_s1","aria-expanded":"true","aria-controls":"settings-accordion_s1"}},[t._v(" "+t._s(t.$t("Status")))])]),s("div",{staticClass:"collapse show",attrs:{id:"settings-accordion_s1",role:"tabpanel","aria-labelledby":"settings-accordion_h1","data-parent":"#settings-accordion"}},[s("div",{staticClass:"block-content"},[s("div",{staticClass:"form-group row"},[s("div",{staticClass:"col-12"},[s("select",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.status,expression:"currentForm.status"}],staticClass:"custom-select",attrs:{id:"example-wp-visibility",name:"example-wp-visibility"},on:{change:function(e){var s=Array.prototype.filter.call(e.target.options,function(t){return t.selected}).map(function(t){var e="_value"in t?t._value:t.value;return e});t.$set(t.currentForm,"status",e.target.multiple?s:s[0])}}},t._l(t.listStatus,function(e,i){return s("option",{key:i,domProps:{value:e.id}},[t._v(" "+t._s(e.name))])}),0)])])])])])])])])]),s("div",{staticClass:"col-md-8 col-lg-7 col-xl-9 order-md-0 bg-body-dark"},[s("div",{staticClass:"content content-full"},[s("div",{staticClass:"block block-fx-pop"},[s("div",{staticClass:"block-content block-content-full d-flex justify-content-between border-bottom"},[s("div",[t._m(0),t._v("\n                           "+t._s(t.$t("Edit slide"))+"\n                      ")]),s("div",[s("a",{staticClass:"btn btn-sm btn-info",attrs:{href:"javascript:void(0)"},on:{click:function(e){return e.preventDefault(),t.submitForm(e)}}},[t._v(" "+t._s(t.$t("Save")))])])]),s("div",{staticClass:"block-content block-content-full"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-12 project-image"},[s("div",{staticClass:"form-group"},[s("label",{attrs:{for:"list_slide_name"}},[t._v(t._s(t.$t("List slide name:")))]),s("input",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.name,expression:"currentForm.name"}],staticClass:"form-control py-4",attrs:{type:"text",name:"list_slide_name",id:"list_slide_name"},domProps:{value:t.currentForm.name},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"name",e.target.value)}}})]),s("div",{staticClass:"form-group"},[s("label",{attrs:{for:"list_slide_key"}},[t._v(t._s(t.$t("List slide key:")))]),s("input",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.key,expression:"currentForm.key"}],staticClass:"form-control py-4",attrs:{type:"text",name:"list_slide_key",id:"list_slide_key",placeholder:t.$t("List Slide Name")},domProps:{value:t.currentForm.key},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"key",e.target.value)}}})])])]),s("div",{staticClass:"row"},[s("div",{staticClass:"col-12"},[s("div",{staticClass:"form-group"},[s("label",[t._v(t._s(t.$t("List slide:")))])])])]),t._l(t.slides,function(e,i){return s("div",{key:i,staticClass:"row gutters-tiny border-bottom img-fluid-100 animated fadeIn push"},[s("div",{staticClass:"col-md-6 project-image"},[s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.title,expression:"slide.title"}],staticClass:"form-control py-4",attrs:{type:"text",name:"post-title",placeholder:t.$t("Title")},domProps:{value:e.title},on:{input:function(s){s.target.composing||t.$set(e,"title",s.target.value)}}})]),s("div",{staticClass:"form-group"},[s("textarea",{directives:[{name:"model",rawName:"v-model",value:e.description,expression:"slide.description"}],staticClass:"form-control",attrs:{name:"txt-description",rows:"4",placeholder:t.$t("Content")},domProps:{value:e.description},on:{input:function(s){s.target.composing||t.$set(e,"description",s.target.value)}}})]),s("div",{staticClass:"form-group"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.links,expression:"slide.links"}],staticClass:"form-control py-4",attrs:{type:"text",name:"post-links",placeholder:t.$t("Link partner")},domProps:{value:e.links},on:{input:function(s){s.target.composing||t.$set(e,"links",s.target.value)}}})]),s("input",{directives:[{name:"model",rawName:"v-model",value:e.locale,expression:"slide.locale"}],attrs:{type:"hidden"},domProps:{value:e.locale},on:{input:function(s){s.target.composing||t.$set(e,"locale",s.target.value)}}})]),s("div",{staticClass:"col-md-6 project-image"},[e&&e.image&&""!=e.image?s("div",[s("img",{staticClass:"img-fluid",attrs:{src:e.image,alt:""}})]):s("div",{staticClass:"btn-add-image bg-grey"}),s("div",{staticClass:"image-action"},[s("a",{staticClass:"btn btn-sm btn-info add-image mr-1",attrs:{href:"javascript:void(0)"},on:{click:function(e){return e.preventDefault(),t.openFileManager(i)}}},[t._v(" "+t._s(t.$t("Select picture")))]),s("a",{staticClass:"btn btn-sm btn-danger remove-image",attrs:{href:"javascript:void(0)"},on:{click:function(e){return e.preventDefault(),t.removeSlide(i)}}},[t._v(" "+t._s(t.$t("Delete picture")))])])])])}),s("div",{staticClass:"row"},[s("div",{staticClass:"col-12 project-image"},[s("div",{staticClass:"btn-add-image plus-button",on:{click:function(e){return e.preventDefault(),t.addNewSlide()}}},[t._v(" + ")])])])],2)])])])]),s("add-category",{attrs:{editedIndex:t.newDirectoryIndex,editedItem:t.newDirectoryItem,slug:t.newDirectorySlug},on:{saveSuccess:function(e){return t.saveNewDirectorySuccess()}}}),s("file-manager-popup")],1)},a=[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[s("i",{staticClass:"fa fa-plus"})])}],n=(s("8e6e"),s("ac6a"),s("456d"),s("a481"),s("bd86")),r=s("b775"),o="ajax/";function l(t){return Object(r["a"])({url:o+"list_slides/"+t,method:"get"})}function c(t){return Object(r["a"])({url:o+"list_slides",method:"post",data:t})}function d(t,e){return Object(r["a"])({url:o+"list_slides/"+t,method:"patch",data:e})}s("2ef0");var u=s("2f62");function m(t,e){var s=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);e&&(i=i.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),s.push.apply(s,i)}return s}function p(t){for(var e=1;e<arguments.length;e++){var s=null!=arguments[e]?arguments[e]:{};e%2?m(s,!0).forEach(function(e){Object(n["a"])(t,e,s[e])}):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(s)):m(s).forEach(function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(s,e))})}return t}var f={id:null,status:1,name:"",key:"",slides:[],locale:"vi"},v={name:"Detail",props:{isEdit:{type:Boolean,default:!1}},data:function(){return{currentForm:Object.assign({},f),valid:!0,loading:!1,slides:[]}},created:function(){if(this.isEdit){var t=this.$route.params&&this.$route.params.list_slide;this.getData(t)}else this.currentForm=Object.assign({},f);"en"==this.locale&&this.$validator.localize("en")},computed:p({},Object(u["e"])(["locale"]),{titleRules:function(){return"en"==this.locale?[function(t){return t.length>0||"Title cannot be empty"}]:[function(t){return t.length>0||"Tiêu đề không được để trống"}]},slugRules:function(){return"en"==this.locale?[function(t){return t.length>0||"Urlcannot be empty"},function(t){return/^[a-z0-9](-?[a-z0-9])*$/.test(t)||"Url does not contain spaces"}]:[function(t){return t.length>0||"Url không được để trống"},function(t){return/^[a-z0-9](-?[a-z0-9])*$/.test(t)||"Url không chứa khoảng trắng"}]},listStatus:function(){return"en"==this.locale?[{id:1,name:"Publish"},{id:0,name:"Draft"}]:[{id:1,name:"Xuất bản"},{id:0,name:"Bản nháp"}]},notifySuccess:function(){return"en"==this.locale?{type:"success",icon:"fa fa-success mr-1",message:"Save successfully"}:{type:"success",icon:"fa fa-success mr-1",message:"Lưu slide thành công."}},notifyUnSuccess:function(){return"en"==this.locale?{type:"danger",icon:"fa fa-times mr-1",message:"Failed to save"}:{type:"danger",icon:"fa fa-times mr-1",message:"Không lưu được"}}}),methods:{addNewSlide:function(){this.slides.push({image:"",locale:this.locale})},removeSlide:function(t){this.slides.splice(t,1)},getData:function(t){var e=this;l(t).then(function(t){e.currentForm=t,e.slides=t.slides}).catch(function(t){console.log(t)})},submitFormRequest:function(t){var e=this;return new Promise(function(s,i){if(e.isEdit){var a=e.$route.params&&e.$route.params.list_slide;d(a,t).then(function(t){s(t)}).catch(function(t){console.log(t),i(t)})}else c(t).then(function(t){s(t)}).catch(function(t){console.log(t),i(t)})})},submitForm:function(){var t=this;this.loading=!0,this.currentForm.slides=this.slides,this.currentForm.locale=this.locale,this.submitFormRequest(this.currentForm).then(function(e){t.loading=!1,Dashmix.helpers("notify",t.notifySuccess),t.isEdit||t.$router.replace("/list_slides/edit/"+e.id)},function(){t.loading=!1,Dashmix.helpers("notify",t.notifyUnSuccess)})},openFileManager:function(t){var e=this;window.setFileToElement=function(s,i){e.slides[t].image=i,e.$store.dispatch("file/closeFileManager"),jQuery("#modal-site-file").modal("hide")},this.$store.dispatch("file/openFileManager"),jQuery("#modal-site-file").modal("show")}}},g=v,h=(s("e78a"),s("2877")),b=Object(h["a"])(g,i,a,!1,null,"e59c77f6",null);e["default"]=b.exports},cbd6:function(t,e,s){"use strict";s.r(e);var i=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("detail",{attrs:{"is-edit":!1}})},a=[],n=s("433e"),r={name:"ListSlidesCreate",components:{Detail:n["default"]}},o=r,l=s("2877"),c=Object(l["a"])(o,i,a,!1,null,null,null);e["default"]=c.exports},e78a:function(t,e,s){"use strict";var i=s("f2f0"),a=s.n(i);a.a},f2f0:function(t,e,s){}}]);
//# sourceMappingURL=chunk-966caade.dfd431e2.js.map