<?php

namespace Source\Core;

interface ViewInterface
{
    public function __construct(string $path = CONF_VIEW_PATH, string $ext = CONF_VIEW_EXT);
    public function path(string $name, string $path): self;
    public function render(string $templateName, array $data): string;
    public  function extendTemplate();
}
