$(document).ready(function(){
	$(".slider-utama").owlCarousel({
		items:1,
		loop:true,
	});
	$(".slider-produk").owlCarousel({
		items:4,
		margin:10,
		nav:true,
		navContainer:"#letaknavproduk",
		navText:["<a class='btn btn-primary btn-xs'><i class='fa fa-chevron-circle-left'></i></a>","<a class='btn btn-primary btn-xs'><i class='fa fa-chevron-circle-right'></i></a>"],
		dots:false,
		responsiveClass:true,
		responsive:{
			0:{
				items:2,
			},
			600:{
				items:3,
			},
			1000:{
				items:4,
			}
		}
	});
	$(".slider-blog").owlCarousel({
		items:2,
		margin:10,
		nav:true,
		navContainer:"#letaknavblog",
		navText:["<a class='btn btn-primary btn-xs'><i class='fa fa-chevron-circle-left'></i></a>","<a class='btn btn-primary btn-xs'><i class='fa fa-chevron-circle-right'></i></a>"],
		dots:false,
		responsiveClass:true,
	});
	$(".slider-terlaris").owlCarousel({
		items:1,
		nav:true,
		navContainer:"#letaknavterlaris",
		navText:["<a class='btn btn-primary btn-xs'><i class='fa fa-chevron-circle-left'></i></a>","<a class='btn btn-primary btn-xs'><i class='fa fa-chevron-circle-right'></i></a>"],
		responsiveClass:true,
		dots:false,
	});
	$(".slider-testimoni").owlCarousel({
		items:1,
	});

})