/*
  @por Franco Salcedo {zentido}
*/
$(document).ready(function(){
  $(".button-collapse").sideNav();
  $(".dropdown-button").dropdown();

  $(".search").on("click", function(){
    $("#search").show();
    $(".all_nav").hide();
    $(".search_input").focus();

    var fireSearch = function (){
      $("#search").hide();
      $(".all_nav").show();
    }
    $(".search_close").on("click", fireSearch);
    $(".search_input").focusout(fireSearch);

  });


});
