<?php

namespace Source\Core\Twig;

use Source\Core\ViewInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class View implements ViewInterface
{
    private FilesystemLoader $loader;
    private Environment $template;

    /**
     * @param string $path
     */
    public function __construct(string $path = CONF_VIEW_PATH, string $ext = CONF_VIEW_EXT)
    {
        $this->loader = new FilesystemLoader($path);
        $this->template = new Environment($this->loader, [
            'cache' => "{$path}/cache"
        ]);
    }


    /**
     * @param string $templateName
     * @param array $data
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $templateName, array $data): string
    {
        return $this->template->render($templateName, $data);
    }

    /**
     * @param string $name
     * @param string $path
     * @return $this
     * @throws LoaderError
     */
    public function path(string $name, string $path): View
    {
        $this->loader->addPath($path, $name);
        return $this;
    }

    /**
     * @return Environment
     */
    public function extendTemplate(): Environment
    {
        return $this->template;
    }
}
