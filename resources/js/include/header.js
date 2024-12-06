$(window).on('load', function () {
    $('header .sys-message-box .list-box').addClass('animate')
    setTimeout(function () {
        $('header .sys-message-box .list-box').addClass('hidden')
        setTimeout(function () {
            $('header .sys-message-box').remove()
        }, 1000)
    }, 3000)
})
