(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["ShopList"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ShopList.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/ShopList.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _util__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../util */ "./resources/js/util.js");
/* harmony import */ var _components_Shop_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/Shop.vue */ "./resources/js/components/Shop.vue");
/* harmony import */ var _components_Pagination_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/Pagination.vue */ "./resources/js/components/Pagination.vue");
/* harmony import */ var _components_Carousel_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/Carousel.vue */ "./resources/js/components/Carousel.vue");
/* harmony import */ var _components_SearchBox_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../components/SearchBox.vue */ "./resources/js/components/SearchBox.vue");
/* harmony import */ var _components_SearchOptions_vue__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../components/SearchOptions.vue */ "./resources/js/components/SearchOptions.vue");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    shop: _components_Shop_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    pagination: _components_Pagination_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    bdCarousel: _components_Carousel_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    bdSearchBox: _components_SearchBox_vue__WEBPACK_IMPORTED_MODULE_5__["default"],
    bdSearchOptions: _components_SearchOptions_vue__WEBPACK_IMPORTED_MODULE_6__["default"]
  },
  data: function data() {
    return {
      shops: [],
      currentPage: 0,
      lastPage: 0,
      hiddenShops: []
    };
  },
  props: {
    page: {
      type: Number,
      required: false,
      "default": 1
    }
  },
  computed: {
    simpleSuggestionList: function simpleSuggestionList() {
      var shop_name = [];
      this.hiddenShops.forEach(function (value) {
        shop_name.push(value.shop_name);
      });
      return shop_name;
    }
  },
  methods: {
    fetchShops: function () {
      var _fetchShops = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return axios.get("/api/shops/?page=".concat(this.$route.query.page));

              case 2:
                response = _context.sent;

                if (!(response.status !== _util__WEBPACK_IMPORTED_MODULE_1__["OK"])) {
                  _context.next = 6;
                  break;
                }

                this.$store.commit("error/setCode", response.status);
                return _context.abrupt("return", false);

              case 6:
                this.shops = response.data.data;
                this.hiddenShops = response.data.data;
                this.currentPage = response.data.current_page;
                this.lastPage = response.data.last_page;

              case 10:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function fetchShops() {
        return _fetchShops.apply(this, arguments);
      }

      return fetchShops;
    }(),
    onLikeClick: function onLikeClick(_ref) {
      var id = _ref.id,
          liked = _ref.liked;

      if (!this.$store.getters["auth/check"]) {
        alert("いいねするにはログインをしてください");
        return false;
      }

      if (liked) {
        this.unlike(id);
      } else {
        this.like(id);
      }
    },
    like: function () {
      var _like = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(id) {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return axios.put("/api/shops/".concat(id, "/like"));

              case 2:
                response = _context2.sent;

                if (!(response.status !== _util__WEBPACK_IMPORTED_MODULE_1__["OK"])) {
                  _context2.next = 6;
                  break;
                }

                this.$store.commit("error/setCode", response.status);
                return _context2.abrupt("return", false);

              case 6:
                this.shops = this.shops.map(function (shop) {
                  if (shop.id == response.data.shop_id) {
                    shop.likes_count += 1;
                    shop.liked_by_user = true;
                  }

                  return shop;
                });

              case 7:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this);
      }));

      function like(_x) {
        return _like.apply(this, arguments);
      }

      return like;
    }(),
    unlike: function () {
      var _unlike = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3(id) {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                _context3.next = 2;
                return axios["delete"]("/api/shops/".concat(id, "/unlike"));

              case 2:
                response = _context3.sent;

                if (!(response.status !== _util__WEBPACK_IMPORTED_MODULE_1__["OK"])) {
                  _context3.next = 6;
                  break;
                }

                this.$store.commit("error/setCode", response.status);
                return _context3.abrupt("return", false);

              case 6:
                this.shops = this.shops.map(function (shop) {
                  if (shop.id == response.data.shop_id) {
                    shop.likes_count -= 1;
                    shop.liked_by_user = false;
                  }

                  return shop;
                });

              case 7:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, this);
      }));

      function unlike(_x2) {
        return _unlike.apply(this, arguments);
      }

      return unlike;
    }(),
    search: function () {
      var _search = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4(keyword) {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                console.log(keyword);
                _context4.next = 3;
                return axios.get("/api/shops/".concat(keyword));

              case 3:
                response = _context4.sent;

                if (response.status == 200) {
                  this.shops = response.data;
                } else {
                  this.$store.commit("error/setCode", response.status);
                }

              case 5:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4, this);
      }));

      function search(_x3) {
        return _search.apply(this, arguments);
      }

      return search;
    }(),
    setId: function setId() {
      this.$store.commit("ward/setId", null);
    },
    valuecheck: function valuecheck() {
      console.log(this.simpleSuggestionList);
    }
  },
  watch: {
    $route: {
      handler: function () {
        var _handler = _asyncToGenerator(
        /*#__PURE__*/
        _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5() {
          return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
            while (1) {
              switch (_context5.prev = _context5.next) {
                case 0:
                  _context5.next = 2;
                  return this.fetchShops();

                case 2:
                  this.setId();

                case 3:
                case "end":
                  return _context5.stop();
              }
            }
          }, _callee5, this);
        }));

        function handler() {
          return _handler.apply(this, arguments);
        }

        return handler;
      }(),
      immediate: true
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ShopList.vue?vue&type=template&id=5aa61ed3&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/ShopList.vue?vue&type=template&id=5aa61ed3& ***!
  \******************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "shop-list container" },
    [
      _c("bd-search-box", {
        attrs: { simpleSuggestionList: _vm.simpleSuggestionList },
        on: { search: _vm.search, fetchShops: _vm.fetchShops }
      }),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "grid" },
        _vm._l(_vm.shops, function(shop) {
          return _c("shop", {
            key: shop.id,
            staticClass: "grid__item",
            attrs: { item: shop },
            on: { like: _vm.onLikeClick }
          })
        }),
        1
      ),
      _vm._v(" "),
      _c("pagination", {
        attrs: { "current-page": _vm.currentPage, "last-page": _vm.lastPage }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/ShopList.vue":
/*!*****************************************!*\
  !*** ./resources/js/views/ShopList.vue ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ShopList_vue_vue_type_template_id_5aa61ed3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ShopList.vue?vue&type=template&id=5aa61ed3& */ "./resources/js/views/ShopList.vue?vue&type=template&id=5aa61ed3&");
/* harmony import */ var _ShopList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ShopList.vue?vue&type=script&lang=js& */ "./resources/js/views/ShopList.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ShopList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ShopList_vue_vue_type_template_id_5aa61ed3___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ShopList_vue_vue_type_template_id_5aa61ed3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/ShopList.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/ShopList.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/views/ShopList.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShopList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ShopList.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ShopList.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ShopList_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/ShopList.vue?vue&type=template&id=5aa61ed3&":
/*!************************************************************************!*\
  !*** ./resources/js/views/ShopList.vue?vue&type=template&id=5aa61ed3& ***!
  \************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShopList_vue_vue_type_template_id_5aa61ed3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./ShopList.vue?vue&type=template&id=5aa61ed3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ShopList.vue?vue&type=template&id=5aa61ed3&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShopList_vue_vue_type_template_id_5aa61ed3___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ShopList_vue_vue_type_template_id_5aa61ed3___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);