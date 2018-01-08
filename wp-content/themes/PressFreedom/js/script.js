jQuery(document).ready(function($){
	// Header search
	$x = 0;
	$('#header-search').click(function() {
		if ($x %2 === 0) {
			$('header .header-wrapper .search').show().animate({'height': '35px'}, 200);
			$x++;
		} else {
			$('header .header-wrapper .search').animate({'height': 0}, 200, function() {
				$('header .header-wrapper .search').hide();
			});
			$x++;
		}
	});
	$('#header-search-mobile').click(function() {
		if ($x %2 === 0) {
			$('header .header-wrapper .search').show().animate({'height': '35px'}, 200);
			$x++;
		} else {
			$('header .header-wrapper .search').animate({'height': 0}, 200, function() {
				$('header .header-wrapper .search').hide();
			});
			$x++;
		}
	});

	// Mobile menu
	$('header .header-wrapper .fa-bars').click(function() {
		$('header .header-wrapper .nav').animate({'margin-left': 0});
	});
	$('header .header-wrapper .nav .fa-times').click(function() {
		$('header .header-wrapper .nav').animate({'margin-left': '-500px'});
	});

	// Toggle homepage changes
	$('#changeToggle').on('click', function() {
		$('.page-wrapper.homepage').toggleClass('updates');
	});

	// Remove empty <p> tags in homepage center column
	$('.center-column p').each(function() {
		if ($(this).is(':empty')) {
			$(this).hide();
	    }
	});
});

// Facebook share button
window.fbAsyncInit = function(){
FB.init({
    appId: 'xxxxx', status: true, cookie: true, xfbml: true }); 
};
(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if(d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; 
    js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
function postToFeed(title, desc, url, image){
var obj = {method: 'feed',link: url, picture: 'http://www.url.com/images/'+image,name: title,description: desc};
function callback(response){}
FB.ui(obj, callback);
}
