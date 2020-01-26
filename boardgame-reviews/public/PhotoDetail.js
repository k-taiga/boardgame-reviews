(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["PhotoDetail"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PhotoDetail.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/PhotoDetail.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _util__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../util */ "./resources/js/util.js");
/* harmony import */ var _components_Icon__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/Icon */ "./resources/js/components/Icon.vue");


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
    bdIcon: _components_Icon__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data: function data() {
    return {
      photo: null,
      fullWidth: false,
      reviewContent: "",
      reviewErrors: null,
      active: false
    };
  },
  computed: {
    isLogin: function isLogin() {
      return this.$store.getters["auth/check"];
    }
  },
  methods: {
    fetchPhoto: function () {
      var _fetchPhoto = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return axios.get("/api/photos/".concat(this.id));

              case 2:
                response = _context.sent;

                if (!(response.status !== _util__WEBPACK_IMPORTED_MODULE_1__["OK"])) {
                  _context.next = 6;
                  break;
                }

                this.$store.commit("error/setCode", response.status);
                return _context.abrupt("return", false);

              case 6:
                this.photo = response.data;

              case 7:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function fetchPhoto() {
        return _fetchPhoto.apply(this, arguments);
      }

      return fetchPhoto;
    }(),
    addReview: function () {
      var _addReview = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return axios.post("/api/photos/".concat(this.id, "/reviews"), {
                  content: this.reviewContent
                });

              case 2:
                response = _context2.sent;

                if (!(response.status === _util__WEBPACK_IMPORTED_MODULE_1__["UNPROCESSABLE_ENTITY"])) {
                  _context2.next = 6;
                  break;
                }

                this.reviewErrors = response.data.errors;
                return _context2.abrupt("return", false);

              case 6:
                this.reviewContent = "";
                this.reviewErroros = null; // その他のエラー

                if (!(response.status !== _util__WEBPACK_IMPORTED_MODULE_1__["CREATED"])) {
                  _context2.next = 11;
                  break;
                }

                this.$store.commit("error/setCode", response.status);
                return _context2.abrupt("return", false);

              case 11:
                this.fetchPhoto();

              case 12:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this);
      }));

      function addReview() {
        return _addReview.apply(this, arguments);
      }

      return addReview;
    }(),
    onLikeClick: function onLikeClick() {
      if (!this.isLogin) {
        alert("いいね機能を使うにはログインしてください。");
        return false;
      }

      if (this.photo.liked_by_user) {
        this.unlike();
      } else {
        this.like();
      }
    },
    like: function () {
      var _like = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                _context3.next = 2;
                return axios.put("/api/photos/".concat(this.id, "/like"));

              case 2:
                response = _context3.sent;

                if (!(response.status !== _util__WEBPACK_IMPORTED_MODULE_1__["OK"])) {
                  _context3.next = 6;
                  break;
                }

                this.$store.commit("error/setCode", response.status);
                return _context3.abrupt("return", false);

              case 6:
                this.photo.likes_count = this.photo.likes_count + 1;
                this.photo.liked_by_user = true;

              case 8:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, this);
      }));

      function like() {
        return _like.apply(this, arguments);
      }

      return like;
    }(),
    unlike: function () {
      var _unlike = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                _context4.next = 2;
                return axios["delete"]("/api/photos/".concat(this.id, "/unlike"));

              case 2:
                response = _context4.sent;

                if (!(response.status !== _util__WEBPACK_IMPORTED_MODULE_1__["OK"])) {
                  _context4.next = 6;
                  break;
                }

                this.$store.commit("error/setCode", response.status);
                return _context4.abrupt("return", false);

              case 6:
                this.photo.likes_count = this.photo.likes_count - 1;
                this.photo.liked_by_user = false;

              case 8:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4, this);
      }));

      function unlike() {
        return _unlike.apply(this, arguments);
      }

      return unlike;
    }()
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
                  return this.fetchPhoto();

                case 2:
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PhotoDetail.vue?vue&type=template&id=5ed32b54&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/PhotoDetail.vue?vue&type=template&id=5ed32b54& ***!
  \*********************************************************************************************************************************************************************************************************/
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
  return _vm.photo
    ? _c(
        "div",
        {
          staticClass: "photo-detail container",
          class: { "photo-detail--column": _vm.fullWidth }
        },
        [
          _c(
            "figure",
            {
              staticClass: "photo-detail__pane photo-detail__image image",
              on: {
                click: function($event) {
                  _vm.active = !_vm.active
                }
              }
            },
            [
              _c("img", { attrs: { src: _vm.photo.url, alt: "" } }),
              _vm._v(" "),
              _c("figcaption", [
                _vm._v("Posted by " + _vm._s(_vm.photo.owner.name))
              ])
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "photo-detail__pane" }, [
            _c(
              "button",
              {
                staticClass: "button button--like",
                class: { "photo__action--liked": _vm.photo.liked_by_user },
                attrs: { title: "Like photo" },
                on: { click: _vm.onLikeClick }
              },
              [
                _c("bdIcon", { attrs: { name: "thumbs-up" } }),
                _vm._v(_vm._s(_vm.photo.likes_count) + "\n        ")
              ],
              1
            ),
            _vm._v(" "),
            _vm._m(0),
            _vm._v(" "),
            _vm.photo.reviews.length > 0
              ? _c(
                  "ul",
                  { staticClass: "photo-detail__reviews" },
                  _vm._l(_vm.photo.reviews, function(review, index) {
                    return _c(
                      "li",
                      { key: index, staticClass: "photo-detail__commentItem" },
                      [
                        _c("p", { staticClass: "photo-detail__commentBody" }, [
                          _vm._v(
                            "\n                    " +
                              _vm._s(review.content) +
                              "\n                "
                          )
                        ]),
                        _vm._v(" "),
                        _c("p", { staticClass: "photo-detail__commentInfo" }, [
                          _vm._v(
                            "\n                    " +
                              _vm._s(review.author.name) +
                              "\n                "
                          )
                        ])
                      ]
                    )
                  }),
                  0
                )
              : _c("p", [_vm._v("No reviews yet.")]),
            _vm._v(" "),
            _vm.isLogin
              ? _c(
                  "form",
                  {
                    staticClass: "form",
                    on: {
                      submit: function($event) {
                        $event.preventDefault()
                        return _vm.addReview($event)
                      }
                    }
                  },
                  [
                    _vm.reviewErrors
                      ? _c("div", { staticClass: "errors" }, [
                          _vm.reviewErrors.content
                            ? _c(
                                "ul",
                                _vm._l(_vm.reviewErrors.content, function(msg) {
                                  return _c("li", { key: msg }, [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(msg) +
                                        "\n                    "
                                    )
                                  ])
                                }),
                                0
                              )
                            : _vm._e()
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.reviewContent,
                          expression: "reviewContent"
                        }
                      ],
                      staticClass: "form__item",
                      domProps: { value: _vm.reviewContent },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.reviewContent = $event.target.value
                        }
                      }
                    }),
                    _vm._v(" "),
                    _vm._m(1)
                  ]
                )
              : _vm._e()
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "modal", class: { "is-active": _vm.active } },
            [
              _c("div", { staticClass: "modal-background" }),
              _vm._v(" "),
              _c("div", { staticClass: "modal-content" }, [
                _c("p", { staticClass: "image is-4by3" }, [
                  _c("img", { attrs: { src: _vm.photo.url, alt: "" } })
                ])
              ]),
              _vm._v(" "),
              _c("button", {
                staticClass: "modal-close is-large",
                attrs: { "aria-label": "close" },
                on: {
                  click: function($event) {
                    _vm.active = false
                  }
                }
              })
            ]
          )
        ]
      )
    : _vm._e()
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("h2", { staticClass: "photo-detail__title" }, [
      _c("i", { staticClass: "icon ion-md-chatboxes" }),
      _vm._v("Reviews\n        ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "form__button" }, [
      _c(
        "button",
        { staticClass: "button button--inverse", attrs: { type: "submit" } },
        [_vm._v("\n                    レビューを投稿する\n                ")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/PhotoDetail.vue":
/*!********************************************!*\
  !*** ./resources/js/views/PhotoDetail.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PhotoDetail_vue_vue_type_template_id_5ed32b54___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PhotoDetail.vue?vue&type=template&id=5ed32b54& */ "./resources/js/views/PhotoDetail.vue?vue&type=template&id=5ed32b54&");
/* harmony import */ var _PhotoDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PhotoDetail.vue?vue&type=script&lang=js& */ "./resources/js/views/PhotoDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PhotoDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PhotoDetail_vue_vue_type_template_id_5ed32b54___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PhotoDetail_vue_vue_type_template_id_5ed32b54___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/PhotoDetail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/PhotoDetail.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/views/PhotoDetail.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PhotoDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./PhotoDetail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PhotoDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PhotoDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/PhotoDetail.vue?vue&type=template&id=5ed32b54&":
/*!***************************************************************************!*\
  !*** ./resources/js/views/PhotoDetail.vue?vue&type=template&id=5ed32b54& ***!
  \***************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PhotoDetail_vue_vue_type_template_id_5ed32b54___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./PhotoDetail.vue?vue&type=template&id=5ed32b54& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/PhotoDetail.vue?vue&type=template&id=5ed32b54&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PhotoDetail_vue_vue_type_template_id_5ed32b54___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PhotoDetail_vue_vue_type_template_id_5ed32b54___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);