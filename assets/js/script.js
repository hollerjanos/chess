"use strict";

import { Chess } from "/assets/js/Chess.js";

let chess = new Chess();

document.addEventListener("DOMContentLoaded", function() {
    chess.removeHighlightAll();
    chess.displayPieces();

    for (let row = 0; row < chess.NUMBER_OF_ROWS; row++)
    {
        for (let column = 0; column < chess.NUMBER_OF_COLUMS; column++)
        {
            let cell = chess.getCell(row, column);

            cell.addEventListener("mouseover", function() {
                chess.highlightCurrentCell(row, column);
                chess.highlightRow(row);
                chess.highlightColumn(column);
            })

            cell.addEventListener("mouseout", function() {
                chess.removeHighlightAll();
            })
        }
    }

});