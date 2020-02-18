(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5b24e5f6","chunk-57e1a198"],{"70ea":function(t,e,a){"use strict";var r=a("79ab"),s=a.n(r);s.a},7273:function(t,e,a){"use strict";a.d(e,"d",function(){return i}),a.d(e,"c",function(){return n}),a.d(e,"a",function(){return o}),a.d(e,"e",function(){return c}),a.d(e,"b",function(){return l});var r=a("b775"),s="ajax/";function i(t){return Object(r["a"])({url:s+"projects/paginate",method:"get",params:t})}function n(t){return Object(r["a"])({url:s+"projects/"+t,method:"get"})}function o(t){return Object(r["a"])({url:s+"projects",method:"post",data:t})}function c(t,e){return Object(r["a"])({url:s+"projects/"+t,method:"patch",data:e})}function l(t){return Object(r["a"])({url:s+"projects/"+t,method:"delete"})}},"79ab":function(t,e,a){},"8ef8":function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("main",{attrs:{id:"main-container"}},[a("div",{staticClass:"row no-gutters flex-md-10-auto"},[a("div",{staticClass:"col-md-4 col-lg-5 col-xl-3 order-md-1 bg-white"},[a("div",{staticClass:"content p-0"},[a("div",{staticClass:"d-md-none p-3"},[a("button",{staticClass:"btn btn-block btn-hero-primary",attrs:{type:"button","data-toggle":"class-toggle","data-target":"#side-content","data-class":"d-none"}},[t._v("\n                     "+t._s(t.$t("Setting"))+"\n                  ")])]),a("div",{staticClass:"d-none d-md-block push",attrs:{id:"side-content"}},[a("div",{attrs:{id:"settings-accordion",role:"tablist","aria-multiselectable":"true"}},[a("div",{staticClass:"block mb-0"},[a("div",{staticClass:"block-header block-header-default p-0",attrs:{role:"tab",id:"settings-accordion_h1"}},[a("a",{staticClass:"font-w600 d-block w-100 p-3",attrs:{"data-toggle":"collapse","data-parent":"#settings-accordion",href:"#settings-accordion_s1","aria-expanded":"true","aria-controls":"settings-accordion_s1"}},[t._v(t._s(t.$t("Status")))])]),a("div",{staticClass:"collapse show",attrs:{id:"settings-accordion_s1",role:"tabpanel","aria-labelledby":"settings-accordion_h1","data-parent":"#settings-accordion"}},[a("div",{staticClass:"block-content"},[a("div",{staticClass:"form-group row"},[a("div",{staticClass:"col-12"},[a("select",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.status,expression:"currentForm.status"}],staticClass:"custom-select",attrs:{id:"example-wp-visibility",name:"example-wp-visibility"},on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,function(t){return t.selected}).map(function(t){var e="_value"in t?t._value:t.value;return e});t.$set(t.currentForm,"status",e.target.multiple?a:a[0])}}},t._l(t.listStatus,function(e,r){return a("option",{key:r,domProps:{value:e.id}},[t._v(" "+t._s(e.name))])}),0)])])])])]),a("div",{staticClass:"block mb-0"},[a("div",{staticClass:"block-header block-header-default border-top p-0",attrs:{role:"tab",id:"settings-accordion_h2"}},[a("a",{staticClass:"font-w600 d-block w-100 p-3",attrs:{"data-toggle":"collapse","data-parent":"#settings-accordion",href:"#settings-accordion_s2","aria-expanded":"true","aria-controls":"settings-accordion_s2"}},[t._v(t._s(t.$t("Category"))+"\n                                  "),a("span",{staticClass:"text-danger"},[a("br"),t._v(t._s(t.errors.first("projectcategories")))])])]),a("div",{staticClass:"collapse",attrs:{id:"settings-accordion_s2",role:"tabpanel","aria-labelledby":"settings-accordion_h2","data-parent":"#settings-accordion"}},[a("div",{staticClass:"block-content block-content-full"},[a("div",{staticClass:"form-group"},t._l(t.projectcategories,function(e,r){return a("div",{key:r,staticClass:"custom-control custom-radio custom-control-primary mb-1"},[a("input",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"},{name:"model",rawName:"v-model",value:t.selectedCategories,expression:"selectedCategories"}],staticClass:"custom-control-input",attrs:{type:"radio",id:"input-cate-"+e.id,name:"projectcategories"},domProps:{value:e.id,checked:t._q(t.selectedCategories,e.id)},on:{change:function(a){t.selectedCategories=e.id}}}),a("label",{staticClass:"custom-control-label",attrs:{for:"input-cate-"+e.id}},[t._v(t._s(e.name))])])}),0)])])]),a("div",{staticClass:"block mb-0"},[t._m(0),a("div",{staticClass:"collapse",attrs:{id:"settings-accordion_s7",role:"tabpanel","aria-labelledby":"settings-accordion_h7","data-parent":"#settings-accordion"}},[a("div",{staticClass:"block-content"},[a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"txt-description"}},[t._v("Meta Description")]),a("div",{staticClass:"font-size-sm text-muted mb-2"},[t._v(t._s(t.$t("Display meta description tags for project")))]),a("textarea",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.meta_description,expression:"currentForm.meta_description"}],staticClass:"form-control",attrs:{id:"txt-description",name:"txt-description",rows:"4"},domProps:{value:t.currentForm.meta_description},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"meta_description",e.target.value)}}})]),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"txt-keywords"}},[t._v("Meta Keywords")]),a("div",{staticClass:"font-size-sm text-muted mb-2"},[t._v(t._s(t.$t("Keywords for the project")))]),a("textarea",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.meta_keywords,expression:"currentForm.meta_keywords"}],staticClass:"form-control",attrs:{id:"txt-keywords",name:"txt-keywords",rows:"4"},domProps:{value:t.currentForm.meta_keywords},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"meta_keywords",e.target.value)}}})])])])])])])])]),a("div",{staticClass:"col-md-8 col-lg-7 col-xl-9 order-md-0 bg-body-dark"},[a("div",{staticClass:"content content-full"},[a("div",{staticClass:"block block-fx-pop"},[a("div",{staticClass:"block-content block-content-full d-flex justify-content-between border-bottom"},[a("div",[a("nav",{attrs:{"aria-label":"breadcrumb"}},[a("ol",{staticClass:"breadcrumb"},[t._m(1),a("li",{staticClass:"breadcrumb-item"},[a("router-link",{attrs:{to:"/projects"}},[t._v(t._s(t.$t("Project")))])],1),t.isEdit?a("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v(t._s(t.$t("Edit project"))+" / "+t._s(t.currentForm.title))]):a("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v(t._s(t.$t("Create project")))])])])]),a("div",[a("a",{staticClass:"btn btn-sm btn-info",attrs:{href:"javascript:void(0)"},on:{click:function(e){return e.preventDefault(),t.submitForm(e)}}},[t._v(t._s(t.$t("Save")))])])]),a("div",{staticClass:"block-content"},[a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:1|max:254",expression:"'required|min:1|max:254'"},{name:"model",rawName:"v-model",value:t.currentForm.title,expression:"currentForm.title"}],staticClass:"form-control py-4",attrs:{type:"text",id:"post-title",name:"title",placeholder:t.$t("Title")},domProps:{value:t.currentForm.title},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"title",e.target.value)}}}),a("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.first("title")))])]),a("div",{staticClass:"form-group"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.slug,expression:"slug"}],staticClass:"form-control py-4",attrs:{type:"text",id:"post-slug",name:"post-slug",placeholder:"Url ..."},domProps:{value:t.slug},on:{input:function(e){e.target.composing||(t.slug=e.target.value)}}})]),a("div",{staticClass:"form-group"},[a("tinymce-tinymce",{key:"vue-tinymce-"+t.currentForm.id,model:{value:t.currentForm.body,callback:function(e){t.$set(t.currentForm,"body",e)},expression:"currentForm.body"}})],1)]),a("div",{staticClass:"block-content block-content-full border-top"},[a("div",{staticClass:"mb-2"},[t._m(2),t._v("\n                       "+t._s(t.$t("Project's image"))+"\n                    ")]),a("div",{staticClass:"row gutters-tiny js-gallery img-fluid-100 js-gallery-enabled"},[t._l(t.images,function(e,r){return a("div",{key:r,staticClass:"col-md-6 col-lg-4 animated fadeIn push project-image"},[e&&e.image&&""!=e.image?a("div",[a("img",{staticClass:"img-fluid",attrs:{src:e.image,alt:""}})]):a("div",{staticClass:"btn-add-image bg-grey"}),a("div",{staticClass:"image-action"},[a("a",{staticClass:"btn btn-sm btn-info add-image mr-1",attrs:{href:"javascript:void(0)"},on:{click:function(e){return e.preventDefault(),t.openFileManager(r)}}},[t._v(t._s(t.$t("Select picture")))]),a("a",{staticClass:"btn btn-sm btn-danger remove-image",attrs:{href:"javascript:void(0)"},on:{click:function(e){return e.preventDefault(),t.removeImage(r)}}},[t._v(t._s(t.$t("Delete picture")))])])])}),a("div",{staticClass:"col-md-6 col-lg-4 animated fadeIn push project-image"},[a("div",{staticClass:"btn-add-image plus-button",on:{click:function(e){return e.preventDefault(),t.addNewImage()}}},[t._v(" + ")])])],2)])])])])]),a("add-category",{attrs:{editedIndex:t.newDirectoryIndex,editedItem:t.newDirectoryItem,slug:t.newDirectorySlug},on:{saveSuccess:function(e){return t.saveNewDirectorySuccess()}}}),a("file-manager-popup")],1)},s=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"block-header block-header-default border-top p-0",attrs:{role:"tab",id:"settings-accordion_h7"}},[a("a",{staticClass:"font-w600 d-block w-100 p-3",attrs:{"data-toggle":"collapse","data-parent":"#settings-accordion",href:"#settings-accordion_s7","aria-expanded":"true","aria-controls":"settings-accordion_s7"}},[t._v("SEO")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("li",{staticStyle:{"margin-top":"-4px","margin-right":"5px"}},[a("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[a("i",{staticClass:"fa fa-plus"})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[a("i",{staticClass:"fa fa-plus"})])}],i=(a("8e6e"),a("ac6a"),a("456d"),a("a481"),a("bd86")),n=a("7273"),o=a("2b0e"),c=a("7bb1"),l=a("f48b"),u=a("dc36"),d=a("2ef0"),m=a.n(d),p=a("2f62");function g(t,e){var a=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),a.push.apply(a,r)}return a}function f(t){for(var e=1;e<arguments.length;e++){var a=null!=arguments[e]?arguments[e]:{};e%2?g(a,!0).forEach(function(e){Object(i["a"])(t,e,a[e])}):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(a)):g(a).forEach(function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(a,e))})}return t}var b=a("b747");o["a"].use(c["b"],{useConstraintAttrs:!1});var v={id:null,title:"",slug:"",body:"",meta_description:"",meta_keywords:"",status:1,projectcategories:[],images:[],locale:"vi"},h={vi:{custom:{title:{required:"Vui lòng nhập Tiêu đề"},projectcategories:{required:"Vui lòng chọn Danh mục"}}},en:{custom:{title:{required:"Please enter title"},projectcategories:{required:"Please select category"}}}};c["a"].localize(h);var y=new c["a"]({first_name:"min",second_name:"required"});y.localize("vi");var C={name:"Detail",props:{isEdit:{type:Boolean,default:!1}},components:{AddCategory:u["default"]},data:function(){return{currentForm:Object.assign({},v),valid:!0,loading:!1,panel:[!1],slug:"",projectcategories:[],isAutoSlug:!0,selectedCategories:[],newDirectoryItem:{},newDirectoryIndex:-1,newDirectorySlug:"",images:[]}},computed:f({},Object(p["e"])(["locale"]),{titleRules:function(){return"en"==this.locale?[function(t){return t.length>0||"Title cannot be empty "}]:[function(t){return t.length>0||"Tiêu đề không được để trống"}]},slugRules:function(){return"en"==this.locale?[function(t){return t.length>0||"Url cannot be empty"},function(t){return/^[a-z0-9](-?[a-z0-9])*$/.test(t)||"The url does not contain spaces"}]:[function(t){return t.length>0||"Url không được để trống"},function(t){return/^[a-z0-9](-?[a-z0-9])*$/.test(t)||"Url không chứa khoảng trắng"}]},listStatus:function(){return"en"==this.locale?[{id:1,name:"Publish"},{id:0,name:"Draft"}]:[{id:1,name:"Xuất bản"},{id:0,name:"Bản nháp"}]},notifySuccess:function(){return"en"==this.locale?{type:"success",icon:"fa fa-success mr-1",message:"Save successfully"}:{type:"success",icon:"fa fa-success mr-1",message:"Lưu dự án mới thành công."}},notifyUnSuccess:function(){return"en"==this.locale?{type:"danger",icon:"fa fa-times mr-1",message:"Failed to save"}:{type:"danger",icon:"fa fa-times mr-1",message:"Không lưu được"}}}),watch:{"currentForm.title":function(){this.isAutoSlug&&(this.slug=b(m.a.lowerCase(this.currentForm.title)))}},created:function(){if(this.isEdit){var t=this.$route.params&&this.$route.params.project;this.isAutoSlug=!1,this.getData(t)}else this.currentForm=Object.assign({},v);this.listCategories(),"en"==this.locale&&this.$validator.localize("en")},methods:f({},Object(p["d"])("app",["setSnackbar","setMessage"]),{listCategories:function(){var t=this;Object(l["d"])().then(function(e){t.projectcategories=e}).catch(function(t){console.log(t)})},addNewImage:function(){this.images.push({image:""})},removeImage:function(t){this.images.splice(t,1)},getData:function(t){var e=this;Object(n["c"])(t).then(function(t){e.currentForm=t,e.slug=t.slug,e.images=t.images,e.selectedCategories=t.projectcategories.id}).catch(function(t){console.log(t)})},submitFormRequest:function(t){var e=this;return new Promise(function(a,r){if(e.isEdit){var s=e.$route.params&&e.$route.params.project;Object(n["e"])(s,t).then(function(t){a(t)}).catch(function(t){console.log(t),r(t)})}else Object(n["a"])(t).then(function(t){a(t)}).catch(function(t){console.log(t),r(t)})})},submitForm:function(){var t=this;this.$validator.validateAll().then(function(e){e&&(t.loading=!0,t.currentForm.slug=t.slug,t.currentForm.projectcategories=t.selectedCategories,t.currentForm.images=t.images,t.currentForm.locale=t.locale,t.submitFormRequest(t.currentForm).then(function(e){t.loading=!1,Dashmix.helpers("notify",t.notifySuccess),t.isEdit||t.$router.replace("/projects/edit/"+e.id)},function(){t.loading=!1,Dashmix.helpers("notify",t.notifyUnSuccess)}))})},openFileManager:function(t){var e=this;window.setFileToElement=function(a,r){e.images[t].image=r,e.$store.dispatch("file/closeFileManager"),jQuery("#modal-site-file").modal("hide")},this.$store.dispatch("file/openFileManager"),jQuery("#modal-site-file").modal("show")},createDirectory:function(){this.newDirectoryItem={id:null,name:"",slug:"",create_at:""},this.newDirectoryIndex=-1,this.newDirectorySlug="",jQuery("#modal-add-category").modal("show")},saveNewDirectorySuccess:function(){jQuery("#modal-add-category").modal("hide"),this.listCategories()}})},_=C,j=(a("70ea"),a("2877")),w=Object(j["a"])(_,r,s,!1,null,"14111730",null);e["default"]=w.exports},b747:function(t,e,a){(function(e,a,r){t.exports=r(),t.exports["default"]=r()})(0,0,function(){var t=JSON.parse('{"$":"dollar","%":"percent","&":"and","<":"less",">":"greater","|":"or","¢":"cent","£":"pound","¤":"currency","¥":"yen","©":"(c)","ª":"a","®":"(r)","º":"o","À":"A","Á":"A","Â":"A","Ã":"A","Ä":"A","Å":"A","Æ":"AE","Ç":"C","È":"E","É":"E","Ê":"E","Ë":"E","Ì":"I","Í":"I","Î":"I","Ï":"I","Ð":"D","Ñ":"N","Ò":"O","Ó":"O","Ô":"O","Õ":"O","Ö":"O","Ø":"O","Ù":"U","Ú":"U","Û":"U","Ü":"U","Ý":"Y","Þ":"TH","ß":"ss","à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","æ":"ae","ç":"c","è":"e","é":"e","ê":"e","ë":"e","ì":"i","í":"i","î":"i","ï":"i","ð":"d","ñ":"n","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","ù":"u","ú":"u","û":"u","ü":"u","ý":"y","þ":"th","ÿ":"y","Ā":"A","ā":"a","Ă":"A","ă":"a","Ą":"A","ą":"a","Ć":"C","ć":"c","Č":"C","č":"c","Ď":"D","ď":"d","Đ":"DJ","đ":"dj","Ē":"E","ē":"e","Ė":"E","ė":"e","Ę":"e","ę":"e","Ě":"E","ě":"e","Ğ":"G","ğ":"g","Ģ":"G","ģ":"g","Ĩ":"I","ĩ":"i","Ī":"i","ī":"i","Į":"I","į":"i","İ":"I","ı":"i","Ķ":"k","ķ":"k","Ļ":"L","ļ":"l","Ľ":"L","ľ":"l","Ł":"L","ł":"l","Ń":"N","ń":"n","Ņ":"N","ņ":"n","Ň":"N","ň":"n","Ő":"O","ő":"o","Œ":"OE","œ":"oe","Ŕ":"R","ŕ":"r","Ř":"R","ř":"r","Ś":"S","ś":"s","Ş":"S","ş":"s","Š":"S","š":"s","Ţ":"T","ţ":"t","Ť":"T","ť":"t","Ũ":"U","ũ":"u","Ū":"u","ū":"u","Ů":"U","ů":"u","Ű":"U","ű":"u","Ų":"U","ų":"u","Ź":"Z","ź":"z","Ż":"Z","ż":"z","Ž":"Z","ž":"z","ƒ":"f","Ơ":"O","ơ":"o","Ư":"U","ư":"u","ǈ":"LJ","ǉ":"lj","ǋ":"NJ","ǌ":"nj","Ș":"S","ș":"s","Ț":"T","ț":"t","˚":"o","Ά":"A","Έ":"E","Ή":"H","Ί":"I","Ό":"O","Ύ":"Y","Ώ":"W","ΐ":"i","Α":"A","Β":"B","Γ":"G","Δ":"D","Ε":"E","Ζ":"Z","Η":"H","Θ":"8","Ι":"I","Κ":"K","Λ":"L","Μ":"M","Ν":"N","Ξ":"3","Ο":"O","Π":"P","Ρ":"R","Σ":"S","Τ":"T","Υ":"Y","Φ":"F","Χ":"X","Ψ":"PS","Ω":"W","Ϊ":"I","Ϋ":"Y","ά":"a","έ":"e","ή":"h","ί":"i","ΰ":"y","α":"a","β":"b","γ":"g","δ":"d","ε":"e","ζ":"z","η":"h","θ":"8","ι":"i","κ":"k","λ":"l","μ":"m","ν":"n","ξ":"3","ο":"o","π":"p","ρ":"r","ς":"s","σ":"s","τ":"t","υ":"y","φ":"f","χ":"x","ψ":"ps","ω":"w","ϊ":"i","ϋ":"y","ό":"o","ύ":"y","ώ":"w","Ё":"Yo","Ђ":"DJ","Є":"Ye","І":"I","Ї":"Yi","Ј":"J","Љ":"LJ","Њ":"NJ","Ћ":"C","Џ":"DZ","А":"A","Б":"B","В":"V","Г":"G","Д":"D","Е":"E","Ж":"Zh","З":"Z","И":"I","Й":"J","К":"K","Л":"L","М":"M","Н":"N","О":"O","П":"P","Р":"R","С":"S","Т":"T","У":"U","Ф":"F","Х":"H","Ц":"C","Ч":"Ch","Ш":"Sh","Щ":"Sh","Ъ":"U","Ы":"Y","Ь":"","Э":"E","Ю":"Yu","Я":"Ya","а":"a","б":"b","в":"v","г":"g","д":"d","е":"e","ж":"zh","з":"z","и":"i","й":"j","к":"k","л":"l","м":"m","н":"n","о":"o","п":"p","р":"r","с":"s","т":"t","у":"u","ф":"f","х":"h","ц":"c","ч":"ch","ш":"sh","щ":"sh","ъ":"u","ы":"y","ь":"","э":"e","ю":"yu","я":"ya","ё":"yo","ђ":"dj","є":"ye","і":"i","ї":"yi","ј":"j","љ":"lj","њ":"nj","ћ":"c","џ":"dz","Ґ":"G","ґ":"g","฿":"baht","ა":"a","ბ":"b","გ":"g","დ":"d","ე":"e","ვ":"v","ზ":"z","თ":"t","ი":"i","კ":"k","ლ":"l","მ":"m","ნ":"n","ო":"o","პ":"p","ჟ":"zh","რ":"r","ს":"s","ტ":"t","უ":"u","ფ":"f","ქ":"k","ღ":"gh","ყ":"q","შ":"sh","ჩ":"ch","ც":"ts","ძ":"dz","წ":"ts","ჭ":"ch","ხ":"kh","ჯ":"j","ჰ":"h","ẞ":"SS","Ạ":"A","ạ":"a","Ả":"A","ả":"a","Ấ":"A","ấ":"a","Ầ":"A","ầ":"a","Ẩ":"A","ẩ":"a","Ẫ":"A","ẫ":"a","Ậ":"A","ậ":"a","Ắ":"A","ắ":"a","Ằ":"A","ằ":"a","Ẳ":"A","ẳ":"a","Ẵ":"A","ẵ":"a","Ặ":"A","ặ":"a","Ẹ":"E","ẹ":"e","Ẻ":"E","ẻ":"e","Ẽ":"E","ẽ":"e","Ế":"E","ế":"e","Ề":"E","ề":"e","Ể":"E","ể":"e","Ễ":"E","ễ":"e","Ệ":"E","ệ":"e","Ỉ":"I","ỉ":"i","Ị":"I","ị":"i","Ọ":"O","ọ":"o","Ỏ":"O","ỏ":"o","Ố":"O","ố":"o","Ồ":"O","ồ":"o","Ổ":"O","ổ":"o","Ỗ":"O","ỗ":"o","Ộ":"O","ộ":"o","Ớ":"O","ớ":"o","Ờ":"O","ờ":"o","Ở":"O","ở":"o","Ỡ":"O","ỡ":"o","Ợ":"O","ợ":"o","Ụ":"U","ụ":"u","Ủ":"U","ủ":"u","Ứ":"U","ứ":"u","Ừ":"U","ừ":"u","Ử":"U","ử":"u","Ữ":"U","ữ":"u","Ự":"U","ự":"u","Ỳ":"Y","ỳ":"y","Ỵ":"Y","ỵ":"y","Ỷ":"Y","ỷ":"y","Ỹ":"Y","ỹ":"y","‘":"\'","’":"\'","“":"\\"","”":"\\"","†":"+","•":"*","…":"...","₠":"ecu","₢":"cruzeiro","₣":"french franc","₤":"lira","₥":"mill","₦":"naira","₧":"peseta","₨":"rupee","₩":"won","₪":"new shequel","₫":"dong","€":"euro","₭":"kip","₮":"tugrik","₯":"drachma","₰":"penny","₱":"peso","₲":"guarani","₳":"austral","₴":"hryvnia","₵":"cedi","₹":"indian rupee","₽":"russian ruble","₿":"bitcoin","℠":"sm","™":"tm","∂":"d","∆":"delta","∑":"sum","∞":"infinity","♥":"love","元":"yuan","円":"yen","﷼":"rial"}');function e(e,a){if("string"!==typeof e)throw new Error("slugify: string argument expected");a="string"===typeof a?{replacement:a}:a||{};var r=e.split("").reduce(function(e,r){return e+(t[r]||r).replace(a.remove||/[^\w\s$*_+~.()'"!\-:@]/g,"")},"").trim().replace(/[-\s]+/g,a.replacement||"-");return a.lower?r.toLowerCase():r}return e.extend=function(e){for(var a in e)t[a]=e[a]},e})},dc36:function(t,e,a){"use strict";a.r(e);var r=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"modal",attrs:{id:"modal-add-category",tabindex:"-1",role:"dialog","aria-labelledby":"modal-block-vcenter","aria-hidden":"true"}},[a("div",{staticClass:"modal-dialog modal-dialog-centered",attrs:{role:"document"}},[a("div",{staticClass:"modal-content"},[a("div",{staticClass:"block block-themed block-transparent mb-0"},[a("div",{staticClass:"block-header bg-primary-dark"},[a("h3",{staticClass:"block-title"},[t._v(t._s(t.formTitle))]),t._m(0)]),a("div",{staticClass:"block-content"},[a("form",{ref:"currentxForm"},[a("div",{staticClass:"block-content"},[a("div",{staticClass:"row justify-content-center py-sm-3 py-md-5"},[a("div",{staticClass:"col-sm-10 col-md-8"},[a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"block-form8-username"}},[t._v("Tên")]),a("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:1",expression:"'required|min:1'"},{name:"model",rawName:"v-model",value:t.editedItem.name,expression:"editedItem.name"}],staticClass:"form-control form-control-alt",attrs:{type:"text",id:"block-form8-username",name:"name",placeholder:"Nhập tên"},domProps:{value:t.editedItem.name},on:{input:function(e){e.target.composing||t.$set(t.editedItem,"name",e.target.value)}}}),a("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.first("name")))])]),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:"block-form9-username"}},[t._v("Url")]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.slug,expression:"slug"}],staticClass:"form-control form-control-alt",attrs:{type:"text",id:"block-form9-username",name:"block-form9-username",placeholder:"Nhập url"},domProps:{value:t.slug},on:{input:function(e){e.target.composing||(t.slug=e.target.value)}}})])])])])])]),a("div",{staticClass:"block-content block-content-full text-right bg-light"},[a("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button","data-dismiss":"modal"}},[t._v("Huỷ bỏ")]),a("button",{staticClass:"btn btn-sm btn-primary",attrs:{type:"button"},on:{click:t.submitForm}},[t._v("Lưu lại")])])])])])])},s=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"block-options"},[a("button",{staticClass:"btn-block-option",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[a("i",{staticClass:"fa fa-fw fa-times"})])])}],i=(a("7f7f"),a("c5f6"),a("f48b")),n=a("2b0e"),o=a("7bb1"),c=a("2ef0"),l=a.n(c),u=a("b747");n["a"].use(o["b"],{useConstraintAttrs:!1});var d={vn:{custom:{name:{required:"Vui lòng nhập Tên",min:"Tên ýt nhất 1 kí tự"}}}};o["a"].localize(d);var m=new o["a"]({first_name:"min",second_name:"required"});m.localize("vn");var p={name:"AddCategory",props:{editedItem:{type:Object,default:{id:null,name:"",slug:"",create_at:""}},editedIndex:{type:Number,default:-1},slug:{type:String,default:""}},data:function(){return{}},computed:{formTitle:function(){return-1===this.editedIndex?"Tạo mới danh mục":"Sửa danh mục"},isEdit:function(){return-1!==this.editedIndex}},watch:{"editedItem.name":function(){this.isEdit||(this.slug=u(l.a.lowerCase(this.editedItem.name)))}},methods:{submitFormRequest:function(t){var e=this;return new Promise(function(a,r){if(e.isEdit){var s=t.id;Object(i["e"])(s,t).then(function(t){a(t)}).catch(function(t){r(t)})}else Object(i["a"])(t).then(function(t){a(t)}).catch(function(t){r(t)})})},submitForm:function(){var t=this;this.$validator.validateAll().then(function(e){e&&(t.loading=!0,t.editedItem.slug=t.slug,t.submitFormRequest(t.editedItem).then(function(){t.loading=!1,Dashmix.helpers("notify",{type:"success",icon:"fa fa-success mr-1",message:"Lưu thành công"}),t.$emit("saveSuccess")},function(){t.loading=!1,Dashmix.helpers("notify",{type:"danger",icon:"fa fa-times mr-1",message:"Xảy ra lỗi. Vui lòng thử lại."})}))})}}},g=p,f=a("2877"),b=Object(f["a"])(g,r,s,!1,null,"1cb85838",null);e["default"]=b.exports},f48b:function(t,e,a){"use strict";a.d(e,"d",function(){return i}),a.d(e,"c",function(){return n}),a.d(e,"a",function(){return o}),a.d(e,"e",function(){return c}),a.d(e,"b",function(){return l});var r=a("b775"),s="ajax/";function i(t){return Object(r["a"])({url:s+"projectcategories",method:"get",params:t})}function n(t){return Object(r["a"])({url:s+"projectcategories/"+t,method:"get"})}function o(t){return Object(r["a"])({url:s+"projectcategories",method:"post",data:t})}function c(t,e){return Object(r["a"])({url:s+"projectcategories/"+t,method:"patch",data:e})}function l(t){return Object(r["a"])({url:s+"projectcategories/"+t,method:"delete"})}}}]);
//# sourceMappingURL=chunk-5b24e5f6.34c8b38e.js.map