(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-a0b7289c"],{"34b7":function(e,t,n){"use strict";n.d(t,"d",function(){return s}),n.d(t,"c",function(){return r}),n.d(t,"a",function(){return o}),n.d(t,"e",function(){return l}),n.d(t,"b",function(){return u});var i=n("b775"),a="ajax/";function s(e){return Object(i["a"])({url:a+"settings/paginate",method:"get",params:e})}function r(e){return Object(i["a"])({url:a+"settings/"+e,method:"get"})}function o(e){return Object(i["a"])({url:a+"settings",method:"post",data:e})}function l(e,t){return Object(i["a"])({url:a+"settings/"+e,method:"patch",data:t})}function u(e){return Object(i["a"])({url:a+"settings/"+e,method:"delete"})}},"5e21":function(e,t,n){"use strict";n.r(t);var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("main",{attrs:{id:"main-container"}},[n("div",{staticClass:"content"},[n("vue-table",{attrs:{id:"settings",path:e.initTableURL,i18n:e.i18n}})],1)])},a=[],s=(n("7f7f"),n("bd86")),r=n("2b0e"),o=n("34b7"),l=(n("2f62"),n("8832")),u=n.n(l),c=n("8f62"),d=n("2ef0"),f=n.n(d),g=n("b747");r["a"].filter("truncate",function(e,t){return e&&t&&e.length>t&&(e=e.substring(0,t-3)+"..."),e});var p={name:"SettingsList",components:{VueTable:c["a"],Paginate:u.a},data:function(){var e;return{originURL:"",initTableURL:"",loading:!1,headers:[{sortable:!1,text:"STT",value:"id"},{sortable:!1,text:"Key",value:"key"},{sortable:!1,text:"Tên",value:"name"},{sortable:!1,text:"Giá trị",value:"value"},{sortable:!1,text:"Ngày tạo",value:"created_at"},{sortable:!1,text:"Action",align:"right"}],items:[],list:null,total:0,listLoading:!0,pageCount:1,currentPage:1,filtersData:{},listQuery:{page_id:0,page_size:10,sorts:"-created_at"},keyRules:[function(e){return/^[a-z0-9](-?[a-z0-9])*$/.test(e)||"key không chứa khoảng trắng"}],editedIndex:-1,editedItem:{id:null,key:"",name:"",value:"",create_at:""},defaultItem:(e={id:null,key:"",name:""},Object(s["a"])(e,"name",""),Object(s["a"])(e,"create_at",""),e),dialog:!1,valid:!0,keyValue:""}},computed:{formTitle:function(){return-1===this.editedIndex?"Tạo mới":"Chỉnh sửa"},isEdit:function(){return-1!==this.editedIndex}},watch:{"editedItem.name":function(){this.isEdit||(this.keyValue=g(f.a.lowerCase(this.editedItem.name)))}},created:function(){var e=this;this.getList(),this.originURL=window.location.origin,this.initTableURL=this.originURL+this.$route.fullPath+"/initTable",console.log("origin Url:"+this.originURL),console.log("initTableURL:"+this.initTableURL),console.log("current route:"),console.log(this.$route),jQuery("#modal-id").on("hidden.bs.modal",function(t){setTimeout(function(){e.editedItem=Object.assign({},e.defaultItem),e.editedIndex=-1},300)})},methods:{i18n:function(e){return this.$i18n.translate(e)},getList:function(){var e=this;this.listLoading=!0,Object(o["d"])(this.listQuery).then(function(t){e.items=t.result,e.pageCount=t.meta.page_count,e.currentPage=t.meta.page_id+1,e.listLoading=!1})},handleSizeChange:function(e){this.listQuery.page_size=e,this.getList()},handleCurrentChange:function(e){this.listQuery.page_id=e-1,this.getList()},createItem:function(){this.editedItem=Object.assign({},this.defaultItem),this.editedIndex=-1,jQuery("#modal-add-settings").modal("show")},editItem:function(e){this.editedIndex=e.id,this.editedItem=Object.assign({},e),this.keyValue=e.key,jQuery("#modal-add-settings").modal("show")},deleteItem:function(e){var t=this,n=confirm("Bạn có thực sự muốn xóa cấu hình này?");1==n&&Object(o["b"])(e).then(function(e){Dashmix.helpers("notify",{type:"success",icon:"fa fa-success mr-1",message:"Xóa thành công."}),t.getList()},function(e){Dashmix.helpers("notify",{type:"danger",icon:"fa fa-times mr-1",message:"Không xóa được. Vui lòng thử lại."})})},submitFormRequest:function(e){var t=this;return new Promise(function(n,i){if(t.isEdit){var a=e.id;Object(o["e"])(a,e).then(function(e){n(e)}).catch(function(e){i(e)})}else Object(o["a"])(e).then(function(e){n(e)}).catch(function(e){i(e)})})},submitForm:function(){var e=this;this.loading=!0,this.editedItem.key=this.keyValue,this.submitFormRequest(this.editedItem).then(function(){e.loading=!1,Dashmix.helpers("notify",{type:"success",icon:"fa fa-success mr-1",message:"Lưu thành công"}),e.getList(),e.close()},function(){e.loading=!1,Dashmix.helpers("notify",{type:"danger",icon:"fa fa-times mr-1",message:"Xảy ra lỗi. Vui lòng thử lại."})})}}},h=p,v=(n("6b05"),n("2877")),b=Object(v["a"])(h,i,a,!1,null,"e11c77d2",null);t["default"]=b.exports},"6b05":function(e,t,n){"use strict";var i=n("8c42"),a=n.n(i);a.a},8832:function(e,t,n){!function(t,n){e.exports=n()}(0,function(){return function(e){function t(i){if(n[i])return n[i].exports;var a=n[i]={exports:{},id:i,loaded:!1};return e[i].call(a.exports,a,a.exports,t),a.loaded=!0,a.exports}var n={};return t.m=e,t.c=n,t.p="",t(0)}([function(e,t,n){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}var a=n(1),s=i(a);e.exports=s.default},function(e,t,n){n(2);var i=n(6)(n(7),n(8),"data-v-82963a40",null);e.exports=i.exports},function(e,t,n){var i=n(3);"string"==typeof i&&(i=[[e.id,i,""]]),n(5)(i,{}),i.locals&&(e.exports=i.locals)},function(e,t,n){t=e.exports=n(4)(),t.push([e.id,"a[data-v-82963a40]{cursor:pointer}",""])},function(e,t){e.exports=function(){var e=[];return e.toString=function(){for(var e=[],t=0;t<this.length;t++){var n=this[t];n[2]?e.push("@media "+n[2]+"{"+n[1]+"}"):e.push(n[1])}return e.join("")},e.i=function(t,n){"string"==typeof t&&(t=[[null,t,""]]);for(var i={},a=0;a<this.length;a++){var s=this[a][0];"number"==typeof s&&(i[s]=!0)}for(a=0;a<t.length;a++){var r=t[a];"number"==typeof r[0]&&i[r[0]]||(n&&!r[2]?r[2]=n:n&&(r[2]="("+r[2]+") and ("+n+")"),e.push(r))}},e}},function(e,t,n){function i(e,t){for(var n=0;n<e.length;n++){var i=e[n],a=d[i.id];if(a){a.refs++;for(var s=0;s<a.parts.length;s++)a.parts[s](i.parts[s]);for(;s<i.parts.length;s++)a.parts.push(l(i.parts[s],t))}else{var r=[];for(s=0;s<i.parts.length;s++)r.push(l(i.parts[s],t));d[i.id]={id:i.id,refs:1,parts:r}}}}function a(e){for(var t=[],n={},i=0;i<e.length;i++){var a=e[i],s=a[0],r=a[1],o=a[2],l=a[3],u={css:r,media:o,sourceMap:l};n[s]?n[s].parts.push(u):t.push(n[s]={id:s,parts:[u]})}return t}function s(e,t){var n=p(),i=b[b.length-1];if("top"===e.insertAt)i?i.nextSibling?n.insertBefore(t,i.nextSibling):n.appendChild(t):n.insertBefore(t,n.firstChild),b.push(t);else{if("bottom"!==e.insertAt)throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");n.appendChild(t)}}function r(e){e.parentNode.removeChild(e);var t=b.indexOf(e);t>=0&&b.splice(t,1)}function o(e){var t=document.createElement("style");return t.type="text/css",s(e,t),t}function l(e,t){var n,i,a;if(t.singleton){var s=v++;n=h||(h=o(t)),i=u.bind(null,n,s,!1),a=u.bind(null,n,s,!0)}else n=o(t),i=c.bind(null,n),a=function(){r(n)};return i(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;i(e=t)}else a()}}function u(e,t,n,i){var a=n?"":i.css;if(e.styleSheet)e.styleSheet.cssText=m(t,a);else{var s=document.createTextNode(a),r=e.childNodes;r[t]&&e.removeChild(r[t]),r.length?e.insertBefore(s,r[t]):e.appendChild(s)}}function c(e,t){var n=t.css,i=t.media,a=t.sourceMap;if(i&&e.setAttribute("media",i),a&&(n+="\n/*# sourceURL="+a.sources[0]+" */",n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(a))))+" */"),e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}var d={},f=function(e){var t;return function(){return"undefined"==typeof t&&(t=e.apply(this,arguments)),t}},g=f(function(){return/msie [6-9]\b/.test(window.navigator.userAgent.toLowerCase())}),p=f(function(){return document.head||document.getElementsByTagName("head")[0]}),h=null,v=0,b=[];e.exports=function(e,t){t=t||{},"undefined"==typeof t.singleton&&(t.singleton=g()),"undefined"==typeof t.insertAt&&(t.insertAt="bottom");var n=a(e);return i(n,t),function(e){for(var s=[],r=0;r<n.length;r++){var o=n[r],l=d[o.id];l.refs--,s.push(l)}if(e){var u=a(e);i(u,t)}for(r=0;r<s.length;r++){l=s[r];if(0===l.refs){for(var c=0;c<l.parts.length;c++)l.parts[c]();delete d[l.id]}}}};var m=function(){var e=[];return function(t,n){return e[t]=n,e.filter(Boolean).join("\n")}}()},function(e,t){e.exports=function(e,t,n,i){var a,s=e=e||{},r=typeof e.default;"object"!==r&&"function"!==r||(a=e,s=e.default);var o="function"==typeof s?s.options:s;if(t&&(o.render=t.render,o.staticRenderFns=t.staticRenderFns),n&&(o._scopeId=n),i){var l=o.computed||(o.computed={});Object.keys(i).forEach(function(e){var t=i[e];l[e]=function(){return t}})}return{esModule:a,exports:s,options:o}}},function(e,t){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default={props:{value:{type:Number},pageCount:{type:Number,required:!0},forcePage:{type:Number},clickHandler:{type:Function,default:function(){}},pageRange:{type:Number,default:3},marginPages:{type:Number,default:1},prevText:{type:String,default:"Prev"},nextText:{type:String,default:"Next"},breakViewText:{type:String,default:"…"},containerClass:{type:String},pageClass:{type:String},pageLinkClass:{type:String},prevClass:{type:String},prevLinkClass:{type:String},nextClass:{type:String},nextLinkClass:{type:String},breakViewClass:{type:String},breakViewLinkClass:{type:String},activeClass:{type:String,default:"active"},disabledClass:{type:String,default:"disabled"},noLiSurround:{type:Boolean,default:!1},firstLastButton:{type:Boolean,default:!1},firstButtonText:{type:String,default:"First"},lastButtonText:{type:String,default:"Last"},hidePrevNext:{type:Boolean,default:!1}},beforeUpdate:function(){void 0!==this.forcePage&&this.forcePage!==this.selected&&(this.selected=this.forcePage)},computed:{selected:{get:function(){return this.value||this.innerValue},set:function(e){this.innerValue=e}},pages:function(){var e=this,t={};if(this.pageCount<=this.pageRange)for(var n=0;n<this.pageCount;n++){var i={index:n,content:n+1,selected:n===this.selected-1};t[n]=i}else{for(var a=Math.floor(this.pageRange/2),s=function(n){var i={index:n,content:n+1,selected:n===e.selected-1};t[n]=i},r=function(e){var n={disabled:!0,breakView:!0};t[e]=n},o=0;o<this.marginPages;o++)s(o);var l=0;this.selected-a>0&&(l=this.selected-1-a);var u=l+this.pageRange-1;u>=this.pageCount&&(u=this.pageCount-1,l=u-this.pageRange+1);for(var c=l;c<=u&&c<=this.pageCount-1;c++)s(c);l>this.marginPages&&r(l-1),u+1<this.pageCount-this.marginPages&&r(u+1);for(var d=this.pageCount-1;d>=this.pageCount-this.marginPages;d--)s(d)}return t}},data:function(){return{innerValue:1}},methods:{handlePageSelected:function(e){this.selected!==e&&(this.innerValue=e,this.$emit("input",e),this.clickHandler(e))},prevPage:function(){this.selected<=1||this.handlePageSelected(this.selected-1)},nextPage:function(){this.selected>=this.pageCount||this.handlePageSelected(this.selected+1)},firstPageSelected:function(){return 1===this.selected},lastPageSelected:function(){return this.selected===this.pageCount||0===this.pageCount},selectFirstPage:function(){this.selected<=1||this.handlePageSelected(1)},selectLastPage:function(){this.selected>=this.pageCount||this.handlePageSelected(this.pageCount)}}}},function(e,t){e.exports={render:function(){var e=this,t=e.$createElement,n=e._self._c||t;return e.noLiSurround?n("div",{class:e.containerClass},[e.firstLastButton?n("a",{class:[e.pageLinkClass,e.firstPageSelected()?e.disabledClass:""],attrs:{tabindex:"0"},domProps:{innerHTML:e._s(e.firstButtonText)},on:{click:function(t){e.selectFirstPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.selectFirstPage():null}}}):e._e(),e._v(" "),e.firstPageSelected()&&e.hidePrevNext?e._e():n("a",{class:[e.prevLinkClass,e.firstPageSelected()?e.disabledClass:""],attrs:{tabindex:"0"},domProps:{innerHTML:e._s(e.prevText)},on:{click:function(t){e.prevPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.prevPage():null}}}),e._v(" "),e._l(e.pages,function(t){return[t.breakView?n("a",{class:[e.pageLinkClass,e.breakViewLinkClass,t.disabled?e.disabledClass:""],attrs:{tabindex:"0"}},[e._t("breakViewContent",[e._v(e._s(e.breakViewText))])],2):t.disabled?n("a",{class:[e.pageLinkClass,t.selected?e.activeClass:"",e.disabledClass],attrs:{tabindex:"0"}},[e._v(e._s(t.content))]):n("a",{class:[e.pageLinkClass,t.selected?e.activeClass:""],attrs:{tabindex:"0"},on:{click:function(n){e.handlePageSelected(t.index+1)},keyup:function(n){return"button"in n||!e._k(n.keyCode,"enter",13)?void e.handlePageSelected(t.index+1):null}}},[e._v(e._s(t.content))])]}),e._v(" "),e.lastPageSelected()&&e.hidePrevNext?e._e():n("a",{class:[e.nextLinkClass,e.lastPageSelected()?e.disabledClass:""],attrs:{tabindex:"0"},domProps:{innerHTML:e._s(e.nextText)},on:{click:function(t){e.nextPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.nextPage():null}}}),e._v(" "),e.firstLastButton?n("a",{class:[e.pageLinkClass,e.lastPageSelected()?e.disabledClass:""],attrs:{tabindex:"0"},domProps:{innerHTML:e._s(e.lastButtonText)},on:{click:function(t){e.selectLastPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.selectLastPage():null}}}):e._e()],2):n("ul",{class:e.containerClass},[e.firstLastButton?n("li",{class:[e.pageClass,e.firstPageSelected()?e.disabledClass:""]},[n("a",{class:e.pageLinkClass,attrs:{tabindex:e.firstPageSelected()?-1:0},domProps:{innerHTML:e._s(e.firstButtonText)},on:{click:function(t){e.selectFirstPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.selectFirstPage():null}}})]):e._e(),e._v(" "),e.firstPageSelected()&&e.hidePrevNext?e._e():n("li",{class:[e.prevClass,e.firstPageSelected()?e.disabledClass:""]},[n("a",{class:e.prevLinkClass,attrs:{tabindex:e.firstPageSelected()?-1:0},domProps:{innerHTML:e._s(e.prevText)},on:{click:function(t){e.prevPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.prevPage():null}}})]),e._v(" "),e._l(e.pages,function(t){return n("li",{class:[e.pageClass,t.selected?e.activeClass:"",t.disabled?e.disabledClass:"",t.breakView?e.breakViewClass:""]},[t.breakView?n("a",{class:[e.pageLinkClass,e.breakViewLinkClass],attrs:{tabindex:"0"}},[e._t("breakViewContent",[e._v(e._s(e.breakViewText))])],2):t.disabled?n("a",{class:e.pageLinkClass,attrs:{tabindex:"0"}},[e._v(e._s(t.content))]):n("a",{class:e.pageLinkClass,attrs:{tabindex:"0"},on:{click:function(n){e.handlePageSelected(t.index+1)},keyup:function(n){return"button"in n||!e._k(n.keyCode,"enter",13)?void e.handlePageSelected(t.index+1):null}}},[e._v(e._s(t.content))])])}),e._v(" "),e.lastPageSelected()&&e.hidePrevNext?e._e():n("li",{class:[e.nextClass,e.lastPageSelected()?e.disabledClass:""]},[n("a",{class:e.nextLinkClass,attrs:{tabindex:e.lastPageSelected()?-1:0},domProps:{innerHTML:e._s(e.nextText)},on:{click:function(t){e.nextPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.nextPage():null}}})]),e._v(" "),e.firstLastButton?n("li",{class:[e.pageClass,e.lastPageSelected()?e.disabledClass:""]},[n("a",{class:e.pageLinkClass,attrs:{tabindex:e.lastPageSelected()?-1:0},domProps:{innerHTML:e._s(e.lastButtonText)},on:{click:function(t){e.selectLastPage()},keyup:function(t){return"button"in t||!e._k(t.keyCode,"enter",13)?void e.selectLastPage():null}}})]):e._e()],2)},staticRenderFns:[]}}])})},"8c42":function(e,t,n){},b747:function(e,t,n){(function(t,n,i){e.exports=i(),e.exports["default"]=i()})(0,0,function(){var e=JSON.parse('{"$":"dollar","%":"percent","&":"and","<":"less",">":"greater","|":"or","¢":"cent","£":"pound","¤":"currency","¥":"yen","©":"(c)","ª":"a","®":"(r)","º":"o","À":"A","Á":"A","Â":"A","Ã":"A","Ä":"A","Å":"A","Æ":"AE","Ç":"C","È":"E","É":"E","Ê":"E","Ë":"E","Ì":"I","Í":"I","Î":"I","Ï":"I","Ð":"D","Ñ":"N","Ò":"O","Ó":"O","Ô":"O","Õ":"O","Ö":"O","Ø":"O","Ù":"U","Ú":"U","Û":"U","Ü":"U","Ý":"Y","Þ":"TH","ß":"ss","à":"a","á":"a","â":"a","ã":"a","ä":"a","å":"a","æ":"ae","ç":"c","è":"e","é":"e","ê":"e","ë":"e","ì":"i","í":"i","î":"i","ï":"i","ð":"d","ñ":"n","ò":"o","ó":"o","ô":"o","õ":"o","ö":"o","ø":"o","ù":"u","ú":"u","û":"u","ü":"u","ý":"y","þ":"th","ÿ":"y","Ā":"A","ā":"a","Ă":"A","ă":"a","Ą":"A","ą":"a","Ć":"C","ć":"c","Č":"C","č":"c","Ď":"D","ď":"d","Đ":"DJ","đ":"dj","Ē":"E","ē":"e","Ė":"E","ė":"e","Ę":"e","ę":"e","Ě":"E","ě":"e","Ğ":"G","ğ":"g","Ģ":"G","ģ":"g","Ĩ":"I","ĩ":"i","Ī":"i","ī":"i","Į":"I","į":"i","İ":"I","ı":"i","Ķ":"k","ķ":"k","Ļ":"L","ļ":"l","Ľ":"L","ľ":"l","Ł":"L","ł":"l","Ń":"N","ń":"n","Ņ":"N","ņ":"n","Ň":"N","ň":"n","Ő":"O","ő":"o","Œ":"OE","œ":"oe","Ŕ":"R","ŕ":"r","Ř":"R","ř":"r","Ś":"S","ś":"s","Ş":"S","ş":"s","Š":"S","š":"s","Ţ":"T","ţ":"t","Ť":"T","ť":"t","Ũ":"U","ũ":"u","Ū":"u","ū":"u","Ů":"U","ů":"u","Ű":"U","ű":"u","Ų":"U","ų":"u","Ź":"Z","ź":"z","Ż":"Z","ż":"z","Ž":"Z","ž":"z","ƒ":"f","Ơ":"O","ơ":"o","Ư":"U","ư":"u","ǈ":"LJ","ǉ":"lj","ǋ":"NJ","ǌ":"nj","Ș":"S","ș":"s","Ț":"T","ț":"t","˚":"o","Ά":"A","Έ":"E","Ή":"H","Ί":"I","Ό":"O","Ύ":"Y","Ώ":"W","ΐ":"i","Α":"A","Β":"B","Γ":"G","Δ":"D","Ε":"E","Ζ":"Z","Η":"H","Θ":"8","Ι":"I","Κ":"K","Λ":"L","Μ":"M","Ν":"N","Ξ":"3","Ο":"O","Π":"P","Ρ":"R","Σ":"S","Τ":"T","Υ":"Y","Φ":"F","Χ":"X","Ψ":"PS","Ω":"W","Ϊ":"I","Ϋ":"Y","ά":"a","έ":"e","ή":"h","ί":"i","ΰ":"y","α":"a","β":"b","γ":"g","δ":"d","ε":"e","ζ":"z","η":"h","θ":"8","ι":"i","κ":"k","λ":"l","μ":"m","ν":"n","ξ":"3","ο":"o","π":"p","ρ":"r","ς":"s","σ":"s","τ":"t","υ":"y","φ":"f","χ":"x","ψ":"ps","ω":"w","ϊ":"i","ϋ":"y","ό":"o","ύ":"y","ώ":"w","Ё":"Yo","Ђ":"DJ","Є":"Ye","І":"I","Ї":"Yi","Ј":"J","Љ":"LJ","Њ":"NJ","Ћ":"C","Џ":"DZ","А":"A","Б":"B","В":"V","Г":"G","Д":"D","Е":"E","Ж":"Zh","З":"Z","И":"I","Й":"J","К":"K","Л":"L","М":"M","Н":"N","О":"O","П":"P","Р":"R","С":"S","Т":"T","У":"U","Ф":"F","Х":"H","Ц":"C","Ч":"Ch","Ш":"Sh","Щ":"Sh","Ъ":"U","Ы":"Y","Ь":"","Э":"E","Ю":"Yu","Я":"Ya","а":"a","б":"b","в":"v","г":"g","д":"d","е":"e","ж":"zh","з":"z","и":"i","й":"j","к":"k","л":"l","м":"m","н":"n","о":"o","п":"p","р":"r","с":"s","т":"t","у":"u","ф":"f","х":"h","ц":"c","ч":"ch","ш":"sh","щ":"sh","ъ":"u","ы":"y","ь":"","э":"e","ю":"yu","я":"ya","ё":"yo","ђ":"dj","є":"ye","і":"i","ї":"yi","ј":"j","љ":"lj","њ":"nj","ћ":"c","џ":"dz","Ґ":"G","ґ":"g","฿":"baht","ა":"a","ბ":"b","გ":"g","დ":"d","ე":"e","ვ":"v","ზ":"z","თ":"t","ი":"i","კ":"k","ლ":"l","მ":"m","ნ":"n","ო":"o","პ":"p","ჟ":"zh","რ":"r","ს":"s","ტ":"t","უ":"u","ფ":"f","ქ":"k","ღ":"gh","ყ":"q","შ":"sh","ჩ":"ch","ც":"ts","ძ":"dz","წ":"ts","ჭ":"ch","ხ":"kh","ჯ":"j","ჰ":"h","ẞ":"SS","Ạ":"A","ạ":"a","Ả":"A","ả":"a","Ấ":"A","ấ":"a","Ầ":"A","ầ":"a","Ẩ":"A","ẩ":"a","Ẫ":"A","ẫ":"a","Ậ":"A","ậ":"a","Ắ":"A","ắ":"a","Ằ":"A","ằ":"a","Ẳ":"A","ẳ":"a","Ẵ":"A","ẵ":"a","Ặ":"A","ặ":"a","Ẹ":"E","ẹ":"e","Ẻ":"E","ẻ":"e","Ẽ":"E","ẽ":"e","Ế":"E","ế":"e","Ề":"E","ề":"e","Ể":"E","ể":"e","Ễ":"E","ễ":"e","Ệ":"E","ệ":"e","Ỉ":"I","ỉ":"i","Ị":"I","ị":"i","Ọ":"O","ọ":"o","Ỏ":"O","ỏ":"o","Ố":"O","ố":"o","Ồ":"O","ồ":"o","Ổ":"O","ổ":"o","Ỗ":"O","ỗ":"o","Ộ":"O","ộ":"o","Ớ":"O","ớ":"o","Ờ":"O","ờ":"o","Ở":"O","ở":"o","Ỡ":"O","ỡ":"o","Ợ":"O","ợ":"o","Ụ":"U","ụ":"u","Ủ":"U","ủ":"u","Ứ":"U","ứ":"u","Ừ":"U","ừ":"u","Ử":"U","ử":"u","Ữ":"U","ữ":"u","Ự":"U","ự":"u","Ỳ":"Y","ỳ":"y","Ỵ":"Y","ỵ":"y","Ỷ":"Y","ỷ":"y","Ỹ":"Y","ỹ":"y","‘":"\'","’":"\'","“":"\\"","”":"\\"","†":"+","•":"*","…":"...","₠":"ecu","₢":"cruzeiro","₣":"french franc","₤":"lira","₥":"mill","₦":"naira","₧":"peseta","₨":"rupee","₩":"won","₪":"new shequel","₫":"dong","€":"euro","₭":"kip","₮":"tugrik","₯":"drachma","₰":"penny","₱":"peso","₲":"guarani","₳":"austral","₴":"hryvnia","₵":"cedi","₹":"indian rupee","₽":"russian ruble","₿":"bitcoin","℠":"sm","™":"tm","∂":"d","∆":"delta","∑":"sum","∞":"infinity","♥":"love","元":"yuan","円":"yen","﷼":"rial"}');function t(t,n){if("string"!==typeof t)throw new Error("slugify: string argument expected");n="string"===typeof n?{replacement:n}:n||{};var i=t.split("").reduce(function(t,i){return t+(e[i]||i).replace(n.remove||/[^\w\s$*_+~.()'"!\-:@]/g,"")},"").trim().replace(/[-\s]+/g,n.replacement||"-");return n.lower?i.toLowerCase():i}return t.extend=function(t){for(var n in t)e[n]=t[n]},t})}}]);
//# sourceMappingURL=chunk-a0b7289c.317826d9.js.map