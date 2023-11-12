<?php

namespace Content\Includes;

require_once($_SERVER["DOCUMENT_ROOT"]."/classes/HTML.php");

class Header
{
    private string $title;

    private array $links;

    private array $scripts;

    public function __construct(array $config = [])
    {
        $this->title = $config["title"] ?? "";
        $this->links = $config["links"] ?? [];
        $this->scripts = $config["scripts"] ?? [];
    }

    public function print(): void
    {
        $html = new HTML(0);

        $html->doctype();
        $html->htmlStart([
            "lang" => "hu"
        ]);
        $html->headStart();
        $html->comment("Title");
        $html->title($this->title);
        $html->comment("Links");
        foreach ($this->links as $link)
        {
            $html->link($link);
        }
        $html->comment("Scripts");
        foreach ($this->scripts as $script)
        {
            $html->script($script);
        }
        $html->headEnd();
        $html->bodyStart();
    }
}
