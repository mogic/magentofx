var $jq = jQuery.noConflict();
//console.log($jq);

$jq(document).ready(function(){
	//console.log($jq('.fxtooltip'));
	//$jq('.fxtooltip').tooltip();
	$jq('.fxpopover').popover(
			{
		content: $jq('#popoverContent').html()
	}
			);
	//Add Hover effect to menus
	//alert($jq('ul.nav li.dropdown'));
	$jq('ul.nav li.dropdown').hover(function() {
		if ($jq(this).find('a').hasClass('current') === false) {
			$jq(this).find('a').addClass('current');
		}
		$jq(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn();
	}, function() {
		$jq(this).find('a').removeClass('current');
		$jq(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut();
	});
});
