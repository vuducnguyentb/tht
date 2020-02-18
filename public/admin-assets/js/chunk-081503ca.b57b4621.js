(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-081503ca","chunk-1e175e48"],{"1e3f":function(e,t,r){"use strict";r.r(t);var n=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("main",{attrs:{id:"main-container"}},[r("div",{staticClass:"content"},[r("form",{ref:"currentxForm"},[r("div",{staticClass:"block block-rounded block-bordered"},[r("div",{staticClass:"block-header block-header-default"},[r("nav",{attrs:{"aria-label":"breadcrumb"}},[r("ol",{staticClass:"breadcrumb"},[e._m(0),r("li",{staticClass:"breadcrumb-item"},[r("router-link",{attrs:{to:"/productcategories"}},[e._v(e._s(e.$t("Category's product")))])],1),e.isEdit?r("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[e._v(e._s(e.$t("Edit"))+" / "+e._s(e.currentForm.name))]):r("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[e._v(e._s(e.$t("Add")))])])])]),r("div",{staticClass:"block-content"},[r("div",{staticClass:"row justify-content-center py-sm-3 py-md-5"},[r("div",{staticClass:"col-sm-10 col-md-8"},[r("div",{staticClass:"form-group"},[r("label",[e._v(e._s(e.$t("Name")))]),r("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:2",expression:"'required|min:2'"},{name:"model",rawName:"v-model",value:e.currentForm.name,expression:"currentForm.name"}],staticClass:"form-control form-control-alt",attrs:{type:"text",name:"name"},domProps:{value:e.currentForm.name},on:{input:function(t){t.target.composing||e.$set(e.currentForm,"name",t.target.value)}}}),r("span",{staticClass:"text-danger"},[e._v(e._s(e.errors.first("name")))])]),r("div",{staticClass:"form-group"},[r("label",[e._v(e._s(e.$t("Link")))]),r("input",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"},{name:"model",rawName:"v-model",value:e.slug,expression:"slug"}],staticClass:"form-control form-control-alt",attrs:{type:"text",name:"slug"},domProps:{value:e.slug},on:{input:function(t){t.target.composing||(e.slug=t.target.value)}}})]),r("div",{staticClass:"form-group"},[r("label",[e._v(e._s(e.$t("Order")))]),r("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|decimal",expression:"'required|decimal'"},{name:"model",rawName:"v-model",value:e.currentForm.order,expression:"currentForm.order"}],staticClass:"form-control form-control-alt",attrs:{type:"text",name:"order"},domProps:{value:e.currentForm.order},on:{input:function(t){t.target.composing||e.$set(e.currentForm,"order",t.target.value)}}}),r("span",{staticClass:"text-danger"},[e._v(e._s(e.errors.first("order")))])])])])]),r("div",{staticClass:"block-content block-content-full block-content-sm bg-body-light text-right"},[r("button",{staticClass:"btn btn-sm btn-success",attrs:{type:"submit"},on:{click:function(t){return t.preventDefault(),e.submitForm(t)}}},[r("i",{staticClass:"fa fa-check"}),e._v(" "+e._s(e.$t("Save"))+"\n                    ")])])])])])])},a=[function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("li",{staticStyle:{"margin-top":"-4px","margin-right":"5px"}},[r("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[r("i",{staticClass:"fa fa-plus"})])])}],o=(r("8e6e"),r("ac6a"),r("456d"),r("a481"),r("7f7f"),r("bd86")),i=r("66e2"),s=r("2b0e"),c=r("7bb1"),u=r("2ef0"),l=r.n(u),m=r("2f62");function d(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable})),r.push.apply(r,n)}return r}function p(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?d(r,!0).forEach(function(t){Object(o["a"])(e,t,r[t])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):d(r).forEach(function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))})}return e}var f=r("b747");s["a"].use(c["b"],{useConstraintAttrs:!1});var h={name:"",slug:"",order:"",locale:"vi"},g={vn:{custom:{name:{required:"Vui lòng nhập Tên Danh mục sản phẩm",min:"Tên Danh mục sản phẩm ít nhất 2 kí tự",max:"Tên Danh mục sản phẩm quá dài"},order:{required:"Vui lòng nhập Thứ tự",decimal:"Thứ tự phải là số"}}}};c["a"].localize(g);var b=new c["a"]({name:"required|min"});b.localize("vn");var v={name:"Detail",props:{isEdit:{type:Boolean,default:!1}},data:function(){return{currentForm:Object.assign({},h),valid:!0,loading:!1,snackbar:!1,txtError:"",nameRules:[function(e){return e.length>0||"Tên Danh mục giải pháp không được để trống"}],slugRules:[function(e){return e.length>0||"Tên dẫn link không được để trống"},function(e){return/^[a-z0-9](-?[a-z0-9])*$/.test(e)||"Tên dẫn link không chứa khoảng trắng"}],orderRules:[function(e){return/^\d+/.test(e)||"Thứ tự là kiểu số"}],slug:"",isAutoSlug:!0}},computed:p({},Object(m["e"])(["locale"])),watch:{"currentForm.name":function(){this.isAutoSlug&&(this.slug=f(l.a.lowerCase(this.currentForm.name)))}},created:function(){if(this.isEdit){var e=this.$route.params&&this.$route.params.productcategory;this.getData(e)}else this.currentForm=Object.assign({},h)},methods:p({},Object(m["d"])("app",["setSnackbar","setMessage"]),{getData:function(e){var t=this;Object(i["c"])(e).then(function(e){t.currentForm=e}).catch(function(e){console.log(e)})},submitFormRequest:function(e){var t=this;return new Promise(function(r,n){if(t.isEdit){var a=t.$route.params&&t.$route.params.productcategory;Object(i["e"])(a,e).then(function(e){r(e)}).catch(function(e){n(e)})}else Object(i["a"])(e).then(function(e){r(e)}).catch(function(e){n(e)})})},submitForm:function(){var e=this;this.currentForm.slug=this.slug,this.currentForm.locale=this.locale,this.$validator.validateAll().then(function(t){t&&(e.loading=!0,e.submitFormRequest(e.currentForm).then(function(t){console.log("Categories submitFormRequest->respone id:"),console.log(t.id),e.loading=!1,Dashmix.helpers("notify",{type:"success",icon:"fa fa-success mr-1",message:"Lưu Tên Danh mục giải pháp thành công."}),e.isEdit||e.$router.replace("/productcategories/edit/"+t.id)},function(){e.loading=!1,Dashmix.helpers("notify",{type:"danger",icon:"fa fa-times mr-1",message:"Tên Danh mục giải pháp đã có."})}))})},openFileManager:function(e){var t=this;window.setFileToElement=function(r,n){t.currentForm[e]=r,t.$store.dispatch("file/closeFileManager")},this.$store.dispatch("file/openFileManager")}})},O=v,y=r("2877"),k=Object(y["a"])(O,n,a,!1,null,"66d2d276",null);t["default"]=k.exports},"66e2":function(e,t,r){"use strict";r.d(t,"d",function(){return o}),r.d(t,"c",function(){return i}),r.d(t,"a",function(){return s}),r.d(t,"e",function(){return c}),r.d(t,"b",function(){return u});var n=r("b775"),a="ajax/";function o(e){return Object(n["a"])({url:a+"productcategories",method:"get",params:e})}function i(e){return Object(n["a"])({url:a+"productcategories/"+e,method:"get"})}function s(e){return Object(n["a"])({url:a+"productcategories",method:"post",data:e})}function c(e,t){return Object(n["a"])({url:a+"productcategories/"+e,method:"patch",data:t})}function u(e){return Object(n["a"])({url:a+"productcategories/"+e,method:"delete"})}},"99c4":function(e,t,r){"use strict";r.r(t);var n=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("detail",{attrs:{"is-edit":!1}})},a=[],o=r("1e3f"),i={name:"Create ProductCategories",components:{Detail:o["default"]}},s=i,c=r("2877"),u=Object(c["a"])(s,n,a,!1,null,null,null);t["default"]=u.exports},b747:function(e,t,r){(function(t,r,n){e.exports=n(),e.exports["default"]=n()})(0,0,function(){var e=JSON.parse('{"$":"dollar","%":"percent","&":"and","<":"less",">":"greater","|":"or","¢":"cent","£":"pound","¤":"currency","¥":"yen","©":"(c)","ª":"a","®":"(r)","º":"o","À":"A","Á":"A","Â":"A","Ã":"A","Ä":"A","Å":"A","Æ":"AE","Ç":"C","È":"E","É":"E","Ê":"E","Ë":"E","Ì":"I","Í":"I","Î":"I","Ï":"I","Ð":"D","Ñ":"N","Ò":"O","Ó":"O","Ô":"O","Õ":"O","Ö":"O","Ø":"O","Ù":"U","Ú":"U","Û":"U","Ü":"U","Ý":"Y","Þ":"TH","ß":"ss","à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","æ":"ae","ç":"c","è":"e","é":"e","ê":"e","ë":"e","ì":"i","í":"i","î":"i","ï":"i","ð":"d","ñ":"n","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","ù":"u","ú":"u","û":"u","ü":"u","ý":"y","þ":"th","ÿ":"y","Ā":"A","ā":"a","Ă":"A","ă":"a","Ą":"A","ą":"a","Ć":"C","ć":"c","Č":"C","č":"c","Ď":"D","ď":"d","Đ":"DJ","đ":"dj","Ē":"E","ē":"e","Ė":"E","ė":"e","Ę":"e","ę":"e","Ě":"E","ě":"e","Ğ":"G","ğ":"g","Ģ":"G","ģ":"g","Ĩ":"I","ĩ":"i","Ī":"i","ī":"i","Į":"I","į":"i","İ":"I","ı":"i","Ķ":"k","ķ":"k","Ļ":"L","ļ":"l","Ľ":"L","ľ":"l","Ł":"L","ł":"l","Ń":"N","ń":"n","Ņ":"N","ņ":"n","Ň":"N","ň":"n","Ő":"O","ő":"o","Œ":"OE","œ":"oe","Ŕ":"R","ŕ":"r","Ř":"R","ř":"r","Ś":"S","ś":"s","Ş":"S","ş":"s","Š":"S","š":"s","Ţ":"T","ţ":"t","Ť":"T","ť":"t","Ũ":"U","ũ":"u","Ū":"u","ū":"u","Ů":"U","ů":"u","Ű":"U","ű":"u","Ų":"U","ų":"u","Ź":"Z","ź":"z","Ż":"Z","ż":"z","Ž":"Z","ž":"z","ƒ":"f","Ơ":"O","ơ":"o","Ư":"U","ư":"u","ǈ":"LJ","ǉ":"lj","ǋ":"NJ","ǌ":"nj","Ș":"S","ș":"s","Ț":"T","ț":"t","˚":"o","Ά":"A","Έ":"E","Ή":"H","Ί":"I","Ό":"O","Ύ":"Y","Ώ":"W","ΐ":"i","Α":"A","Β":"B","Γ":"G","Δ":"D","Ε":"E","Ζ":"Z","Η":"H","Θ":"8","Ι":"I","Κ":"K","Λ":"L","Μ":"M","Ν":"N","Ξ":"3","Ο":"O","Π":"P","Ρ":"R","Σ":"S","Τ":"T","Υ":"Y","Φ":"F","Χ":"X","Ψ":"PS","Ω":"W","Ϊ":"I","Ϋ":"Y","ά":"a","έ":"e","ή":"h","ί":"i","ΰ":"y","α":"a","β":"b","γ":"g","δ":"d","ε":"e","ζ":"z","η":"h","θ":"8","ι":"i","κ":"k","λ":"l","μ":"m","ν":"n","ξ":"3","ο":"o","π":"p","ρ":"r","ς":"s","σ":"s","τ":"t","υ":"y","φ":"f","χ":"x","ψ":"ps","ω":"w","ϊ":"i","ϋ":"y","ό":"o","ύ":"y","ώ":"w","Ё":"Yo","Ђ":"DJ","Є":"Ye","І":"I","Ї":"Yi","Ј":"J","Љ":"LJ","Њ":"NJ","Ћ":"C","Џ":"DZ","А":"A","Б":"B","В":"V","Г":"G","Д":"D","Е":"E","Ж":"Zh","З":"Z","И":"I","Й":"J","К":"K","Л":"L","М":"M","Н":"N","О":"O","П":"P","Р":"R","С":"S","Т":"T","У":"U","Ф":"F","Х":"H","Ц":"C","Ч":"Ch","Ш":"Sh","Щ":"Sh","Ъ":"U","Ы":"Y","Ь":"","Э":"E","Ю":"Yu","Я":"Ya","а":"a","б":"b","в":"v","г":"g","д":"d","е":"e","ж":"zh","з":"z","и":"i","й":"j","к":"k","л":"l","м":"m","н":"n","о":"o","п":"p","р":"r","с":"s","т":"t","у":"u","ф":"f","х":"h","ц":"c","ч":"ch","ш":"sh","щ":"sh","ъ":"u","ы":"y","ь":"","э":"e","ю":"yu","я":"ya","ё":"yo","ђ":"dj","є":"ye","і":"i","ї":"yi","ј":"j","љ":"lj","њ":"nj","ћ":"c","џ":"dz","Ґ":"G","ґ":"g","฿":"baht","ა":"a","ბ":"b","გ":"g","დ":"d","ე":"e","ვ":"v","ზ":"z","თ":"t","ი":"i","კ":"k","ლ":"l","მ":"m","ნ":"n","ო":"o","პ":"p","ჟ":"zh","რ":"r","ს":"s","ტ":"t","უ":"u","ფ":"f","ქ":"k","ღ":"gh","ყ":"q","შ":"sh","ჩ":"ch","ც":"ts","ძ":"dz","წ":"ts","ჭ":"ch","ხ":"kh","ჯ":"j","ჰ":"h","ẞ":"SS","Ạ":"A","ạ":"a","Ả":"A","ả":"a","Ấ":"A","ấ":"a","Ầ":"A","ầ":"a","Ẩ":"A","ẩ":"a","Ẫ":"A","ẫ":"a","Ậ":"A","ậ":"a","Ắ":"A","ắ":"a","Ằ":"A","ằ":"a","Ẳ":"A","ẳ":"a","Ẵ":"A","ẵ":"a","Ặ":"A","ặ":"a","Ẹ":"E","ẹ":"e","Ẻ":"E","ẻ":"e","Ẽ":"E","ẽ":"e","Ế":"E","ế":"e","Ề":"E","ề":"e","Ể":"E","ể":"e","Ễ":"E","ễ":"e","Ệ":"E","ệ":"e","Ỉ":"I","ỉ":"i","Ị":"I","ị":"i","Ọ":"O","ọ":"o","Ỏ":"O","ỏ":"o","Ố":"O","ố":"o","Ồ":"O","ồ":"o","Ổ":"O","ổ":"o","Ỗ":"O","ỗ":"o","Ộ":"O","ộ":"o","Ớ":"O","ớ":"o","Ờ":"O","ờ":"o","Ở":"O","ở":"o","Ỡ":"O","ỡ":"o","Ợ":"O","ợ":"o","Ụ":"U","ụ":"u","Ủ":"U","ủ":"u","Ứ":"U","ứ":"u","Ừ":"U","ừ":"u","Ử":"U","ử":"u","Ữ":"U","ữ":"u","Ự":"U","ự":"u","Ỳ":"Y","ỳ":"y","Ỵ":"Y","ỵ":"y","Ỷ":"Y","ỷ":"y","Ỹ":"Y","ỹ":"y","‘":"\'","’":"\'","“":"\\"","”":"\\"","†":"+","•":"*","…":"...","₠":"ecu","₢":"cruzeiro","₣":"french franc","₤":"lira","₥":"mill","₦":"naira","₧":"peseta","₨":"rupee","₩":"won","₪":"new shequel","₫":"dong","€":"euro","₭":"kip","₮":"tugrik","₯":"drachma","₰":"penny","₱":"peso","₲":"guarani","₳":"austral","₴":"hryvnia","₵":"cedi","₹":"indian rupee","₽":"russian ruble","₿":"bitcoin","℠":"sm","™":"tm","∂":"d","∆":"delta","∑":"sum","∞":"infinity","♥":"love","元":"yuan","円":"yen","﷼":"rial"}');function t(t,r){if("string"!==typeof t)throw new Error("slugify: string argument expected");r="string"===typeof r?{replacement:r}:r||{};var n=t.split("").reduce(function(t,n){return t+(e[n]||n).replace(r.remove||/[^\w\s$*_+~.()'"!\-:@]/g,"")},"").trim().replace(/[-\s]+/g,r.replacement||"-");return r.lower?n.toLowerCase():n}return t.extend=function(t){for(var r in t)e[r]=t[r]},t})}}]);
//# sourceMappingURL=chunk-081503ca.b57b4621.js.map