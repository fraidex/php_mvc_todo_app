<div class="container">
    <table class="table text-center">
        <thead class = "thead-light">
        <tr>
            <th scope="col"
                class="<?= isset($_SESSION['field']) && $_SESSION['field'] == "name" ? "table-active" : "" ?>">
                <form action="" method="post">
                    <a style="text-decoration: none;" href="#" onclick="parentNode.submit();">Имя</a>
                    <input type="hidden" name="field" value="name"/>
                    <input type="hidden" name="direction"
                           value="<?= isset($_SESSION['direction']) && $_SESSION['direction'] == "DESC" ? "ASC" : "DESC" ?>"/>
                </form>
            </th>
            <th scope="col"
                class="<?= isset($_SESSION['field']) && $_SESSION['field'] == "email" ? "table-active" : "" ?>">
                <form action="" method="post">
                    <a style="text-decoration: none;" href="#" onclick="parentNode.submit();">Email</a>
                    <input type="hidden" name="field" value="email"/>
                    <input type="hidden" name="direction"
                           value="<?= isset($_SESSION['direction']) && $_SESSION['direction'] == "DESC" ? "ASC" : "DESC" ?>"/>
                </form>
            </th>
            <th scope="col"
                class="<?= isset($_SESSION['field']) && $_SESSION['field'] == "description" ? "table-active" : "" ?>">
                <form action="" method="post">
                    <a style="text-decoration: none;" href="#" onclick="parentNode.submit();">Описание</a>
                    <input type="hidden" name="field" value="description"/>
                    <input type="hidden" name="direction"
                           value="<?= isset($_SESSION['direction']) && $_SESSION['direction'] == "DESC" ? "ASC" : "DESC" ?>"/>
                </form>
            </th>
            <th scope="col"
                class="<?= isset($_SESSION['field']) && $_SESSION['field'] == "completed" ? "table-active" : "" ?>">
                <form action="" method="post">
                    <a style="text-decoration: none;" href="#" onclick="parentNode.submit();">Статус</a>
                    <input type="hidden" name="field" value="completed"/>
                    <input type="hidden" name="direction"
                           value="<?= isset($_SESSION['direction']) && $_SESSION['direction'] == "DESC" ? "ASC" : "DESC" ?>"/>
                </form>
            </th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['data'] as $task): ?>
            <tr>
                <td><?= $task->name ?></td>
                <td><?= $task->email ?></td>
                <td><?= $task->description ?></td>
                <td>
                    <?= $task->completed == 1 ? "Выполнено</br>" : "Не выполнено</br>" ?>
                    <?= $task->edited == 1 ? "Редактровано администратором" : "" ?>
                </td>
                <td>
                    <?php
                    if (!$task->completed) {
                        echo "<form action='/task/complete' method='post'>
                    <a class='btn btn-outline-success' href='#' onclick='parentNode.submit();'>
                        <input type='hidden' name='id' value='$task->id'/>
                        <i class='fa fa-check' aria-hidden='true'></i>
                        </a>
                        
                </form>";
                    }

                    if (!empty($_SESSION) && isset($_SESSION['user'])) {
                        echo "<a class='btn btn-outline-warning' href='/task/edit?id=$task->id'>
                                   <i class='fa fa-pencil' aria-hidden='true'></i>
                              </a>";
                        echo "<a class='btn btn-outline-danger' href='javascript: confirmDelete($task->id)'>
                                   <i class='fa fa-trash' aria-hidden='true'></i>
                              </a>";
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <ul class="pagination">
        <?php
        //    if($data['page']!=1) {
        //        $prev = $data['page']-1;
        //        echo "<li class='page-item'><a class='page-link' href='?page={$prev}'>Предыдущая</a></li>";
        //    }
        ?>
        <?php
        for ($i = 1; $i <= $data['pages']; $i++) {
            echo "<li class='page-item'><a class='page-link' href='?page={$i}'>{$i}</a></li>";
        }
        ?>
        <?php
        //    if($data['page']<$data['pages']) {
        //        $next = $data['page']+1;
        //        echo "<li class='page-item'><a class='page-link' href='?page={$next}'>Следующая</a></li>";
        //    }
        ?>
    </ul>
</div>
<script type="text/javascript">
    function confirmDelete(id){
        if(confirm('Выв действительно хотите удалить задачу?')){
            window.location.href = '/task/delete?id='+id
        }
    }
</script>

