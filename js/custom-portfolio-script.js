jQuery(document).ready(function($) {
    // AJAX filter
    $('.portfolio-filter a').click(function() {
        var filter = $(this).data('filter');

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'filter_portfolio',
                filter: filter
            },
            success: function(response) {
                $('#portfolio-grid').html(response);
            }
        });

        return false;
    });
});
