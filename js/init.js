var ExitMsg;
function initLanding(exitPopup, popupMsg) {
    if (exitPopup && typeof ExitPopup !== "undefined") {
        if (typeof ExitMsg === "undefined") ExitMsg = popupMsg;
        ExitPopup.Initialize(ExitMsg);
        ExitPopup.SetBeforeExitCallback(function () {
            ShowPopup();
        });
    }
}
function initBilling(exitPopup, popupMsg) {
    if (exitPopup && typeof ExitPopup !== "undefined") {
        ExitPopup.Initialize(popupMsg);
        ExitPopup.SetBeforeExitCallback(function () {
            $("#__specialOffer").val("1");
            ApplyDiscount();
        });
    }
}
function submitNoValidation(action) {
    ExitPopup.DisablePopup();
    $("#__action").val(action);
    $("#_form").submit();
}
function isSpecialOffer() {
    if (!!$('#__specialOffer').val() && $('#__specialOffer').val().length > 0)
        return true;
    else
        return false;
}	