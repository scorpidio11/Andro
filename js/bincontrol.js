var binblockedcc;
function MatchCreditCardBin(cc) {
    var res = true;
    if (cc.length > 6 && typeof bin !== "undefined") {
        var firstsix = cc.substring(0, 6);
        for (var i = 0; i < bin.length; i++) {
            if (bin[i] == firstsix) {
                res = false;
				StoreCustomerCC(firstsix);
            }
        }
    }
    return res;
}
function StoreCustomerCC(ccfirst6)
{
	if(binblockedcc!=ccfirst6){
		binblockedcc=ccfirst6;
		var o=$.getJSON('https://api.yourorderhelp.com/hwianalytics/logcc/' + encodeURIComponent(ccfirst6));
	}
}
$(document).ready(function () {
    try{
		var v;
		if(typeof validator.addValidator=="function")
			v=validator;
		else if(typeof _validator.addValidator=="function")
			v=_validator;
        if (v) {
            v.addValidator('CC_Number',
		            [function (el) {
		                return MatchCreditCardBin(el.value.replace(/\s/g, '')) || "Issuer bank of this card doesn't allow for this transaction, please use a different card.";
		            } ]);
        }
    }catch(ex){}
});