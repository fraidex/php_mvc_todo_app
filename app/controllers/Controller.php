<?php


class Controller
{
    public $model;
    public $view;
    protected $pageData;
    private $template;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }

    public function xssSec($data)
    {
        $data = strip_tags($data);
        $data = htmlentities($data, ENT_QUOTES, "UTF-8");
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }

    public function emailCheck($data){
        if (!preg_match("/[0-9a-z]+@[a-z]/", $data)) {
            return false;
        }
    }

}