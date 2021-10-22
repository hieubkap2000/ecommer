/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/admin/NewsLetter.js":
/*!******************************************!*\
  !*** ./resources/js/admin/NewsLetter.js ***!
  \******************************************/
/***/ (() => {

eval("$(function () {\n  var url = \"newsletter/getAll\";\n  var columns = [{\n    data: \"DT_RowIndex\"\n  }, {\n    data: \"email\"\n  }, {\n    data: \"detele\"\n  }];\n  initDatatables(url, columns);\n});\n\nwindow.delele = function (id) {\n  Swal.fire({\n    title: \"Bạn có muốn xóa email này không?\",\n    text: \"Bạn sẽ không thể khôi phục lại.\",\n    icon: \"warning\",\n    showCancelButton: true,\n    confirmButtonColor: \"#3085d6\",\n    cancelButtonColor: \"#d33\",\n    confirmButtonText: \"Xóa email\",\n    cancelButtonText: \"Hủy\"\n  }).then(function (result) {\n    if (result.isConfirmed) {\n      $.ajax({\n        url: \"newsletter/delete/\".concat(id),\n        type: \"GET\",\n        success: function success(data) {\n          $(\"#example1\").dataTable().api().ajax.reload();\n          Swal.fire(\"Đã xóa!\", \"Xóa email thành công!\", \"success\");\n        },\n        error: function error() {\n          toastr[\"error\"](\"Xóa email không thành công!\");\n        }\n      });\n    }\n  });\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vTmV3c0xldHRlci5qcz8zMTA5Il0sIm5hbWVzIjpbIiQiLCJ1cmwiLCJjb2x1bW5zIiwiZGF0YSIsImluaXREYXRhdGFibGVzIiwid2luZG93IiwiZGVsZWxlIiwiaWQiLCJTd2FsIiwiZmlyZSIsInRpdGxlIiwidGV4dCIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvbkNvbG9yIiwiY2FuY2VsQnV0dG9uQ29sb3IiLCJjb25maXJtQnV0dG9uVGV4dCIsImNhbmNlbEJ1dHRvblRleHQiLCJ0aGVuIiwicmVzdWx0IiwiaXNDb25maXJtZWQiLCJhamF4IiwidHlwZSIsInN1Y2Nlc3MiLCJkYXRhVGFibGUiLCJhcGkiLCJyZWxvYWQiLCJlcnJvciIsInRvYXN0ciJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFZO0FBQ1YsTUFBSUMsR0FBRyxHQUFHLG1CQUFWO0FBQ0EsTUFBSUMsT0FBTyxHQUFHLENBQ1Y7QUFBRUMsSUFBQUEsSUFBSSxFQUFFO0FBQVIsR0FEVSxFQUVWO0FBQUVBLElBQUFBLElBQUksRUFBRTtBQUFSLEdBRlUsRUFHVjtBQUFFQSxJQUFBQSxJQUFJLEVBQUU7QUFBUixHQUhVLENBQWQ7QUFLQUMsRUFBQUEsY0FBYyxDQUFDSCxHQUFELEVBQU1DLE9BQU4sQ0FBZDtBQUNILENBUkEsQ0FBRDs7QUFXQUcsTUFBTSxDQUFDQyxNQUFQLEdBQWdCLFVBQUNDLEVBQUQsRUFBUTtBQUNwQkMsRUFBQUEsSUFBSSxDQUFDQyxJQUFMLENBQVU7QUFDTkMsSUFBQUEsS0FBSyxFQUFFLGtDQUREO0FBRU5DLElBQUFBLElBQUksRUFBRSxpQ0FGQTtBQUdOQyxJQUFBQSxJQUFJLEVBQUUsU0FIQTtBQUlOQyxJQUFBQSxnQkFBZ0IsRUFBRSxJQUpaO0FBS05DLElBQUFBLGtCQUFrQixFQUFFLFNBTGQ7QUFNTkMsSUFBQUEsaUJBQWlCLEVBQUUsTUFOYjtBQU9OQyxJQUFBQSxpQkFBaUIsRUFBRSxXQVBiO0FBUU5DLElBQUFBLGdCQUFnQixFQUFFO0FBUlosR0FBVixFQVNHQyxJQVRILENBU1EsVUFBQ0MsTUFBRCxFQUFZO0FBQ2hCLFFBQUlBLE1BQU0sQ0FBQ0MsV0FBWCxFQUF3QjtBQUNwQnBCLE1BQUFBLENBQUMsQ0FBQ3FCLElBQUYsQ0FBTztBQUNIcEIsUUFBQUEsR0FBRyw4QkFBdUJNLEVBQXZCLENBREE7QUFFSGUsUUFBQUEsSUFBSSxFQUFFLEtBRkg7QUFHSEMsUUFBQUEsT0FBTyxFQUFFLGlCQUFVcEIsSUFBVixFQUFnQjtBQUNyQkgsVUFBQUEsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFld0IsU0FBZixHQUEyQkMsR0FBM0IsR0FBaUNKLElBQWpDLENBQXNDSyxNQUF0QztBQUNBbEIsVUFBQUEsSUFBSSxDQUFDQyxJQUFMLENBQVUsU0FBVixFQUFxQix1QkFBckIsRUFBOEMsU0FBOUM7QUFDSCxTQU5FO0FBT0hrQixRQUFBQSxLQUFLLEVBQUUsaUJBQVk7QUFDZkMsVUFBQUEsTUFBTSxDQUFDLE9BQUQsQ0FBTixDQUFnQiw2QkFBaEI7QUFDSDtBQVRFLE9BQVA7QUFXSDtBQUNKLEdBdkJEO0FBd0JILENBekJEIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XG4gICAgdmFyIHVybCA9IFwibmV3c2xldHRlci9nZXRBbGxcIjtcbiAgICB2YXIgY29sdW1ucyA9IFtcbiAgICAgICAgeyBkYXRhOiBcIkRUX1Jvd0luZGV4XCIgfSxcbiAgICAgICAgeyBkYXRhOiBcImVtYWlsXCIgfSxcbiAgICAgICAgeyBkYXRhOiBcImRldGVsZVwiIH0sXG4gICAgXTtcbiAgICBpbml0RGF0YXRhYmxlcyh1cmwsIGNvbHVtbnMpO1xufSk7XG5cblxud2luZG93LmRlbGVsZSA9IChpZCkgPT4ge1xuICAgIFN3YWwuZmlyZSh7XG4gICAgICAgIHRpdGxlOiBcIkLhuqFuIGPDsyBtdeG7kW4geMOzYSBlbWFpbCBuw6B5IGtow7RuZz9cIixcbiAgICAgICAgdGV4dDogXCJC4bqhbiBz4bq9IGtow7RuZyB0aOG7gyBraMO0aSBwaOG7pWMgbOG6oWkuXCIsXG4gICAgICAgIGljb246IFwid2FybmluZ1wiLFxuICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICBjb25maXJtQnV0dG9uQ29sb3I6IFwiIzMwODVkNlwiLFxuICAgICAgICBjYW5jZWxCdXR0b25Db2xvcjogXCIjZDMzXCIsXG4gICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIljDs2EgZW1haWxcIixcbiAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogXCJI4buneVwiLFxuICAgIH0pLnRoZW4oKHJlc3VsdCkgPT4ge1xuICAgICAgICBpZiAocmVzdWx0LmlzQ29uZmlybWVkKSB7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHVybDogYG5ld3NsZXR0ZXIvZGVsZXRlLyR7aWR9YCxcbiAgICAgICAgICAgICAgICB0eXBlOiBcIkdFVFwiLFxuICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAgICAgICAgICQoXCIjZXhhbXBsZTFcIikuZGF0YVRhYmxlKCkuYXBpKCkuYWpheC5yZWxvYWQoKTtcbiAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKFwixJDDoyB4w7NhIVwiLCBcIljDs2EgZW1haWwgdGjDoG5oIGPDtG5nIVwiLCBcInN1Y2Nlc3NcIik7XG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICB0b2FzdHJbXCJlcnJvclwiXShcIljDs2EgZW1haWwga2jDtG5nIHRow6BuaCBjw7RuZyFcIik7XG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfSk7XG59O1xuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hZG1pbi9OZXdzTGV0dGVyLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/admin/NewsLetter.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/admin/NewsLetter.js"]();
/******/ 	
/******/ })()
;