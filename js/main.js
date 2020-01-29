$('#editNoteForm-checkbox').change(function () {
    $(this).parent().toggleClass('btn-success');
    $(this).parent().toggleClass('btn-secondary');
    $(this).parent().find('span').text( $('#editNoteForm-checkbox').prop("checked") ? 'ВЫПОЛНЕНО' : 'НЕ ВЫПОЛНЕНО' );
});

$('.note-edit').click(function() {
    let parent = $(this).parents()[3];
    $('#editNoteForm-id').attr('value', $(parent).attr("note-id"));
    
    let description = $(parent).find('.note-description').text();
    $('#editNote').find('textarea').text(description);

    let status = $(parent).find('.note-status');
    if ($(status).attr('note-status') == 0) {
        $('#editNoteForm-checkbox').parent().removeClass('btn-success');
        $('#editNoteForm-checkbox').parent().addClass('btn-secondary');
        $('#editNoteForm-checkbox').parent().find('span').text('НЕ ВЫПОЛНЕНО');
        $('#editNoteForm-checkbox').prop("checked", false);
    } else {
        $('#editNoteForm-checkbox').parent().addClass('btn-success');
        $('#editNoteForm-checkbox').parent().removeClass('btn-secondary');
        $('#editNoteForm-checkbox').parent().find('span').text('ВЫПОЛНЕНО');
        $('#editNoteForm-checkbox').prop("checked", true);
    }
});