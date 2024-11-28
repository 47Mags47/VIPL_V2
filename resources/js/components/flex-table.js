$('.flex-table-box').each(function(){
    let table_box = $(this).find('.table-box')
    let flex = table_box.data('flex') ?? '1 '.repeat(table_box.find('.thead .flex-table-row .cell').length)

    table_box.find('.flex-table-row').each(function(){
        $(this).find('.cell').each(function(i){
            if (flex.split(' ')[i] !== '1') $(this).css('flex', `0 0 ${flex.split(' ')[i]}`)
        })
    })
})
