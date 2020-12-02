<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ToDO</title>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a style="text-decoration: none;" href="/">ToDo</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class='p-2 text-dark' href='/'>Главная</a>
        <a class='p-2 text-dark' href='/task/create/'>Создать</a>
        <?php
        if (!empty($_SESSION) && isset($_SESSION['user'])) {
            echo "<a class='btn btn-outline-danger' href='/login/logout/'>Выйти</a>";
        } else {
            echo "<a class='btn btn-outline-primary' href='/login/'>Войти</a>";
        }
        ?>
    </nav>
</div>
<?= $content ?>
</body>
</html>