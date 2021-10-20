<?php

namespace App;

class View implements Renderable
{
    private string $view;
    private array $data;

    public function __construct($view, $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function render()
    {
        extract($this->data, EXTR_OVERWRITE, "");
        $path = $this->getIncludeTemplate($this->view);
        if (file_exists($path)) {
            include $this->getIncludeTemplate($this->view);
        } else {
            echo '<имя файла шаблона> шаблон не найден';
            throw new ApplicationException();
        }
    }

    private function getIncludeTemplate($view)
    {
        return VIEW_DIR . str_replace('.', '/', $view) . '.php';
    }
}
