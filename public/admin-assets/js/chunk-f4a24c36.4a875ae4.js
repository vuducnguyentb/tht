(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-f4a24c36","chunk-5b5ac7d5"],{"0289":function(t,e,r){"use strict";r.r(e);var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("detail",{attrs:{"is-edit":!0}})},a=[],o=r("8854"),i={name:"ProjectCategoríeEdit",components:{DetailCate:o["default"]}},s=i,c=r("2877"),u=Object(c["a"])(s,n,a,!1,null,null,null);e["default"]=u.exports},8854:function(t,e,r){"use strict";r.r(e);var n=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("main",{attrs:{id:"main-container"}},[r("div",{staticClass:"content"},[r("form",{ref:"currentxForm"},[r("div",{staticClass:"block block-rounded block-bordered"},[r("div",{staticClass:"block-header block-header-default"},[r("nav",{attrs:{"aria-label":"breadcrumb"}},[r("ol",{staticClass:"breadcrumb"},[t._m(0),r("li",{staticClass:"breadcrumb-item"},[r("router-link",{attrs:{to:"/producttypes"}},[t._v("Danh mục")])],1),t.isEdit?r("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v("Sửa Danh mục / "+t._s(t.currentForm.name))]):r("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v("Thêm Danh mục mới")])])])]),r("div",{staticClass:"block-content"},[r("form",{ref:"currentxForm"},[r("div",{staticClass:"row justify-content-center py-sm-3"},[r("div",{staticClass:"col-sm-10 col-md-8"},[r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"block-form8-username"}},[t._v("Tên danh mục")]),r("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:1",expression:"'required|min:1'"},{name:"model",rawName:"v-model",value:t.currentForm.name,expression:"currentForm.name"}],staticClass:"form-control form-control-alt",attrs:{type:"text",id:"block-form8-username",name:"name",placeholder:"Nhập tên"},domProps:{value:t.currentForm.name},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"name",e.target.value)}}}),r("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.first("name")))])]),r("div",{staticClass:"form-group"},[r("label",{attrs:{for:"block-form9-username"}},[t._v("Url")]),r("input",{directives:[{name:"model",rawName:"v-model",value:t.slug,expression:"slug"}],staticClass:"form-control form-control-alt",attrs:{type:"text",id:"block-form9-username",name:"block-form9-username",placeholder:"Nhập url"},domProps:{value:t.slug},on:{input:function(e){e.target.composing||(t.slug=e.target.value)}}})])])])])]),r("div",{staticClass:"block-content block-content-full block-content-sm bg-body-light text-right"},[r("button",{staticClass:"btn btn-sm btn-success",attrs:{type:"submit"},on:{click:function(e){return e.preventDefault(),t.submitForm(e)}}},[r("i",{staticClass:"fa fa-check"}),t._v(" Lưu lại\n            ")])])])])])])},a=[function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("li",{staticStyle:{"margin-top":"-4px","margin-right":"5px"}},[r("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[r("i",{staticClass:"fa fa-plus"})])])}],o=(r("7f7f"),r("f48b")),i=r("2b0e"),s=r("7bb1"),c=r("2ef0"),u=r.n(c),l=(r("2f62"),r("b747"));i["a"].use(s["b"],{useConstraintAttrs:!1});var m={id:null,name:"",slug:""},d={vn:{custom:{name:{required:"Vui lòng nhập Tên danh mục",min:"Tiêu đề ít nhất 1 kí tự"}}}};s["a"].localize(d);var f=new s["a"]({first_name:"min",second_name:"required"});f.localize("vn");var h={name:"DetailCate",props:{isEdit:{type:Boolean,default:!1},slug:{type:String,default:""}},data:function(){return{currentForm:Object.assign({},m),valid:!0,loading:!1,nameRules:[function(t){return t.length>0||"Tên không được để trống"}],slugRules:[function(t){return t.length>0||"Url không được để trống"},function(t){return/^[a-z0-9](-?[a-z0-9])*$/.test(t)||"Url không chứa khoảng trắng"}],panel:[!1],slug:"",isAutoSlug:!0}},computed:{},watch:{"currentForm.name":function(){this.isEdit||(this.slug=l(u.a.lowerCase(this.currentForm.name)))}},created:function(){if(this.isEdit){var t=this.$route.params&&this.$route.params.projectcategorie;this.isAutoSlug=!1,this.getData(t)}else this.currentForm=Object.assign({},m)},methods:{getData:function(t){var e=this;getApi(t).then(function(t){e.currentForm=t,e.slug=t.slug}).catch(function(t){console.log(t)})},submitFormRequest:function(t){var e=this;return new Promise(function(r,n){if(e.isEdit){var a=e.$route.params&&e.$route.params.projectcategorie;Object(o["e"])(a,t).then(function(t){r(t)}).catch(function(t){console.log(t),n(t)})}else Object(o["a"])(t).then(function(t){r(t)}).catch(function(t){console.log(t),n(t)})})},submitForm:function(){var t=this;this.$validator.validateAll().then(function(e){e&&(t.loading=!0,t.currentForm.slug=t.slug,t.submitFormRequest(t.currentForm).then(function(e){t.loading=!1,Dashmix.helpers("notify",{type:"success",icon:"fa fa-success mr-1",message:"Lưu thành công"}),t.$emit("saveSuccess")},function(){t.loading=!1,Dashmix.helpers("notify",{type:"danger",icon:"fa fa-times mr-1",message:"Xảy ra lỗi. Vui lòng thử lại."})}))})}}},g=h,p=r("2877"),b=Object(p["a"])(g,n,a,!1,null,null,null);e["default"]=b.exports},b747:function(t,e,r){(function(e,r,n){t.exports=n(),t.exports["default"]=n()})(0,0,function(){var t=JSON.parse('{"$":"dollar","%":"percent","&":"and","<":"less",">":"greater","|":"or","¢":"cent","£":"pound","¤":"currency","¥":"yen","©":"(c)","ª":"a","®":"(r)","º":"o","À":"A","Á":"A","Â":"A","Ã":"A","Ä":"A","Å":"A","Æ":"AE","Ç":"C","È":"E","É":"E","Ê":"E","Ë":"E","Ì":"I","Í":"I","Î":"I","Ï":"I","Ð":"D","Ñ":"N","Ò":"O","Ó":"O","Ô":"O","Õ":"O","Ö":"O","Ø":"O","Ù":"U","Ú":"U","Û":"U","Ü":"U","Ý":"Y","Þ":"TH","ß":"ss","à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","æ":"ae","ç":"c","è":"e","é":"e","ê":"e","ë":"e","ì":"i","í":"i","î":"i","ï":"i","ð":"d","ñ":"n","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","ù":"u","ú":"u","û":"u","ü":"u","ý":"y","þ":"th","ÿ":"y","Ā":"A","ā":"a","Ă":"A","ă":"a","Ą":"A","ą":"a","Ć":"C","ć":"c","Č":"C","č":"c","Ď":"D","ď":"d","Đ":"DJ","đ":"dj","Ē":"E","ē":"e","Ė":"E","ė":"e","Ę":"e","ę":"e","Ě":"E","ě":"e","Ğ":"G","ğ":"g","Ģ":"G","ģ":"g","Ĩ":"I","ĩ":"i","Ī":"i","ī":"i","Į":"I","į":"i","İ":"I","ı":"i","Ķ":"k","ķ":"k","Ļ":"L","ļ":"l","Ľ":"L","ľ":"l","Ł":"L","ł":"l","Ń":"N","ń":"n","Ņ":"N","ņ":"n","Ň":"N","ň":"n","Ő":"O","ő":"o","Œ":"OE","œ":"oe","Ŕ":"R","ŕ":"r","Ř":"R","ř":"r","Ś":"S","ś":"s","Ş":"S","ş":"s","Š":"S","š":"s","Ţ":"T","ţ":"t","Ť":"T","ť":"t","Ũ":"U","ũ":"u","Ū":"u","ū":"u","Ů":"U","ů":"u","Ű":"U","ű":"u","Ų":"U","ų":"u","Ź":"Z","ź":"z","Ż":"Z","ż":"z","Ž":"Z","ž":"z","ƒ":"f","Ơ":"O","ơ":"o","Ư":"U","ư":"u","ǈ":"LJ","ǉ":"lj","ǋ":"NJ","ǌ":"nj","Ș":"S","ș":"s","Ț":"T","ț":"t","˚":"o","Ά":"A","Έ":"E","Ή":"H","Ί":"I","Ό":"O","Ύ":"Y","Ώ":"W","ΐ":"i","Α":"A","Β":"B","Γ":"G","Δ":"D","Ε":"E","Ζ":"Z","Η":"H","Θ":"8","Ι":"I","Κ":"K","Λ":"L","Μ":"M","Ν":"N","Ξ":"3","Ο":"O","Π":"P","Ρ":"R","Σ":"S","Τ":"T","Υ":"Y","Φ":"F","Χ":"X","Ψ":"PS","Ω":"W","Ϊ":"I","Ϋ":"Y","ά":"a","έ":"e","ή":"h","ί":"i","ΰ":"y","α":"a","β":"b","γ":"g","δ":"d","ε":"e","ζ":"z","η":"h","θ":"8","ι":"i","κ":"k","λ":"l","μ":"m","ν":"n","ξ":"3","ο":"o","π":"p","ρ":"r","ς":"s","σ":"s","τ":"t","υ":"y","φ":"f","χ":"x","ψ":"ps","ω":"w","ϊ":"i","ϋ":"y","ό":"o","ύ":"y","ώ":"w","Ё":"Yo","Ђ":"DJ","Є":"Ye","І":"I","Ї":"Yi","Ј":"J","Љ":"LJ","Њ":"NJ","Ћ":"C","Џ":"DZ","А":"A","Б":"B","В":"V","Г":"G","Д":"D","Е":"E","Ж":"Zh","З":"Z","И":"I","Й":"J","К":"K","Л":"L","М":"M","Н":"N","О":"O","П":"P","Р":"R","С":"S","Т":"T","У":"U","Ф":"F","Х":"H","Ц":"C","Ч":"Ch","Ш":"Sh","Щ":"Sh","Ъ":"U","Ы":"Y","Ь":"","Э":"E","Ю":"Yu","Я":"Ya","а":"a","б":"b","в":"v","г":"g","д":"d","е":"e","ж":"zh","з":"z","и":"i","й":"j","к":"k","л":"l","м":"m","н":"n","о":"o","п":"p","р":"r","с":"s","т":"t","у":"u","ф":"f","х":"h","ц":"c","ч":"ch","ш":"sh","щ":"sh","ъ":"u","ы":"y","ь":"","э":"e","ю":"yu","я":"ya","ё":"yo","ђ":"dj","є":"ye","і":"i","ї":"yi","ј":"j","љ":"lj","њ":"nj","ћ":"c","џ":"dz","Ґ":"G","ґ":"g","฿":"baht","ა":"a","ბ":"b","გ":"g","დ":"d","ე":"e","ვ":"v","ზ":"z","თ":"t","ი":"i","კ":"k","ლ":"l","მ":"m","ნ":"n","ო":"o","პ":"p","ჟ":"zh","რ":"r","ს":"s","ტ":"t","უ":"u","ფ":"f","ქ":"k","ღ":"gh","ყ":"q","შ":"sh","ჩ":"ch","ც":"ts","ძ":"dz","წ":"ts","ჭ":"ch","ხ":"kh","ჯ":"j","ჰ":"h","ẞ":"SS","Ạ":"A","ạ":"a","Ả":"A","ả":"a","Ấ":"A","ấ":"a","Ầ":"A","ầ":"a","Ẩ":"A","ẩ":"a","Ẫ":"A","ẫ":"a","Ậ":"A","ậ":"a","Ắ":"A","ắ":"a","Ằ":"A","ằ":"a","Ẳ":"A","ẳ":"a","Ẵ":"A","ẵ":"a","Ặ":"A","ặ":"a","Ẹ":"E","ẹ":"e","Ẻ":"E","ẻ":"e","Ẽ":"E","ẽ":"e","Ế":"E","ế":"e","Ề":"E","ề":"e","Ể":"E","ể":"e","Ễ":"E","ễ":"e","Ệ":"E","ệ":"e","Ỉ":"I","ỉ":"i","Ị":"I","ị":"i","Ọ":"O","ọ":"o","Ỏ":"O","ỏ":"o","Ố":"O","ố":"o","Ồ":"O","ồ":"o","Ổ":"O","ổ":"o","Ỗ":"O","ỗ":"o","Ộ":"O","ộ":"o","Ớ":"O","ớ":"o","Ờ":"O","ờ":"o","Ở":"O","ở":"o","Ỡ":"O","ỡ":"o","Ợ":"O","ợ":"o","Ụ":"U","ụ":"u","Ủ":"U","ủ":"u","Ứ":"U","ứ":"u","Ừ":"U","ừ":"u","Ử":"U","ử":"u","Ữ":"U","ữ":"u","Ự":"U","ự":"u","Ỳ":"Y","ỳ":"y","Ỵ":"Y","ỵ":"y","Ỷ":"Y","ỷ":"y","Ỹ":"Y","ỹ":"y","‘":"\'","’":"\'","“":"\\"","”":"\\"","†":"+","•":"*","…":"...","₠":"ecu","₢":"cruzeiro","₣":"french franc","₤":"lira","₥":"mill","₦":"naira","₧":"peseta","₨":"rupee","₩":"won","₪":"new shequel","₫":"dong","€":"euro","₭":"kip","₮":"tugrik","₯":"drachma","₰":"penny","₱":"peso","₲":"guarani","₳":"austral","₴":"hryvnia","₵":"cedi","₹":"indian rupee","₽":"russian ruble","₿":"bitcoin","℠":"sm","™":"tm","∂":"d","∆":"delta","∑":"sum","∞":"infinity","♥":"love","元":"yuan","円":"yen","﷼":"rial"}');function e(e,r){if("string"!==typeof e)throw new Error("slugify: string argument expected");r="string"===typeof r?{replacement:r}:r||{};var n=e.split("").reduce(function(e,n){return e+(t[n]||n).replace(r.remove||/[^\w\s$*_+~.()'"!\-:@]/g,"")},"").trim().replace(/[-\s]+/g,r.replacement||"-");return r.lower?n.toLowerCase():n}return e.extend=function(e){for(var r in e)t[r]=e[r]},e})},f48b:function(t,e,r){"use strict";r.d(e,"d",function(){return o}),r.d(e,"c",function(){return i}),r.d(e,"a",function(){return s}),r.d(e,"e",function(){return c}),r.d(e,"b",function(){return u});var n=r("b775"),a="ajax/";function o(t){return Object(n["a"])({url:a+"projectcategories",method:"get",params:t})}function i(t){return Object(n["a"])({url:a+"projectcategories/"+t,method:"get"})}function s(t){return Object(n["a"])({url:a+"projectcategories",method:"post",data:t})}function c(t,e){return Object(n["a"])({url:a+"projectcategories/"+t,method:"patch",data:e})}function u(t){return Object(n["a"])({url:a+"projectcategories/"+t,method:"delete"})}}}]);
//# sourceMappingURL=chunk-f4a24c36.4a875ae4.js.map