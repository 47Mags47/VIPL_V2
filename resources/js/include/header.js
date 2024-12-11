$(window).on('load', function () {
    $('header .sys-alert-box .list-box li').each(function (i, item) {
        let li_transition = $(item).css('transition').replace('s', '') * 1000

        setTimeout(() => {
            $(item).addClass('open')
            setTimeout(() => {
                $(item).addClass('close')
                setTimeout(() => {
                    $(item).remove()
                }, li_transition);
            }, li_transition * 10 / 2);
        }, i * 500);
    })
})
