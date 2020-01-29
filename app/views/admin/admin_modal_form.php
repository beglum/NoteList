<div class="modal fade" id="editNote" tabindex="-1" role="dialog" aria-labelledby="editNoteLabel" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNoteLabel">Изменить заметку</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="/admin" method="post">
                        <input type="text" name="action" value="note_edit" hidden>
                        <input id="editNoteForm-id" type="text" name="id" value="0" hidden>
                        <div class="form-group">
                            <textarea name="note" class="form-control" id="editNoteForm-note" cols="30" rows="10" required maxlength="1000"></textarea>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <label class="btn btn-secondary" style="box-shadow: none;">
                                <input type="checkbox" name="status" id="editNoteForm-checkbox" hidden>
                                <span>НЕ ВЫПОЛНЕНО</span>
                            </label>
                            <input type="submit" class="btn btn-primary" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>