$(document).ready(function() {
    $(document).on("click", ".profile-link", function(event) {
        event.preventDefault();
        let profileBox = $('.list-profile');
        if (!profileBox.hasClass("show")) {
            profileBox.addClass("show");
        } else {
            profileBox.removeClass("show");
        }
    });
});
