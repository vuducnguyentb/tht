(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-3f07cb34","chunk-29a4b292"],{"34b7":function(t,e,n){"use strict";n.d(e,"d",function(){return i}),n.d(e,"c",function(){return o}),n.d(e,"a",function(){return s}),n.d(e,"e",function(){return u}),n.d(e,"b",function(){return c});var r=n("b775"),a="ajax/";function i(t){return Object(r["a"])({url:a+"settings/paginate",method:"get",params:t})}function o(t){return Object(r["a"])({url:a+"settings/"+t,method:"get"})}function s(t){return Object(r["a"])({url:a+"settings",method:"post",data:t})}function u(t,e){return Object(r["a"])({url:a+"settings/"+t,method:"patch",data:e})}function c(t){return Object(r["a"])({url:a+"settings/"+t,method:"delete"})}},"7f72":function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("main",{attrs:{id:"main-container"}},[n("div",{staticClass:"content content-full"},[n("div",{staticClass:"block block-fx-pop"},[n("div",{staticClass:"block-content block-content-full d-flex justify-content-between border-bottom"},[n("div",[n("nav",{attrs:{"aria-label":"breadcrumb"}},[n("ol",{staticClass:"breadcrumb"},[t._m(0),n("li",{staticClass:"breadcrumb-item"},[n("router-link",{attrs:{to:"/settings"}},[t._v("Cấu hình")])],1),t.isEdit?n("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v("Sửa cấu hình / "+t._s(t.currentForm.name))]):n("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[t._v("Tạo cấu hình")])])])]),n("div",[n("a",{staticClass:"btn btn-sm btn-info",attrs:{href:"javascript:void(0)"},on:{click:function(e){return e.preventDefault(),t.submitForm(e)}}},[t._v("Lưu lại")])])]),n("div",{staticClass:"block-content"},[n("form",{attrs:{method:"POST",onsubmit:"return false;"}},[n("div",{staticClass:"form-group"},[n("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:2",expression:"'required|min:2'"},{name:"model",rawName:"v-model",value:t.currentForm.name,expression:"currentForm.name"}],staticClass:"form-control py-4",attrs:{type:"text",id:"setting-name",name:"name",placeholder:"Tên"},domProps:{value:t.currentForm.name},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"name",e.target.value)}}}),n("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.first("name")))])]),n("div",{staticClass:"form-group"},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.key,expression:"currentForm.key"}],staticClass:"form-control py-4",attrs:{type:"text",id:"setting-key",name:"key",placeholder:"Mã nhận dạng"},domProps:{value:t.currentForm.key},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"key",e.target.value)}}})]),n("div",{staticClass:"form-group"},[n("textarea",{directives:[{name:"model",rawName:"v-model",value:t.currentForm.value,expression:"currentForm.value"}],staticClass:"form-control",attrs:{rows:"4",id:"setting-value",name:"value",placeholder:"Giá trị"},domProps:{value:t.currentForm.value},on:{input:function(e){e.target.composing||t.$set(t.currentForm,"value",e.target.value)}}})])])])])])])},a=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("li",{staticStyle:{"margin-top":"-4px","margin-right":"5px"}},[n("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[n("i",{staticClass:"fa fa-plus"})])])}],i=(n("8e6e"),n("ac6a"),n("456d"),n("a481"),n("bd86")),o=(n("7f7f"),n("34b7")),s=n("2f62"),u=n("2b0e"),c=n("7bb1");function l(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter(function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable})),n.push.apply(n,r)}return n}function m(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?l(n,!0).forEach(function(e){Object(i["a"])(t,e,n[e])}):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):l(n).forEach(function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))})}return t}var d=n("b747");u["a"].use(c["b"],{useConstraintAttrs:!1});var f={id:null,key:"",name:"",value:""},p={vn:{custom:{name:{required:"Vui lòng nhập Tên",min:"Tên ít nhất 2 kí tự",max:"Tên quá dài"}}}};c["a"].localize(p);var h=new c["a"]({name:"required|min"});h.localize("vn");var g={name:"Detail",props:{isEdit:{type:Boolean,default:!1}},components:{},data:function(){return{currentForm:Object.assign({},f),valid:!0,loading:!1,nameRules:[function(t){return t.length>0||"Tiêu đề không được để trống"}],keyRules:[function(t){return t.length>0||"Url không được để trống"},function(t){return/^[a-z0-9](-?[a-z0-9])*$/.test(t)||"Url không chứa khoảng trắng"}],key:"",isAutoKey:!0}},computed:{},watch:{"currentForm.name":function(){this.isAutoKey&&(this.key=d(_.lowerCase(this.currentForm.name)))}},created:function(){if(this.isEdit){var t=this.$route.params&&this.$route.params.setting;this.getData(t)}else this.currentForm=Object.assign({},f)},methods:m({},Object(s["d"])("app",["setSnackbar","setMessage"]),{getData:function(t){var e=this;Object(o["c"])(t).then(function(t){e.currentForm=t}).catch(function(t){console.log(t)})},submitFormRequest:function(t){var e=this;return new Promise(function(n,r){if(e.isEdit){var a=e.$route.params&&e.$route.params.setting;Object(o["e"])(a,t).then(function(t){n(t)}).catch(function(t){console.log(t),r(t)})}else Object(o["a"])(t).then(function(t){n(t)}).catch(function(t){console.log(t),r(t)})})},submitForm:function(){var t=this;this.currentForm.key=this.key,this.$validator.validateAll().then(function(e){e&&(t.loading=!0,t.submitFormRequest(t.currentForm).then(function(e){t.loading=!1,Dashmix.helpers("notify",{type:"success",icon:"fa fa-success mr-1",message:"Lưu cấu hình thành công."}),t.isEdit||t.$router.replace("/settings/edit/"+e.id)},function(){t.loading=!1,Dashmix.helpers("notify",{type:"danger",icon:"fa fa-times mr-1",message:"Không lưu được. Vui lòng lưu lại cấu hình bằng công cụ khác. Reload và thử lại."})}))})}})},b=g,v=(n("a097"),n("2877")),y=Object(v["a"])(b,r,a,!1,null,"d194786a",null);e["default"]=y.exports},a097:function(t,e,n){"use strict";var r=n("d5a9"),a=n.n(r);a.a},b747:function(t,e,n){(function(e,n,r){t.exports=r(),t.exports["default"]=r()})(0,0,function(){var t=JSON.parse('{"$":"dollar","%":"percent","&":"and","<":"less",">":"greater","|":"or","¢":"cent","£":"pound","¤":"currency","¥":"yen","©":"(c)","ª":"a","®":"(r)","º":"o","À":"A","Á":"A","Â":"A","Ã":"A","Ä":"A","Å":"A","Æ":"AE","Ç":"C","È":"E","É":"E","Ê":"E","Ë":"E","Ì":"I","Í":"I","Î":"I","Ï":"I","Ð":"D","Ñ":"N","Ò":"O","Ó":"O","Ô":"O","Õ":"O","Ö":"O","Ø":"O","Ù":"U","Ú":"U","Û":"U","Ü":"U","Ý":"Y","Þ":"TH","ß":"ss","à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","æ":"ae","ç":"c","è":"e","é":"e","ê":"e","ë":"e","ì":"i","í":"i","î":"i","ï":"i","ð":"d","ñ":"n","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","ù":"u","ú":"u","û":"u","ü":"u","ý":"y","þ":"th","ÿ":"y","Ā":"A","ā":"a","Ă":"A","ă":"a","Ą":"A","ą":"a","Ć":"C","ć":"c","Č":"C","č":"c","Ď":"D","ď":"d","Đ":"DJ","đ":"dj","Ē":"E","ē":"e","Ė":"E","ė":"e","Ę":"e","ę":"e","Ě":"E","ě":"e","Ğ":"G","ğ":"g","Ģ":"G","ģ":"g","Ĩ":"I","ĩ":"i","Ī":"i","ī":"i","Į":"I","į":"i","İ":"I","ı":"i","Ķ":"k","ķ":"k","Ļ":"L","ļ":"l","Ľ":"L","ľ":"l","Ł":"L","ł":"l","Ń":"N","ń":"n","Ņ":"N","ņ":"n","Ň":"N","ň":"n","Ő":"O","ő":"o","Œ":"OE","œ":"oe","Ŕ":"R","ŕ":"r","Ř":"R","ř":"r","Ś":"S","ś":"s","Ş":"S","ş":"s","Š":"S","š":"s","Ţ":"T","ţ":"t","Ť":"T","ť":"t","Ũ":"U","ũ":"u","Ū":"u","ū":"u","Ů":"U","ů":"u","Ű":"U","ű":"u","Ų":"U","ų":"u","Ź":"Z","ź":"z","Ż":"Z","ż":"z","Ž":"Z","ž":"z","ƒ":"f","Ơ":"O","ơ":"o","Ư":"U","ư":"u","ǈ":"LJ","ǉ":"lj","ǋ":"NJ","ǌ":"nj","Ș":"S","ș":"s","Ț":"T","ț":"t","˚":"o","Ά":"A","Έ":"E","Ή":"H","Ί":"I","Ό":"O","Ύ":"Y","Ώ":"W","ΐ":"i","Α":"A","Β":"B","Γ":"G","Δ":"D","Ε":"E","Ζ":"Z","Η":"H","Θ":"8","Ι":"I","Κ":"K","Λ":"L","Μ":"M","Ν":"N","Ξ":"3","Ο":"O","Π":"P","Ρ":"R","Σ":"S","Τ":"T","Υ":"Y","Φ":"F","Χ":"X","Ψ":"PS","Ω":"W","Ϊ":"I","Ϋ":"Y","ά":"a","έ":"e","ή":"h","ί":"i","ΰ":"y","α":"a","β":"b","γ":"g","δ":"d","ε":"e","ζ":"z","η":"h","θ":"8","ι":"i","κ":"k","λ":"l","μ":"m","ν":"n","ξ":"3","ο":"o","π":"p","ρ":"r","ς":"s","σ":"s","τ":"t","υ":"y","φ":"f","χ":"x","ψ":"ps","ω":"w","ϊ":"i","ϋ":"y","ό":"o","ύ":"y","ώ":"w","Ё":"Yo","Ђ":"DJ","Є":"Ye","І":"I","Ї":"Yi","Ј":"J","Љ":"LJ","Њ":"NJ","Ћ":"C","Џ":"DZ","А":"A","Б":"B","В":"V","Г":"G","Д":"D","Е":"E","Ж":"Zh","З":"Z","И":"I","Й":"J","К":"K","Л":"L","М":"M","Н":"N","О":"O","П":"P","Р":"R","С":"S","Т":"T","У":"U","Ф":"F","Х":"H","Ц":"C","Ч":"Ch","Ш":"Sh","Щ":"Sh","Ъ":"U","Ы":"Y","Ь":"","Э":"E","Ю":"Yu","Я":"Ya","а":"a","б":"b","в":"v","г":"g","д":"d","е":"e","ж":"zh","з":"z","и":"i","й":"j","к":"k","л":"l","м":"m","н":"n","о":"o","п":"p","р":"r","с":"s","т":"t","у":"u","ф":"f","х":"h","ц":"c","ч":"ch","ш":"sh","щ":"sh","ъ":"u","ы":"y","ь":"","э":"e","ю":"yu","я":"ya","ё":"yo","ђ":"dj","є":"ye","і":"i","ї":"yi","ј":"j","љ":"lj","њ":"nj","ћ":"c","џ":"dz","Ґ":"G","ґ":"g","฿":"baht","ა":"a","ბ":"b","გ":"g","დ":"d","ე":"e","ვ":"v","ზ":"z","თ":"t","ი":"i","კ":"k","ლ":"l","მ":"m","ნ":"n","ო":"o","პ":"p","ჟ":"zh","რ":"r","ს":"s","ტ":"t","უ":"u","ფ":"f","ქ":"k","ღ":"gh","ყ":"q","შ":"sh","ჩ":"ch","ც":"ts","ძ":"dz","წ":"ts","ჭ":"ch","ხ":"kh","ჯ":"j","ჰ":"h","ẞ":"SS","Ạ":"A","ạ":"a","Ả":"A","ả":"a","Ấ":"A","ấ":"a","Ầ":"A","ầ":"a","Ẩ":"A","ẩ":"a","Ẫ":"A","ẫ":"a","Ậ":"A","ậ":"a","Ắ":"A","ắ":"a","Ằ":"A","ằ":"a","Ẳ":"A","ẳ":"a","Ẵ":"A","ẵ":"a","Ặ":"A","ặ":"a","Ẹ":"E","ẹ":"e","Ẻ":"E","ẻ":"e","Ẽ":"E","ẽ":"e","Ế":"E","ế":"e","Ề":"E","ề":"e","Ể":"E","ể":"e","Ễ":"E","ễ":"e","Ệ":"E","ệ":"e","Ỉ":"I","ỉ":"i","Ị":"I","ị":"i","Ọ":"O","ọ":"o","Ỏ":"O","ỏ":"o","Ố":"O","ố":"o","Ồ":"O","ồ":"o","Ổ":"O","ổ":"o","Ỗ":"O","ỗ":"o","Ộ":"O","ộ":"o","Ớ":"O","ớ":"o","Ờ":"O","ờ":"o","Ở":"O","ở":"o","Ỡ":"O","ỡ":"o","Ợ":"O","ợ":"o","Ụ":"U","ụ":"u","Ủ":"U","ủ":"u","Ứ":"U","ứ":"u","Ừ":"U","ừ":"u","Ử":"U","ử":"u","Ữ":"U","ữ":"u","Ự":"U","ự":"u","Ỳ":"Y","ỳ":"y","Ỵ":"Y","ỵ":"y","Ỷ":"Y","ỷ":"y","Ỹ":"Y","ỹ":"y","‘":"\'","’":"\'","“":"\\"","”":"\\"","†":"+","•":"*","…":"...","₠":"ecu","₢":"cruzeiro","₣":"french franc","₤":"lira","₥":"mill","₦":"naira","₧":"peseta","₨":"rupee","₩":"won","₪":"new shequel","₫":"dong","€":"euro","₭":"kip","₮":"tugrik","₯":"drachma","₰":"penny","₱":"peso","₲":"guarani","₳":"austral","₴":"hryvnia","₵":"cedi","₹":"indian rupee","₽":"russian ruble","₿":"bitcoin","℠":"sm","™":"tm","∂":"d","∆":"delta","∑":"sum","∞":"infinity","♥":"love","元":"yuan","円":"yen","﷼":"rial"}');function e(e,n){if("string"!==typeof e)throw new Error("slugify: string argument expected");n="string"===typeof n?{replacement:n}:n||{};var r=e.split("").reduce(function(e,r){return e+(t[r]||r).replace(n.remove||/[^\w\s$*_+~.()'"!\-:@]/g,"")},"").trim().replace(/[-\s]+/g,n.replacement||"-");return n.lower?r.toLowerCase():r}return e.extend=function(e){for(var n in e)t[n]=e[n]},e})},d5a9:function(t,e,n){},e3b6:function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("detail",{attrs:{"is-edit":!1}})},a=[],i=n("7f72"),o={name:"PostsCreate",components:{Detail:i["default"]}},s=o,u=n("2877"),c=Object(u["a"])(s,r,a,!1,null,null,null);e["default"]=c.exports}}]);
//# sourceMappingURL=chunk-3f07cb34.42cf035d.js.map