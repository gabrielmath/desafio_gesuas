<?php

namespace Source\Core;

//use Source\Core\Twig\View as Twig;
use Source\Support\Message;


class Controller
{
    protected ViewInterface $view;
    protected Message $message;

    /**
     * Controller constructor.
     * @param string|null $pathToViews
     */
    public function __construct(string $pathToViews = null)
    {
        // Exemplo caso o template engine usado fosse o twig
        // $this->view = new Twig($pathToViews ?? __DIR__ . "/../../themes/" . CONF_VIEW_THEME, 'twig');
        $this->view = new View($pathToViews ?? __DIR__ . "/../../themes/" . CONF_VIEW_THEME);
        $this->message = new Message();
    }
}
