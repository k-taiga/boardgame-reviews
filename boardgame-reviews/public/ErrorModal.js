(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["ErrorModal"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/errors/ErrorModal.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/errors/ErrorModal.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _util__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../util */ "./resources/js/util.js");
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
  name: "bd-error-modal",
  data: function data() {
    return {
      message: null,
      active: true
    };
  },
  props: {
    code: {
      type: String,
      required: true
    }
  },
  computed: {
    errorCode: function errorCode() {
      if (this.code === _util__WEBPACK_IMPORTED_MODULE_0__["INTERNAL_SERVER_ERROR"]) {
        this.message = "システムエラーが発生しました。";
      } else if (this.code === _util__WEBPACK_IMPORTED_MODULE_0__["UNAUTHORIZED"]) {
        this.message = "システムエラーが発生しました。";
      } else if (this.code === _util__WEBPACK_IMPORTED_MODULE_0__["NOT_FOUND"]) {
        this.message = "お探しのページが見つかりません。";
      }
    }
  },
  methods: {
    closeErrorModal: function closeErrorModal() {
      this.active = false;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/errors/ErrorModal.vue?vue&type=template&id=5969875a&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/errors/ErrorModal.vue?vue&type=template&id=5969875a& ***!
  \***************************************************************************************************************************************************************************************************************/
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
    { staticClass: "modal", class: { "is-active": this.active } },
    [
      _c("div", {
        staticClass: "modal-background",
        on: { click: _vm.closeErrorModal }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "modal-content" }, [
        _c("div", { staticClass: "notification is-warning" }, [
          _c("button", {
            staticClass: "delete",
            attrs: { "aria-label": "close" },
            on: { click: _vm.closeErrorModal }
          }),
          _vm._v("\n            " + _vm._s(this.message) + "\n        ")
        ])
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/errors/ErrorModal.vue":
/*!**************************************************!*\
  !*** ./resources/js/views/errors/ErrorModal.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ErrorModal_vue_vue_type_template_id_5969875a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ErrorModal.vue?vue&type=template&id=5969875a& */ "./resources/js/views/errors/ErrorModal.vue?vue&type=template&id=5969875a&");
/* harmony import */ var _ErrorModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ErrorModal.vue?vue&type=script&lang=js& */ "./resources/js/views/errors/ErrorModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ErrorModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ErrorModal_vue_vue_type_template_id_5969875a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ErrorModal_vue_vue_type_template_id_5969875a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/errors/ErrorModal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/errors/ErrorModal.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/views/errors/ErrorModal.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ErrorModal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/errors/ErrorModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/errors/ErrorModal.vue?vue&type=template&id=5969875a&":
/*!*********************************************************************************!*\
  !*** ./resources/js/views/errors/ErrorModal.vue?vue&type=template&id=5969875a& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorModal_vue_vue_type_template_id_5969875a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ErrorModal.vue?vue&type=template&id=5969875a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/errors/ErrorModal.vue?vue&type=template&id=5969875a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorModal_vue_vue_type_template_id_5969875a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ErrorModal_vue_vue_type_template_id_5969875a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);