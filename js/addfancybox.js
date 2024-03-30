function ShowPopup() {
    $body = $("body");
    $body.addClass("loading");
    $("#discounttrigger").click();
    if ($(".fancybox-wrap").length) {
        $(".fancybox-wrap").css({ "opacity": "1" });
    }
}
function FancyBoxScript(isLanding, isBilling)
{
    $(".fancybox").fancybox({
        helpers: {
            overlay: {
                locked: false
            }
        },
		beforeShow: function() {
			try{
				if($(".fancybox-mobile").length)
					$('.fancybox-iframe').contents().find('body').css('-webkit-text-size-adjust','none');
			}
			catch(e){}
		},
        "padding": 0,
        "autoSize": true
    });
    $("a#discounttrigger").fancybox({
        "closeBtn": false,
        "closeClick": true,
        "afterClose": function () {
            if (isLanding) {
				if (IHS.emptyflvalidate())
				{
					if (IHS.validate())
						submitNoValidation('Registration');
					else {
						document.cookie="https://synageniq.com/syn06/SavePriceAdded=1;path=/";
						initLanding(true);
					}
				}
				else
					submitNoValidation('Registration');
			}
			else if(isBilling)
				submitNoValidation('RedirectBillingSavePrice');
            $body.removeClass("loading");
        }
    });
}
function DeferFancyBox(isLanding, isBilling)
{
    if (typeof jQuery.fancybox == "function") {
        FancyBoxScript(isLanding, isBilling);
    } else {
        setTimeout(function () { DeferFancyBox(isLanding, isBilling) }, 50);
    }
}
function RenderFancyBox(discountImagePath, isLanding, S3URL, isBilling) {
    $("head").append('<link href="' + S3URL + '/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/><link href="' + S3URL + '/fancybox/greyout.css" rel="stylesheet" type="text/css"/><script type="text/javascript" src="' + S3URL + '/fancybox/jquery.fancybox.pack.js"></script>' +
        '<script type="text/javascript">' +
            '$(document).ready(function () {' +
                'DeferFancyBox(' + isLanding + ',' + isBilling + ');' +
            '});' +
        '</script>');
    $("body").append(
		'<div style="display:none">' +
			'<div id="discount">' +
				'<img src=' + discountImagePath + ' alt="coupon" />' +
			'</div>' +
		'</div>' +
		'<a id="discounttrigger" href="#discount" style="display:none"></a>' +
        '<div class="modal"></div>');
};