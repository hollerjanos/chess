<?php

namespace Content\Includes;

class Footer
{
    public function __construct(array $config = [])
    {
    }

    public function print(): void
    {
        $html = new HTML(2);

        $html->bodyEnd();
        $html->htmlEnd();
    }
}
