$(document).ready(function() {
    
    //$('#memberModal').css({'margin-top: function'});
    // MEMBER DESCRIPTION
    $('.member-info').click(function() {
        $('#memberModal .modal-content #member-name')
            .text($(this).parent('.team-member')
            .find('.member-name').text());
        $('#memberModal .modal-content #member-desc')
            .text($(this).parent('.team-member')
            .find('.member-description p').text());
    });
    
    $(".modal#memberModal").on("shown.bs.modal", function() {
        var modalDialog = $(this).find(".modal-dialog");
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    });
    
    
});

