//had l file dyal scriptat li mdkhel f html
	$(function(){
       $('.owl-carousel').owlCarousel({
		items:4,
		loop:true,
		margin:15,
		autoplay:true,
		autoplayTimeout:3000, //3 Second
		nav:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:true
			},
			1000:{
				items:4,
				nav:true
			}
		}

	});
	});
