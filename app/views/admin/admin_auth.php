<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="border rounded bg-light shadow-sm pt-3 pb-2" style="width: 300px;">
        <div class="container">
            <h3 class="text-muted text-center pt-2 pb-2">АВТОРИЗАЦИЯ</h3>
            <form action="/admin" method="post">
                <div class="form-group d-flex flex-column justify-content-between" style="height: 130px">
                    <input type="text" name="action" value="admin_auth" hidden>
                    <input type="text" name="username" class="form-control" placeholder="Логин" autofocus required>
                    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                    <input type="submit" class="form-control btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>