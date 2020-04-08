(window.webpackJsonp=window.webpackJsonp||[]).push([[7],{"578l":function(t,e,s){"use strict";s.r(e);var i=s("o0o1"),a=s.n(i),r=s("DxOX"),n=s("cv7c"),o={methods:{goBack:function(){console.log("go back"),this.$router.push("/")}}},c=s("KHd+"),l=Object(c.a)(o,(function(){var t=this.$createElement;return(this._self._c||t)("el-page-header",{attrs:{title:"Back"},on:{back:this.goBack}})}),[],!1,null,null,null).exports,u=s("Wswj"),h=s("jMhu");function v(t,e,s,i,a,r,n){try{var o=t[r](n),c=o.value}catch(t){return void s(t)}o.done?e(c):Promise.resolve(c).then(i,a)}function d(t){return function(){var e=this,s=arguments;return new Promise((function(i,a){var r=t.apply(e,s);function n(t){v(r,i,a,n,o,"next",t)}function o(t){v(r,i,a,n,o,"throw",t)}n(void 0)}))}}var p,_,f,m,w,C,b={components:{bdIcon:n.a,bdBack:l,bdUserIcon:u.a,bdBread:h.a},props:{id:{type:String,required:!0}},data:function(){return{shop:null,fullWidth:!1,reviewContent:"",reviewErrors:null,active:!1,count:0,loading:!1,user:null,wardId:null}},computed:{isLogin:function(){return this.$store.getters["auth/check"]},noMore:function(){return 0!==this.count&&this.count==this.shop.reviews.length},disabled:function(){return this.loading||this.noMore},styleObject:function(){return""!=this.shop.reviews&&{height:"400px","overflow-y":"scroll"}}},methods:{fetchShop:(C=d(a.a.mark((function t(){var e;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,axios.get("/api/shops/".concat(this.id));case 2:if((e=t.sent).status===r.d){t.next=6;break}return this.$store.commit("error/setCode",e.status),t.abrupt("return",!1);case 6:console.log(e),this.shop=e.data;case 8:case"end":return t.stop()}}),t,this)}))),function(){return C.apply(this,arguments)}),addReview:(w=d(a.a.mark((function t(){var e;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,axios.post("/api/shops/".concat(this.id,"/reviews"),{content:this.reviewContent});case 2:if((e=t.sent).status!==r.f){t.next=6;break}return this.reviewErrors=e.data.errors,t.abrupt("return",!1);case 6:if(this.reviewContent="",this.reviewErroros=null,e.status===r.a){t.next=11;break}return this.$store.commit("error/setCode",e.status),t.abrupt("return",!1);case 11:this.fetchShop(),this.reviewMessage();case 13:case"end":return t.stop()}}),t,this)}))),function(){return w.apply(this,arguments)}),onLikeClick:function(){if(!this.isLogin)return alert("いいね機能を使うにはログインしてください。"),!1;this.shop.liked_by_user?this.unlike():this.like()},like:(m=d(a.a.mark((function t(){var e;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,axios.put("/api/shops/".concat(this.id,"/like"));case 2:if((e=t.sent).status===r.d){t.next=6;break}return this.$store.commit("error/setCode",e.status),t.abrupt("return",!1);case 6:this.shop.likes_count=this.shop.likes_count+1,this.shop.liked_by_user=!0;case 8:case"end":return t.stop()}}),t,this)}))),function(){return m.apply(this,arguments)}),unlike:(f=d(a.a.mark((function t(){var e;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,axios.delete("/api/shops/".concat(this.id,"/unlike"));case 2:if((e=t.sent).status===r.d){t.next=6;break}return this.$store.commit("error/setCode",e.status),t.abrupt("return",!1);case 6:this.shop.likes_count=this.shop.likes_count-1,this.shop.liked_by_user=!1;case 8:case"end":return t.stop()}}),t,this)}))),function(){return f.apply(this,arguments)}),load:function(){var t=this;this.loading=!0,setTimeout((function(){t.shop.reviews.length>=t.count&&(t.count+=1),t.loading=!1}),1e3)},fetchUser:(_=d(a.a.mark((function t(){var e;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,axios.get("/api/profile/");case 2:if((e=t.sent).status===r.d){t.next=6;break}return this.$store.commit("error/setCode",e.status),t.abrupt("return",!1);case 6:this.user=e.data;case 7:case"end":return t.stop()}}),t,this)}))),function(){return _.apply(this,arguments)}),reviewMessage:function(){this.$notify({message:"レビューしていただき誠にありがとうございます！",position:"top-right",showClose:!1})}},watch:{$route:{handler:(p=d(a.a.mark((function t(){return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,this.fetchShop();case 2:if(this.user=this.$store.getters["auth/check"],!1===this.user){t.next=6;break}return t.next=6,this.fetchUser();case 6:this.wardId=this.$store.state.ward.id,console.log(this.wardId);case 8:case"end":return t.stop()}}),t,this)}))),function(){return p.apply(this,arguments)}),immediate:!0}}},g=Object(c.a)(b,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"container"},[s("bdBread",{attrs:{ward_id:t.wardId,shop:t.shop}}),t._v(" "),t.shop?s("div",{staticClass:"photo-detail container",class:{"photo-detail--column":t.fullWidth}},[s("figure",{staticClass:"photo-detail__pane photo-detail__image image",on:{click:function(e){t.active=!t.active}}},[s("div",{staticClass:"level-left"},[s("div",{staticClass:"level-item"},[s("p",{staticClass:"heading"},[t._v("Boardgames")]),t._v(" "),s("p",{staticClass:"title"},[t._v(t._s(t.shop.boardgame_num))])]),t._v(" "),s("div",{staticClass:"level-item"},[s("p",{staticClass:"heading"},[t._v("Followers")]),t._v(" "),s("p",{staticClass:"title"},[t._v(t._s(t.shop.likes_count))])]),t._v(" "),s("div",{staticClass:"level-item"},[s("p",{staticClass:"heading"},[t._v("Reviews")]),t._v(" "),s("p",{staticClass:"title"},[t._v(t._s(t.shop.reviews.length))])])]),t._v(" "),s("img",{attrs:{src:t.shop.photos.url,alt:""}})]),t._v(" "),s("div",{staticClass:"tile is-vertical is-6"},[s("div",{staticClass:"tile"},[s("div",{staticClass:"tile is-parent is-vertical"},[s("article",{staticClass:"tile is-child box"},[s("p",{staticClass:"title has-text-centered"},[t._v(t._s(t.shop.shop_name))]),t._v(" "),s("p",{staticClass:"subtitle has-text-centered"},[t._v(t._s(t.shop.address))]),t._v(" "),s("p",{staticClass:"content has-text-centered"},[t._v(t._s(t.shop.content))]),t._v(" "),s("p",{staticClass:"has-text-left"},[s("i",{staticClass:"fas fa-money-bill-wave"}),t._v("  予算：約"+t._s(t.shop.price)+"円\n            ")]),t._v(" "),t._m(0),t._v(" "),s("div",{staticClass:"infinite-list-wrapper",style:t.styleObject},[t.count>=0?s("ul",{directives:[{name:"infinite-scroll",rawName:"v-infinite-scroll",value:t.load,expression:"load"}],staticClass:"photo-detail__reviews list",attrs:{"infinite-scroll-disabled":"disabled"}},t._l(t.shop.reviews,(function(e,i){return s("li",{key:i,staticClass:"photo-detail__commentItem list-item"},[s("article",{staticClass:"media"},[e.user_photo.icon_url?s("figure",{staticClass:"media-left"},[s("p",{staticClass:"image is-64x64"},[s("img",{attrs:{src:e.user_photo.icon_url}})])]):t._e(),t._v(" "),""==e.user_photo.icon_url?s("el-avatar",{attrs:{size:50,src:"https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png"}}):t._e(),t._v(" "),s("div",{staticClass:"media-content"},[s("div",{staticClass:"content"},[s("p",[s("strong",[t._v("\n                            "+t._s(e.author.name)+"\n                          ")]),t._v(" "),s("small",[t._v("\n                            "+t._s(e.date)+"\n                          ")]),t._v(" "),s("br"),t._v("\n                          "+t._s(e.content)+"\n                        ")])])])],1)])})),0):t._e(),t._v(" "),t.loading?s("p",[t._v("Loading...")]):t._e(),t._v(" "),t.noMore?s("p",[t._v("No more")]):t._e()]),t._v(" "),0==t.shop.reviews.length?s("p",{staticClass:"has-text-left"},[s("strong",[t._v("まだレビューがありません！")])]):t._e(),t._v(" "),t.isLogin?s("form",{staticClass:"form",on:{submit:function(e){return e.preventDefault(),t.addReview(e)}}},[t.reviewErrors?s("div",{staticClass:"errors"},[t.reviewErrors.content?s("ul",t._l(t.reviewErrors.content,(function(e){return s("li",{key:e},[t._v(t._s(e))])})),0):t._e()]):t._e(),t._v(" "),s("article",{staticClass:"media"},[s("figure",{staticClass:"media-left"},[t.user.icon_url?s("figure",{staticClass:"media-left"},[s("p",{staticClass:"image is-64x64"},[s("img",{attrs:{src:t.user.icon_url}})])]):t._e(),t._v(" "),""==t.user.icon_url?s("el-avatar",{attrs:{size:50,src:"https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png"}}):t._e()],1),t._v(" "),s("div",{staticClass:"media-content"},[s("div",{staticClass:"field"},[s("p",{staticClass:"control"},[s("textarea",{directives:[{name:"model",rawName:"v-model",value:t.reviewContent,expression:"reviewContent"}],staticClass:"textarea",attrs:{placeholder:"レビューを投稿してください！"},domProps:{value:t.reviewContent},on:{input:function(e){e.target.composing||(t.reviewContent=e.target.value)}}})])]),t._v(" "),t._m(1)])])]):t._e(),t._v(" "),s("footer",{staticClass:"card-footer"},[s("div",{staticClass:"card-footer-item"},[t._m(2),t._v(" "),s("span",[t._v("\n                  View on\n                  "),s("a",{attrs:{href:t.shop.home_url,target:"_blank",rel:"noopener noreferrer"}},[t._v("Official")])])])])])])])]),t._v(" "),s("div",{staticClass:"modal",class:{"is-active":t.active}},[s("div",{staticClass:"modal-background"}),t._v(" "),s("div",{staticClass:"modal-content"},[s("p",{staticClass:"image is-4by3"},[s("img",{attrs:{src:t.shop.photos.url,alt:""}})])]),t._v(" "),s("button",{staticClass:"modal-close is-large",attrs:{"aria-label":"close"},on:{click:function(e){t.active=!1}}})])]):t._e()],1)}),[function(){var t=this.$createElement,e=this._self._c||t;return e("h2",{staticClass:"photo-detail__title"},[e("i",{staticClass:"icon ion-md-chatboxes"}),this._v("Review\n            ")])},function(){var t=this.$createElement,e=this._self._c||t;return e("nav",{staticClass:"level"},[e("div",{staticClass:"level-right"},[e("div",{staticClass:"level-item"},[e("div",{staticClass:"form__button"},[e("button",{staticClass:"button button--inverse",attrs:{type:"submit"}},[this._v("レビューを投稿する")])])])])])},function(){var t=this.$createElement,e=this._self._c||t;return e("span",{staticClass:"icon is-small"},[e("i",{staticClass:"fas fa-globe",attrs:{"aria-hidden":"true"}})])}],!1,null,null,null);e.default=g.exports},UrbO:function(t,e,s){var i=s("xSNV");"string"==typeof i&&(i=[[t.i,i,""]]);var a={hmr:!0,transform:void 0,insertInto:void 0};s("aET+")(i,a);i.locals&&(t.exports=i.locals)},Wswj:function(t,e,s){"use strict";var i={name:"bdTextField"},a=(s("tri/"),s("KHd+")),r=Object(a.a)(i,(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{staticClass:"user_icon",attrs:{"aria-hidden":"true",focusable:"false","data-prefix":"fas","data-icon":"user-circle",role:"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 496 512"}},[e("path",{attrs:{d:"M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"}})])}),[],!1,null,"34221b74",null);e.a=r.exports},Ye1j:function(t,e,s){(t.exports=s("I1BE")(!1)).push([t.i,"\n.user_icon[data-v-34221b74] {\n  fill: #c0c4cc;\n}\n",""])},fkQu:function(t,e,s){var i=s("Ye1j");"string"==typeof i&&(i=[[t.i,i,""]]);var a={hmr:!0,transform:void 0,insertInto:void 0};s("aET+")(i,a);i.locals&&(t.exports=i.locals)},jMhu:function(t,e,s){"use strict";var i=s("o0o1"),a=s.n(i),r=s("DxOX");function n(t,e,s,i,a,r,n){try{var o=t[r](n),c=o.value}catch(t){return void s(t)}o.done?e(c):Promise.resolve(c).then(i,a)}var o,c,l={props:{shop:Object,ward_id:String},data:function(){return{wards:[],url:this.$route.path}},methods:{valuecheck:function(){console.log(this.ward_id)},fetchWards:(o=a.a.mark((function t(){var e;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,axios.get("/api/wards/");case 2:if((e=t.sent).status===r.d){t.next=6;break}return this.$store.commit("error/setCode",e.status),t.abrupt("return",!1);case 6:this.wards=e.data;case 7:case"end":return t.stop()}}),t,this)})),c=function(){var t=this,e=arguments;return new Promise((function(s,i){var a=o.apply(t,e);function r(t){n(a,s,i,r,c,"next",t)}function c(t){n(a,s,i,r,c,"throw",t)}r(void 0)}))},function(){return c.apply(this,arguments)})},watch:{$route:{handler:function(){this.valuecheck()},immediate:!0}},created:function(){this.fetchWards()}},u=(s("qxsc"),s("KHd+")),h=Object(u.a)(l,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("section",{staticClass:"section is-hidden-print"},[s("nav",{staticClass:"level"},[s("div",{staticClass:"level-left"},[s("div",{staticClass:"level-item"},[s("nav",{staticClass:"breadcrumb",attrs:{"aria-label":"breadcrumbs"}},[s("ul",[s("li",[s("RouterLink",{attrs:{to:"/"}},[t._v("Home")])],1),t._v(" "),t.ward_id?s("li",[t._l(t.wards,(function(e){return[e.id==t.ward_id?s("RouterLink",{attrs:{to:"/wards/"+e.id}},[t._v(t._s(e.name))]):t._e()]}))],2):t._e(),t._v(" "),t.shop?s("li",[s("RouterLink",{attrs:{to:"/shops/"+t.shop.id}},[t._v(t._s(t.shop.shop_name))])],1):t._e(),t._v(" "),"/profile"==t.url?s("li",[s("RouterLink",{attrs:{to:"/profile"}},[t._v("プロフィール")])],1):t._e(),t._v(" "),"/credential"==t.url?s("li",[s("RouterLink",{attrs:{to:"/credential"}},[t._v("認証情報変更")])],1):t._e()])])])])])])}),[],!1,null,"1379a581",null);e.a=h.exports},qxsc:function(t,e,s){"use strict";var i=s("UrbO");s.n(i).a},"tri/":function(t,e,s){"use strict";var i=s("fkQu");s.n(i).a},xSNV:function(t,e,s){(t.exports=s("I1BE")(!1)).push([t.i,"\na[data-v-1379a581] {\n  color: #69569c;\n  font-weight: bold;\n}\n",""])}}]);