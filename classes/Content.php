<?php

namespace Content;

require_once($_SERVER["DOCUMENT_ROOT"]."/classes/Header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/classes/Navbar.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/classes/Footer.php");

use Content\Includes\Header;
use Content\Includes\Navbar;
use Content\Includes\Footer;

class Content
{
    public Header $header;
    public Navbar $navbar;
    public Footer $footer;

    public function __construct(array $config = [])
    {
        $this->header = new Header($config["header"] ?? []);
        $this->navbar = new Navbar($config["navbar"] ?? []);
        $this->footer = new Footer($config["footer"] ?? []);
    }
}