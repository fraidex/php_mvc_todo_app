<?php


class TaskController extends Controller
{
    private $template = '';
    private $isAuth;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->model = new TaskModel();
        $this->view = new View();
        $this->pageData['isAuth'] = $this->checkAuth();
    }

    public function index()
    {
        $this->pageData = $this->model->getTasks();


        $this->view->render($this->template, $this->pageData);
    }

    public function create()
    {
        $this->template = TEMPLATE_PATH . "create.tpl.php";
        if (!empty($_POST)) {
            $data = [
                "name" => $this->xssSec($_POST['name']),
                "email" => $this->xssSec($_POST['email']),
                "description" => $this->xssSec($_POST['description']),
            ];
            $this->model->save($data);
            header("Location: /");
        }
        $this->view->render($this->template, $this->pageData);
    }

    public function edit()
    {
        if ($this->checkAuth()) {
            $this->template = TEMPLATE_PATH . "edit.tpl.php";
            if (!empty($_GET) && isset($_GET['id'])) {
                $result = $this->model->getById($_GET['id']);
                if (!$result) {
                    $this->pageData['error'] = "Ошибка";
                    header("Locetion: /");
                } else {
                    $this->pageData = $result;
                    $_SESSION['description'] = $this->pageData[0]->description;
                    $this->view->render($this->template, $this->pageData);
                }
            }
        } else {
            header("Location: /login");
        }

    }

    public function update()
    {
        if ($this->checkAuth()) {
            if (!empty($_POST)) {
                $data = [
                    'id' => $this->xssSec($_POST['id']),
                    'name' => $this->xssSec($_POST['name']),
                    'email' => $this->xssSec($_POST['email']),
                    'description' => $this->xssSec($_POST['description']),
                ];
                $data['completed'] = isset($_POST['completed']) ? 1 : 0;
                if (isset($_SESSION['description'])) {
                    $data['edited'] = strcmp($_POST['description'], $_SESSION['description']) != 0 ? 1 : 0;
                }
                $this->model->updateById($data);
                header("Location: /");
            }
        } else {
            header("Location: /login");
        }
    }

    public function complete()
    {
        var_dump($_POST);
        if (!empty($_POST) && isset($_POST['id'])) {
            $this->model->updateComplete($_POST['id'], '1');
            header("Location: /");
        }
    }

    public function delete()
    {
        if ($this->checkAuth()) {
            if (!empty($_GET) && isset($_GET['id'])) {
                $result = $this->model->deleteById($_GET['id']);
                header("Location: /");
            }
        } else {
            header("Location: /login");
        }

    }

    public function checkAuth()
    {
        if (!empty($_SESSION) && isset($_SESSION['user'])) {
            return true;
        }
    }
}