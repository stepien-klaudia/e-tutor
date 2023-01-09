/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
$(function () {
  $('a#filter-button').click(function () {
    var form = $('form.sidebar-filter').serialize();
    $.ajax({
      method: "GET",
      url: "http://e-tutor.test/",
      data: form
    }).done(function (response) {
      $('div#announcements-wrapper').empty();
      $.each(response.data, function (index, announcement) {
        var html = '<div class="col-6 col-md-6 col-lg-4 mb-3">\n' + '<div class="card h-100 border-0">\n' + '<div class="card-img-top">\n' + '                                        <img src="https://static.vecteezy.com/system/resources/thumbnails/001/486/411/small/open-book-icon-free-vector.jpg" class="img-fluid mx-auto d-block" alt="Card image cap">\n' + '</div>\n' + '<div class="card-body text-center">\n' + '<h4 class="card-title">\n' + announcement.name + '</h4>\n' + '<h5 class="font-weight-bold text-dark ">\n' + announcement.place + '</h5>\n' + '<h5 class="card-price small text-dark ">\n' + announcement.price + 'zł/godz.' + '</h5>\n' + '</div>\n' + '</div>' + '</div>';
        $('div#announcements-wrapper').append(html);
      });
    }).fail(function () {
      alert("ERROR");
    });
  });
});
/******/ })()
;