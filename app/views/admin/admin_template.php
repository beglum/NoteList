<div class="container mb-3 mt-4 pt-4 pb-3">
    <div class="row">
        <div class="col-4">
            <?php 
                if (isset($data['filters'])) {
                    ?>
                    <a class="btn btn-danger btn-lg float-left" href="/admin">← Сбросить фильтр</a>
                    <?php
                }
            ?>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <h3>Панель администратора</h3>
        </div>
        <div class="col-4">
            <a class="btn btn-secondary btn-lg float-right" href="/admin/exit">Выйти</a>
        </div>
    </div>
</div>
<div class="container mb-5">
    <?php include $content_view['list']; ?>
</div>

<?php include $content_view['pagination']; ?>
<?php include $content_view['modal_form']; ?>