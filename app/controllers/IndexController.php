<?php


class IndexController extends Controller
{
    private $template = TEMPLATE_PATH . 'index.tpl.php';

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
    }

    public function index()
    {
        $fields = [
            "id" => "id",
            "name" => "name",
            "email" => "email",
            "description" => "description",
        ];
        $directions = [
            "ASC" => "ASC",
            "DESC" => "DESC"
        ];
        $orderBy = $fields['id'] . " " . $directions['DESC'];
        $page = 1;
        $rows = PAGINATE_ROWS;
        $startIndex = ($page - 1) * $rows;
        if (empty($_POST) && isset($_SESSION['field']) && isset($_SESSION['direction'])) {
            if (!empty($_GET) && isset($_GET['page'])) {
                $page = (int)$_GET['page'];
                $startIndex = ($page - 1) * $rows;
            }
            if (key_exists($_SESSION['field'], $fields) && key_exists($_SESSION['direction'], $directions)) {
                $orderBy = $_SESSION['field'] . " " . $_SESSION['direction'];
            }

            $this->pageData = $this->model->getTasks($orderBy, $startIndex, $rows);
        }
        if (!empty($_POST) && isset($_POST['field']) && isset($_POST['direction'])) {
            if (key_exists($_POST['field'], $fields) && key_exists($_POST['direction'], $directions)) {
                $orderBy = $_POST['field'] . " " . $_POST['direction'];
                $_SESSION['field'] = $_POST['field'];
                $_SESSION['direction'] = $_POST['direction'];
            }
            if (!empty($_GET) && isset($_GET['page'])) {
                $page = (int)$_GET['page'];
                $startIndex = ($page - 1) * $rows;
            }
            $this->pageData = $this->model->getTasks($orderBy, $startIndex, $rows);

        } elseif (!isset($_SESSION['field']) && !isset($_SESSION['direction'])) {
            $_SESSION['field'] = $fields['id'];
            $_SESSION['direction'] = $directions['DESC'];
            $this->pageData = $this->model->getTasks($orderBy, $startIndex, $rows);
            $_SESSION['field'] = "id";
        }

        $pages = ceil((count($this->model->getAllTasks()) / PAGINATE_ROWS));
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'] - 1;
        }

        $this->view->render($this->template, ['data' => $this->pageData, 'pages' => $pages, 'page' => $page]);
    }


    public function checkAuth()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
    }
}