<div class="container mb-3 mt-4 pt-4 pb-3">
    <div class="row">
        <div class="col-4">
            <?php 
                if (isset($data['filters'])) {
                    ?>
                    <a class="btn btn-danger btn-lg float-left" href="/">← Сбросить фильтр</a>
                    <?php
                }
            ?>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <button type="button" class="btn btn-primary btn-lg float-center" data-toggle="modal" data-target="#addNote">Добавить заметку</button>
        </div>
        <div class="col-4">
            <a class="btn btn-secondary btn-lg float-right" href="/admin">Панель управления</a>
        </div>
    </div>
</div>
<div class="container mb-5">
    <?php include $content_view['list']; ?>
</div>

<?php include $content_view['pagination']; ?>
<?php include $content_view['modal_from']; ?>