<?php

namespace App;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        header("HTTP/1.1 404 Not Found");
        include VIEW_DIR . 'errors.php';
    }
}