<?php

namespace Source\App\Controller;

use Source\Core\Controller;

class WebController extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "./../../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function home()
    {
        echo $this->view->render('home', []);
    }
}
