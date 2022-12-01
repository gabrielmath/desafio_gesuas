<?php

namespace Source\Core;

use Source\Support\Message;

class Controller
{
    protected View $view;
    protected Message $message;

    /**
     * Controller constructor.
     * @param string|null $pathToViews
     */
    public function __construct(string $pathToViews = null)
    {
        $this->view = new View($pathToViews);
        $this->message = new Message();
    }
}
