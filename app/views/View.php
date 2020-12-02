<?php


class View
{
    public function render($template, $data = [])
    {
//        extract($data);
        ob_start();
        require $template;
        $content = ob_get_clean();
        include TEMPLATE_LAYOUT;
    }
}