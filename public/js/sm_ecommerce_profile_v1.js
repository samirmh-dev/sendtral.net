"use strict";
var sm_ecommerce_profile_v1 = function () {
    "use strict";

    $('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
        var $old_tab = $($(e.target).attr("href"));
        var $new_tab = $($(e.relatedTarget).attr("href"));

        if ($new_tab.index() < $old_tab.index()) {
            $old_tab.css('position', 'relative').css("right", "0").show();
            $old_tab.animate({"right": "-100%"}, 150, function () {
                $old_tab.css("right", 0).removeAttr("style");
            });
        }
        else {
            $old_tab.css('position', 'relative').css("left", "0").show();
            $old_tab.animate({"left": "-100%"}, 150, function () {
                $old_tab.css("left", 0).removeAttr("style");
            });
        }
    });

    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $new_tab = $($(e.target).attr("href"));
        var $old_tab = $($(e.relatedTarget).attr("href"));

        if ($new_tab.index() > $old_tab.index()) {
            $new_tab.css('position', 'relative').css("right", "-2500px");
            $new_tab.animate({"right": "0"}, 300);
        }
        else {
            $new_tab.css('position', 'relative').css("left", "-2500px");
            $new_tab.animate({"left": "0"}, 300);
        }
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // your code on active tab shown
    });

    $(".open_login_modal").on("click", function () {
        $('#login_modal').modal('toggle')
    });

    var card = new Card({
        form     : '.interactive-credit-card',
        container: '.card-wrapper',
    });

    $("#giftcardvalue").on("change", function () {
        $("#giftval").text($(this).val());
    });

    $("#current_password")._placeholder([ 'Current Password...' ], false);
    $("#new_password")._placeholder([ 'New Password...' ], false);
    $("#confirm_password")._placeholder([ 'Confirm Password...' ], false);


};
var eProfile = function () {
    "use strict";
    return {
        init: function () {
            sm_ecommerce_profile_v1();
        }
    }
}();
$(function () {
    eProfile.init();
});