$(document).ready(function() {




  // GLOBAL NAVI
	$(".icon-search a").on("click", function(){
		$("#navi-search").slideToggle();
		$("#navi-search input:text:visible:first").focus();
		$("#navi-tags, #navi-archive").slideUp();
		$(".icon-tags a, .icon-archive a").removeClass("active");
		$(this).toggleClass("active");
	});

	$(".icon-tags a").on("click", function(){
		$("#navi-tags").slideToggle();
		$("#navi-search, #navi-archive").slideUp();
		$(".icon-search a, .icon-archive a").removeClass("active");
		$(this).toggleClass("active");
	});

	$(".icon-archive a").on("click", function(){
		$("#navi-archive").slideToggle();
		$("#navi-search, #navi-tags").slideUp();
		$(".icon-search a, .icon-tags a").removeClass("active");
		$(this).toggleClass("active");
	});




	// MOBILE NAVI
	$("#nav").mmenu({

	});

	$(".navi-link").on("click", function(){
		$("#navi-search").slideUp();
		$(".icon-search a").removeClass("active");
	});




	// PHOTO MASONRY
  if(typeof Masonry != 'undefined'){
  	var container = document.querySelector("#photo-grid");
  	var msnry = new Masonry( container, {
    	"isFitWidth": true,
    	"gutter": 30,
    	itemSelector: ".item"
  	});
  }





});
