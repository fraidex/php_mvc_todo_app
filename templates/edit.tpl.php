<div class="container">
    <form class="form-create" action="/task/update" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Редактирование задачи</h1>
        <label for="id">ID:</label>
        <input type="text" name="id" class="form-control" value="<?= $data[0]->id ?>" placeholder="ID" required
               autofocus>
        <label for="name">Имя:</label>
        <input type="text" name="name" class="form-control" value="<?= $data[0]->name ?>" placeholder="Имя" required
               autofocus>
        <label for="Email">Email:</label>
        <input type="email" name="email" class="form-control" value="<?= $data[0]->email ?>" placeholder="Email"
               required>
        <label for="description">Описание:</label>
        <textarea name="description" class="form-control" placeholder="Описание"
                  required><?= $data[0]->description ?></textarea>
        <label for="completed">Выполнено:</label>
        <input type="checkbox" name="completed" class="form-check-inline"
               aria-label="Выполнено" <?= $data[0]->completed == 1 ? "checked" : "" ?>><br>
        <button class="btn btn-lg btn-primary fa-pull-right" type="submit">Отправить</button>
    </form>
</div>
