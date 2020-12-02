<?php


class LoginController extends Controller
{
    private $template = TEMPLATE_PATH . "login.tpl.php";

    public function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new View();
    }

    public function index()
    {
        if (!empty($_POST)) {
            if (!$this->login()) {
                $this->pageData['error'] = "Неправильное имя пользователя или пароль";
            }
        }
        $this->view->render($this->template, $this->pageData);
    }

    public function login()
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
        if ($this->model->checkUser($name, md5($password))) {
            return true;
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
}