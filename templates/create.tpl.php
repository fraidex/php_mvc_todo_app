<div class="container">
    <form name="task_form" class="form-create" onsubmit="return validate()" action="/task/create" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Создание задачи</h1>
        <label for="name">Имя:</label>
        <input id="name" type="text" name="name" class="form-control" placeholder="Имя" required autofocus>
        <label for="email">Email:</label>
        <input id="email "type="email" name="email" class="form-control" placeholder="Email" required>
        <label for="description">Описание:</label>
        <textarea id="description" name="description" class="form-control" placeholder="Описание" required></textarea>
        <button class="btn btn-lg btn-primary fa-pull-right" type="submit">Создать</button>
    </form>
</div>
<script type="text/javascript">
    function validate(){
        let email = document.forms["task_form"]["email"].value;
        if (!email.match(/\w+@\w+\.\w+/)){
            alert("Ошибка проверки email");
            return false;
        }

        let name = document.forms["task_form"]["name"].value;
        if (name.length < 3 || name.length > 20){
            alert("Проверьте длинну имени");
            return false;
        }

        let description = document.forms["task_form"]["description"].value;
        if (description.length < 3 || description.length > 100){
            alert("Проверьте описание задачи");
            return false;
        }

    }
</script>