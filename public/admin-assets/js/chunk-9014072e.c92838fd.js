(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-9014072e"],{"66da":function(e,t,a){"use strict";a.d(t,"c",function(){return s}),a.d(t,"b",function(){return i}),a.d(t,"a",function(){return o}),a.d(t,"d",function(){return c});var r=a("b775"),n="ajax/";function s(e){return Object(r["a"])({url:n+"categories",method:"get",params:e})}function i(e){return Object(r["a"])({url:n+"categories/"+e,method:"get"})}function o(e){return Object(r["a"])({url:n+"categories",method:"post",data:e})}function c(e,t){return Object(r["a"])({url:n+"categories/"+e,method:"patch",data:t})}},"80cc":function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("main",{attrs:{id:"main-container"}},[a("div",{staticClass:"content"},[a("form",{ref:"currentxForm"},[a("div",{staticClass:"block block-rounded block-bordered"},[a("div",{staticClass:"block-header block-header-default"},[a("nav",{attrs:{"aria-label":"breadcrumb"}},[a("ol",{staticClass:"breadcrumb"},[e._m(0),a("li",{staticClass:"breadcrumb-item"},[a("router-link",{attrs:{to:"/categories"}},[e._v(e._s(e.$t("Post's Category")))])],1),e.isEdit?a("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[e._v(e._s(e.$t("Edit Post's Category"))+" / "+e._s(e.currentForm.name))]):a("li",{staticClass:"breadcrumb-item active",attrs:{"aria-current":"page"}},[e._v(e._s(e.$t("Create Post's Category")))])])])]),a("div",{staticClass:"block-content"},[a("div",{staticClass:"row justify-content-center py-sm-3 py-md-5"},[a("div",{staticClass:"col-sm-10 col-md-8"},[a("div",{staticClass:"form-group"},[a("label",[e._v(e._s(e.$t("Category's name")))]),a("input",{directives:[{name:"validate",rawName:"v-validate",value:"required|min:6",expression:"'required|min:6'"},{name:"model",rawName:"v-model",value:e.currentForm.name,expression:"currentForm.name"}],staticClass:"form-control form-control-alt",attrs:{type:"text",name:"name"},domProps:{value:e.currentForm.name},on:{input:function(t){t.target.composing||e.$set(e.currentForm,"name",t.target.value)}}}),a("span",{staticClass:"text-danger"},[e._v(e._s(e.errors.first("name")))])]),a("div",{staticClass:"form-group"},[a("label",[e._v(e._s(e.$t("Post's Category Slug")))]),a("input",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"},{name:"model",rawName:"v-model",value:e.slug,expression:"slug"}],staticClass:"form-control form-control-alt",attrs:{type:"text",name:"slug"},domProps:{value:e.slug},on:{input:function(t){t.target.composing||(e.slug=t.target.value)}}})])])])]),a("div",{staticClass:"block-content block-content-full block-content-sm bg-body-light text-right"},[a("button",{staticClass:"btn btn-sm btn-success",attrs:{type:"submit"},on:{click:function(t){return t.preventDefault(),e.submitForm(t)}}},[a("i",{staticClass:"fa fa-check"}),e._v(" "+e._s(e.$t("Save"))+"\n                    ")])])])])])])},n=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("li",{staticStyle:{"margin-top":"-4px","margin-right":"5px"}},[a("button",{staticClass:"btn btn-sm btn-light",attrs:{type:"button"}},[a("i",{staticClass:"fa fa-plus"})])])}],s=(a("8e6e"),a("ac6a"),a("456d"),a("a481"),a("7f7f"),a("bd86")),i=a("66da"),o=a("2b0e"),c=a("7bb1"),u=a("2ef0"),l=a.n(u),m=a("2f62");function d(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable})),a.push.apply(a,r)}return a}function f(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?d(a,!0).forEach(function(t){Object(s["a"])(e,t,a[t])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):d(a).forEach(function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))})}return e}var g=a("b747");o["a"].use(c["b"],{useConstraintAttrs:!1});var h={name:"",slug:"",locale:"vi"},p={vi:{custom:{name:{required:"Vui lòng nhập Tên chuyên mục",min:"Chủ đề ít nhất 6 kí tự",max:"Chủ đề quá dài"}}},en:{custom:{name:{required:"Please entrt category's name",min:"Category's name at least 6 characters",max:"Caqtegory's name is too long"}}}};c["a"].localize(p);var b=new c["a"]({name:"required|min"});b.localize("vi");var v={name:"Detail",props:{isEdit:{type:Boolean,default:!1}},data:function(){return{currentForm:Object.assign({},h),valid:!0,loading:!1,snackbar:!1,txtError:"",nameRules:[function(e){return e.length>0||"Tiêu đề không được để trống"}],slugRules:[function(e){return e.length>0||"Slug không được để trống"},function(e){return/^[a-z0-9](-?[a-z0-9])*$/.test(e)||"Slug không chứa khoảng trắng"}],slug:"",isAutoSlug:!0}},computed:f({},Object(m["e"])(["locale"]),{notifySuccess:function(){return"en"==this.locale?{type:"success",icon:"fa fa-success mr-1",message:"Save successfully"}:{type:"success",icon:"fa fa-success mr-1",message:"Lưu chuyên mục bài viết thành công."}},notifyUnSuccess:function(){return"en"==this.locale?{type:"danger",icon:"fa fa-times mr-1",message:"Failed to save"}:{type:"danger",icon:"fa fa-times mr-1",message:"Không lưu được"}}}),watch:{"currentForm.name":function(){this.isAutoSlug&&(this.slug=g(l.a.lowerCase(this.currentForm.name)))}},created:function(){if(this.isEdit){var e=this.$route.params&&this.$route.params.category;this.getData(e)}else this.currentForm=Object.assign({},h);"en"==this.locale&&this.$validator.localize("en")},methods:f({},Object(m["d"])("app",["setSnackbar","setMessage"]),{getData:function(e){var t=this;Object(i["b"])(e).then(function(e){t.currentForm=e}).catch(function(e){console.log(e)})},submitFormRequest:function(e){var t=this;return new Promise(function(a,r){if(t.isEdit){var n=t.$route.params&&t.$route.params.category;Object(i["d"])(n,e).then(function(e){a(e)}).catch(function(e){r(e)})}else Object(i["a"])(e).then(function(e){a(e)}).catch(function(e){r(e)})})},submitForm:function(){var e=this;this.currentForm.slug=this.slug,this.currentForm.locale=this.locale,this.$validator.validateAll().then(function(t){t&&(e.loading=!0,e.submitFormRequest(e.currentForm).then(function(t){e.loading=!1,Dashmix.helpers("notify",e.notifySuccess),e.isEdit||e.$router.replace("/categories/edit/"+t.id)},function(){e.loading=!1,Dashmix.helpers("notify",e.notifyUnSuccess)}))})},openFileManager:function(e){var t=this;window.setFileToElement=function(a,r){t.currentForm[e]=a,t.$store.dispatch("file/closeFileManager")},this.$store.dispatch("file/openFileManager")}})},y=v,O=a("2877"),C=Object(O["a"])(y,r,n,!1,null,"17684d00",null);t["default"]=C.exports},b747:function(e,t,a){(function(t,a,r){e.exports=r(),e.exports["default"]=r()})(0,0,function(){var e=JSON.parse('{"$":"dollar","%":"percent","&":"and","<":"less",">":"greater","|":"or","¢":"cent","£":"pound","¤":"currency","¥":"yen","©":"(c)","ª":"a","®":"(r)","º":"o","À":"A","Á":"A","Â":"A","Ã":"A","Ä":"A","Å":"A","Æ":"AE","Ç":"C","È":"E","É":"E","Ê":"E","Ë":"E","Ì":"I","Í":"I","Î":"I","Ï":"I","Ð":"D","Ñ":"N","Ò":"O","Ó":"O","Ô":"O","Õ":"O","Ö":"O","Ø":"O","Ù":"U","Ú":"U","Û":"U","Ü":"U","Ý":"Y","Þ":"TH","ß":"ss","à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","æ":"ae","ç":"c","è":"e","é":"e","ê":"e","ë":"e","ì":"i","í":"i","î":"i","ï":"i","ð":"d","ñ":"n","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","ù":"u","ú":"u","û":"u","ü":"u","ý":"y","þ":"th","ÿ":"y","Ā":"A","ā":"a","Ă":"A","ă":"a","Ą":"A","ą":"a","Ć":"C","ć":"c","Č":"C","č":"c","Ď":"D","ď":"d","Đ":"DJ","đ":"dj","Ē":"E","ē":"e","Ė":"E","ė":"e","Ę":"e","ę":"e","Ě":"E","ě":"e","Ğ":"G","ğ":"g","Ģ":"G","ģ":"g","Ĩ":"I","ĩ":"i","Ī":"i","ī":"i","Į":"I","į":"i","İ":"I","ı":"i","Ķ":"k","ķ":"k","Ļ":"L","ļ":"l","Ľ":"L","ľ":"l","Ł":"L","ł":"l","Ń":"N","ń":"n","Ņ":"N","ņ":"n","Ň":"N","ň":"n","Ő":"O","ő":"o","Œ":"OE","œ":"oe","Ŕ":"R","ŕ":"r","Ř":"R","ř":"r","Ś":"S","ś":"s","Ş":"S","ş":"s","Š":"S","š":"s","Ţ":"T","ţ":"t","Ť":"T","ť":"t","Ũ":"U","ũ":"u","Ū":"u","ū":"u","Ů":"U","ů":"u","Ű":"U","ű":"u","Ų":"U","ų":"u","Ź":"Z","ź":"z","Ż":"Z","ż":"z","Ž":"Z","ž":"z","ƒ":"f","Ơ":"O","ơ":"o","Ư":"U","ư":"u","ǈ":"LJ","ǉ":"lj","ǋ":"NJ","ǌ":"nj","Ș":"S","ș":"s","Ț":"T","ț":"t","˚":"o","Ά":"A","Έ":"E","Ή":"H","Ί":"I","Ό":"O","Ύ":"Y","Ώ":"W","ΐ":"i","Α":"A","Β":"B","Γ":"G","Δ":"D","Ε":"E","Ζ":"Z","Η":"H","Θ":"8","Ι":"I","Κ":"K","Λ":"L","Μ":"M","Ν":"N","Ξ":"3","Ο":"O","Π":"P","Ρ":"R","Σ":"S","Τ":"T","Υ":"Y","Φ":"F","Χ":"X","Ψ":"PS","Ω":"W","Ϊ":"I","Ϋ":"Y","ά":"a","έ":"e","ή":"h","ί":"i","ΰ":"y","α":"a","β":"b","γ":"g","δ":"d","ε":"e","ζ":"z","η":"h","θ":"8","ι":"i","κ":"k","λ":"l","μ":"m","ν":"n","ξ":"3","ο":"o","π":"p","ρ":"r","ς":"s","σ":"s","τ":"t","υ":"y","φ":"f","χ":"x","ψ":"ps","ω":"w","ϊ":"i","ϋ":"y","ό":"o","ύ":"y","ώ":"w","Ё":"Yo","Ђ":"DJ","Є":"Ye","І":"I","Ї":"Yi","Ј":"J","Љ":"LJ","Њ":"NJ","Ћ":"C","Џ":"DZ","А":"A","Б":"B","В":"V","Г":"G","Д":"D","Е":"E","Ж":"Zh","З":"Z","И":"I","Й":"J","К":"K","Л":"L","М":"M","Н":"N","О":"O","П":"P","Р":"R","С":"S","Т":"T","У":"U","Ф":"F","Х":"H","Ц":"C","Ч":"Ch","Ш":"Sh","Щ":"Sh","Ъ":"U","Ы":"Y","Ь":"","Э":"E","Ю":"Yu","Я":"Ya","а":"a","б":"b","в":"v","г":"g","д":"d","е":"e","ж":"zh","з":"z","и":"i","й":"j","к":"k","л":"l","м":"m","н":"n","о":"o","п":"p","р":"r","с":"s","т":"t","у":"u","ф":"f","х":"h","ц":"c","ч":"ch","ш":"sh","щ":"sh","ъ":"u","ы":"y","ь":"","э":"e","ю":"yu","я":"ya","ё":"yo","ђ":"dj","є":"ye","і":"i","ї":"yi","ј":"j","љ":"lj","њ":"nj","ћ":"c","џ":"dz","Ґ":"G","ґ":"g","฿":"baht","ა":"a","ბ":"b","გ":"g","დ":"d","ე":"e","ვ":"v","ზ":"z","თ":"t","ი":"i","კ":"k","ლ":"l","მ":"m","ნ":"n","ო":"o","პ":"p","ჟ":"zh","რ":"r","ს":"s","ტ":"t","უ":"u","ფ":"f","ქ":"k","ღ":"gh","ყ":"q","შ":"sh","ჩ":"ch","ც":"ts","ძ":"dz","წ":"ts","ჭ":"ch","ხ":"kh","ჯ":"j","ჰ":"h","ẞ":"SS","Ạ":"A","ạ":"a","Ả":"A","ả":"a","Ấ":"A","ấ":"a","Ầ":"A","ầ":"a","Ẩ":"A","ẩ":"a","Ẫ":"A","ẫ":"a","Ậ":"A","ậ":"a","Ắ":"A","ắ":"a","Ằ":"A","ằ":"a","Ẳ":"A","ẳ":"a","Ẵ":"A","ẵ":"a","Ặ":"A","ặ":"a","Ẹ":"E","ẹ":"e","Ẻ":"E","ẻ":"e","Ẽ":"E","ẽ":"e","Ế":"E","ế":"e","Ề":"E","ề":"e","Ể":"E","ể":"e","Ễ":"E","ễ":"e","Ệ":"E","ệ":"e","Ỉ":"I","ỉ":"i","Ị":"I","ị":"i","Ọ":"O","ọ":"o","Ỏ":"O","ỏ":"o","Ố":"O","ố":"o","Ồ":"O","ồ":"o","Ổ":"O","ổ":"o","Ỗ":"O","ỗ":"o","Ộ":"O","ộ":"o","Ớ":"O","ớ":"o","Ờ":"O","ờ":"o","Ở":"O","ở":"o","Ỡ":"O","ỡ":"o","Ợ":"O","ợ":"o","Ụ":"U","ụ":"u","Ủ":"U","ủ":"u","Ứ":"U","ứ":"u","Ừ":"U","ừ":"u","Ử":"U","ử":"u","Ữ":"U","ữ":"u","Ự":"U","ự":"u","Ỳ":"Y","ỳ":"y","Ỵ":"Y","ỵ":"y","Ỷ":"Y","ỷ":"y","Ỹ":"Y","ỹ":"y","‘":"\'","’":"\'","“":"\\"","”":"\\"","†":"+","•":"*","…":"...","₠":"ecu","₢":"cruzeiro","₣":"french franc","₤":"lira","₥":"mill","₦":"naira","₧":"peseta","₨":"rupee","₩":"won","₪":"new shequel","₫":"dong","€":"euro","₭":"kip","₮":"tugrik","₯":"drachma","₰":"penny","₱":"peso","₲":"guarani","₳":"austral","₴":"hryvnia","₵":"cedi","₹":"indian rupee","₽":"russian ruble","₿":"bitcoin","℠":"sm","™":"tm","∂":"d","∆":"delta","∑":"sum","∞":"infinity","♥":"love","元":"yuan","円":"yen","﷼":"rial"}');function t(t,a){if("string"!==typeof t)throw new Error("slugify: string argument expected");a="string"===typeof a?{replacement:a}:a||{};var r=t.split("").reduce(function(t,r){return t+(e[r]||r).replace(a.remove||/[^\w\s$*_+~.()'"!\-:@]/g,"")},"").trim().replace(/[-\s]+/g,a.replacement||"-");return a.lower?r.toLowerCase():r}return t.extend=function(t){for(var a in t)e[a]=t[a]},t})}}]);
//# sourceMappingURL=chunk-9014072e.c92838fd.js.map