<div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="addNoteLabel" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить заметку</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="/" method="post">
                        <input type="text" name="action" value="note_add" hidden>
                        <div class="form-group">
                            <label for="addNoteForm-name">Имя</label>
                            <input type="text" name="name" class="form-control" id="addNoteForm-name" required maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="addNoteForm-email">Электронная почта</label>
                            <input type="email" name="email" class="form-control" id="addNoteForm-email" required maxlength="30">
                        </div>
                        <div class="form-group mb-4">
                            <label for="addNoteForm-note">Имя</label>
                            <textarea name="note" class="form-control" id="addNoteForm-note" cols="30" rows="10" required maxlength="1000"></textarea>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                            <input type="submit" class="btn btn-primary" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>