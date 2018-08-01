// these functions work on all pages!

// scroll to div
function scrollToId () {
    
    var $target;
    var $distance;

    $('.js-scrollToId').on('click', function(e){

        e.preventDefault();
        $target = $(this).attr('js-target');
        $distance = $($target).offset().top;

        $('html, body').animate({
            scrollTop: $distance
        }, 1000);

    })
}

function activeModal () {

    var $target;
    $('.js-activeModal').on('click', function(){

        $target = $(this).attr('js-target');

        $($target).addClass('c-modal--active');
    });

    $('.js-closeModal').on('click', function(){

        $('.c-modal').removeClass('c-modal--active');
    })
}
