$(document).ready(function() {
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
});
