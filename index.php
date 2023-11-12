<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/includes/construct.php");

require_once($_SERVER["DOCUMENT_ROOT"]."/classes/Content.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/classes/HTML.php");

require_once($_SERVER["DOCUMENT_ROOT"]."/classes/Chess.php");

use Content\Content;
use Content\Includes\HTML;
use Chess\Chess;

$content = new Content(
    [
        "header" => [
            "title" => "Test",
            "links" => [
                [
                    "rel" => "icon",
                    "type" => "image/x-icon",
                    "href" => "assets/img/favicon.png"
                ],
                [
                    "rel" => "stylesheet",
                    "href" => "assets/css/style.css"
                ],
                [
                "rel" => "stylesheet",
                "href" => "assets/css/chess.css"
            ]
            ],
            "scripts" => [
                [
                    "type" => "module",
                    "src" => "assets/js/Chess.js"
                ],
                [
                    "type" => "module",
                    "src" => "assets/js/script.js"
                ]
            ]
        ],
        "navbar" => [],
        "footer" => []
    ]
);

$html = new HTML(2);
$chess = new Chess();

$content->header->print();

$chess->print();

$content->footer->print();
