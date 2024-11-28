$('.dialog-open-button').each(function(){
    $(this).on('click', function(){
        let dialog_id = $(this).data('dialog')
        let dialog = $(`#${dialog_id}`)
        dialog.addClass('open')
    })
})

$('.modal-window #close-button').each(function(){

})

$('.modal-window').each(function(){
    let modal = $(this)

    modal.find('#close-button').on('click', function(){
        modal.removeClass('open')
    })
    modal.on('click', function(e){
        if(e.target === modal[0]) modal.removeClass('open')
    })

})
