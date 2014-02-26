$(document).ready(function(){  
		
	var ss = 'small';
	
	$("img#ssSwitch").click(function() { 
		if(ss == 'small')
		{
			ss = 'med';
			$("link#fontsize").attr("href", '/wp-content/themes/emcc/css/med.css');
        	Cufon.replace('.navi, .newsHeader, .storiesHeader, .storiesFooter');
		}
		else if(ss == 'med')
		{
			ss = 'large';
			$("link#fontsize").attr("href", '/wp-content/themes/emcc/css/large.css');
        	Cufon.replace('.navi, .newsHeader, .storiesHeader, .storiesFooter');
		}
		else if(ss == 'large')
		{
			ss = 'small';
			$("link#fontsize").attr("href", '/wp-content/themes/emcc/css/small.css');
        	Cufon.replace('.navi, .newsHeader, .storiesHeader, .storiesFooter');
		}
	});

// Hover styles on cufon
	$('#suckerfishnav li li').hover(function(){ 
    $('a', this).css({color : '#ffffff', 'background-color' : '#fa9f08'}); 
    Cufon.refresh('#suckerfishnav li li a'); 

	 },function(){ // this is the mouse out 

    $('a', this).css({color : '#fa9f08', 'background-color' : '#ffffff'}); 
    Cufon.refresh('#suckerfishnav li li a'); 
	}); 


		
	$("#memberLogin").click(function() { 
	
		if($("div.loginBox").css('display') == 'none')
		{
			$("div.loginBox").slideDown('fast');
		}
		else if($("div.loginBox").css('display') == 'block')
		{
			$("div.loginBox").slideUp('fast');
		}
		
		$("div.loginBox").find('input[name=log], input[name=pwd]').live('focus', function(){
			if($(this)[0].value == $(this)[0].defaultValue)
			{
				$(this).attr('value', '');
			}
			})
			.live('blur', function(){
			if($(this)[0].value == '')
			{
				$(this).attr('value', $(this)[0].defaultValue);
			}
			});
	
	});  
	//$('.subnaviItem').eq(0).hide();

        if($('.subnaviItem').length && $('.subnaviItem').eq(0).text() == 'Login') {
            $('.subnaviItem').eq(0).hide(); 
        }

	$('.subnaviItem').eq(1).click(function(){
		if($(this).text() !== 'My Account') return;
		showMyAccount();
		return false;
	});
	
	$('.myAccount').live('click', function(e){
		e.preventDefault();
		showMyAccount();
	});

	function showMyAccount(){
		//create overlay
		var overlay = $('<div id="memberOverlay"></div>');
		overlay.appendTo(document.body);
		overlay.css({
			position: 'fixed',
			top: 0,
			left: 0,
			width: '100%',
			height: '100%',
			'background-color': '#333',
			filter: 'alpha(opacity=50)',
			'-moz-opacity': 0.5,
			'-khtml-opacity': 0.5,
			opacity: 0.5,
			'z-index': 1000
		});
		
		var memberModal = $('<div id="memberFrame"><div class="closeFrame">X</div></div>');
		memberModal.css({
			position: 'absolute',
			left: '-475px',
			marginLeft: '50%',
			width: '950px',
			height: '590px',
			padding: '15px',
			top: '40px',
			background: '#fff',
			zIndex: 1001,
			border: '5px solid #bbb',
			cursor: 'pointer'
		});
		memberModal.find('.closeFrame').css({
			position: 'absolute',
			top: '5px',
			right: '5px',
			'font-size': '14px',
			border: '1px solid #eee',
			borderRadius: '3px',
			background: '#fff',
			width: '10px',
			height: '10px',
			padding: '5px 10px 15px 10px',
			fontWeight: 'bold'
			})
			.click(function(){
				memberModal.remove();
				overlay.remove();
			});
		var frameSrc = "https://www5.shocklogic.com/scripts/jmevent/MemberAreaStart.asp?Client_Id=%27EMCC%27&Project_Id=%27EMCC%27&Person_Id=" + personid;
		var memberIframe = $('<iframe style="width:100%; height:590px; border:none" frameBorder="0" src="' + frameSrc + '"></iframe>');
		memberIframe.appendTo(memberModal);
		memberModal.appendTo($('body'));
		
		overlay.click(function(){
			memberModal.remove();
			$(this).remove();
		});
	}
	$('div.badge').mouseenter(function() {
		
		var src = $(this).find('img').attr('src');
		src = src.replace('badge-', 'badgeHigh-');
		
		$(this).find('img').attr('src', src);
						
		var target = $(this).find('img').attr('id');
		
		target = target.replace('badge-', '');
		
		$('div#banner-'+target).fadeIn('fast');
						
	}).mouseleave(function() {
		
		var src = $(this).find('img').attr('src');
		src = src.replace('badgeHigh-', 'badge-');
		
		$(this).find('img').attr('src', src);
		
		var target = $(this).find('img').attr('id');
		
		target = target.replace('badge-', '');
		
		$('div#banner-'+target).fadeOut('fast');
		
	});
	 
   
 });  