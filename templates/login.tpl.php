<div class="container">
    <form class="form-signin" action="" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
        <?= isset($data['error']) ? $data['error'] : ""?>
        <input type="text" name="name" id="inputName" class="form-control" placeholder="Имя" required autofocus>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
</div>

<style>
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
</style>