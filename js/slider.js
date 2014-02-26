$(document).ready(function(){  
						   
	//Init
	var currentSlide = 0;
	var numSlides = banners.length;
	var container = 1;
				
	function setSlide(newSlide)
	{
		$('div.bannerInner'+container).fadeOut('slow');		
		
		if(container == 1)
			container = 2;
		else
			container = 1;
			
		var content = '';
		content += '<img src="'+banners[newSlide][0]+'" alt="'+banners[newSlide][1]+'" />';
			
		$('div.bannerInner'+container).html(content).fadeIn('slow');
	}
	
	setSlide(currentSlide);
	
	
	window.setInterval(function() {
		
		if((currentSlide + 1) < numSlides)			
			currentSlide++;
		else
			currentSlide = 0;
			
		setSlide(currentSlide);
	 
	}, 7500);
	
});