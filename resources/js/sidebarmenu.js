// resources/js/sidebarmenu.js

export default function initSidebarMenu() {
  const $ = window.$;
  if (!$) return console.error("jQuery not loaded in sidebarmenu.js");

  "use strict";

  const url = window.location.href;
  const path = url.replace(window.location.origin + "/", "");

  const element = $("ul#sidebarnav a").filter(function () {
    return this.href === url || this.href === path;
  });

  element.parentsUntil(".sidebar-nav").each(function () {
    if ($(this).is("li") && $(this).children("a").length !== 0) {
      $(this).children("a").addClass("active");
      if ($(this).parent("ul#sidebarnav").length === 0) {
        $(this).addClass("active");
      } else {
        $(this).addClass("selected");
      }
    } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
      $(this).addClass("selected");
    } else if ($(this).is("ul")) {
      $(this).addClass("in");
    }
  });

  element.addClass("active");

  $("#sidebarnav a").on("click", function (e) {
    if (!$(this).hasClass("active")) {
      $("ul", $(this).parents("ul:first")).removeClass("in");
      $("a", $(this).parents("ul:first")).removeClass("active");
      $(this).next("ul").addClass("in");
      $(this).addClass("active");
    } else {
      $(this).removeClass("active");
      $(this).parents("ul:first").removeClass("active");
      $(this).next("ul").removeClass("in");
    }
  });

  $("#sidebarnav > li > a.has-arrow").on("click", function (e) {
    e.preventDefault();
  });
}
