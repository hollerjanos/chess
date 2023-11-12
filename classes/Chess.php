<?php

namespace Chess;

require_once($_SERVER["DOCUMENT_ROOT"]."/classes/HTML.php");

use Content\Includes\HTML;

class Chess
{
    private bool $isBrightCell = false;

    private const DARK = [
        "KING" => 1,
        "QUEEN" => 2,
        "ROOK" => 3,
        "BISHOP" => 4,
        "KNIGHT" => 5,
        "PAWN" => 6
    ];

    private const BRIGHT = [
        "KING" => 7,
        "QUEEN" => 8,
        "ROOK" => 9,
        "BISHOP" => 10,
        "KNIGHT" => 11,
        "PAWN" => 12
    ];

    private const VALUE = [
        "KING" => 99, // Invaluable
        "QUEEN" => 9,
        "ROOK" => 5,
        "BISHOP" => 3,
        "KNIGHT" => 3,
        "PAWN" => 1
    ];

    private array $pieces = [
        [
            self::DARK["ROOK"],
            self::DARK["KNIGHT"],
            self::DARK["BISHOP"],
            self::DARK["QUEEN"],
            self::DARK["KING"],
            self::DARK["BISHOP"],
            self::DARK["KNIGHT"],
            self::DARK["ROOK"]
        ],
        [
            self::DARK["PAWN"],
            self::DARK["PAWN"],
            self::DARK["PAWN"],
            self::DARK["PAWN"],
            self::DARK["PAWN"],
            self::DARK["PAWN"],
            self::DARK["PAWN"],
            self::DARK["PAWN"]
        ],
        [
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0
        ],
        [
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0
        ],
        [
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0
        ],
        [
            0,
            0,
            0,
            0,
            0,
            0,
            0,
            0
        ],
        [
            self::BRIGHT["PAWN"],
            self::BRIGHT["PAWN"],
            self::BRIGHT["PAWN"],
            self::BRIGHT["PAWN"],
            self::BRIGHT["PAWN"],
            self::BRIGHT["PAWN"],
            self::BRIGHT["PAWN"],
            self::BRIGHT["PAWN"]
        ],
        [
            self::BRIGHT["ROOK"],
            self::BRIGHT["KNIGHT"],
            self::BRIGHT["BISHOP"],
            self::BRIGHT["QUEEN"],
            self::BRIGHT["KING"],
            self::BRIGHT["BISHOP"],
            self::BRIGHT["KNIGHT"],
            self::BRIGHT["ROOK"]
        ]
    ];

    public function print(): void
    {
        $html = new HTML(2);

        $html->tableStart([
            "class" => [
                "chess-board"
            ]
        ]);
        for ($row = 0; $row < NUMBER_OF_ROWS; $row++)
        {
            $html->comment("$row. row");
            $html->trStart();
            for ($column = 0; $column < NUMBER_OF_COLUMNS; $column++)
            {
                $html->td([
                    "id" => "$row$column",
                    "class" => [
                        $this->isBrightCell ? "bright" : "dark"
                    ],
                    "data" => [
                        "index" => $this->pieces[$row][$column]
                    ]
                ]);
                if ($column != NUMBER_OF_COLUMNS - 1)
                {
                    $this->changeCellColor();
                }
            }
            $html->trEnd();
        }
        $html->tableEnd();
    }

    private function changeCellColor(): void
    {
        $this->isBrightCell = !$this->isBrightCell;
    }
}
