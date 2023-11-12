"use strict";

export class Chess
{
    constructor() {
        this.NUMBER_OF_ROWS = 8;
        this.NUMBER_OF_COLUMS = 8;
    }

    getCell(row, column)
    {
        return document.getElementById(`${row}${column}`);
    }

    removeHighlight(row, column)
    {
        let cell = this.getCell(row, column)

        cell.classList.remove("highlight");
    }

    removeHighlightAll()
    {
        for (let row = 0; row < this.NUMBER_OF_ROWS; row++)
        {
            for (let column = 0; column < this.NUMBER_OF_COLUMS; column++)
            {
                this.removeHighlight(row, column);
            }
        }
    }

    highlightCurrentCell(row, column)
    {
        let cell = this.getCell(row, column)

        cell.classList.add("highlight");
        cell.classList.add("current");
    }

    highlightRow(row)
    {
        for (let column = 0; column < this.NUMBER_OF_COLUMS; column++)
        {
            let cell = this.getCell(row, column);
            cell.classList.add("highlight");
        }
    }

    highlightColumn(column)
    {
        for (let row = 0; row < this.NUMBER_OF_ROWS; row++)
        {
            let cell = this.getCell(row, column);
            cell.classList.add("highlight");
        }
    }

    getPiece(index)
    {
        index = parseInt(index);

        switch (index)
        {
            case 1: return "dark-king";
            case 2: return "dark-queen";
            case 3: return "dark-rook";
            case 4: return "dark-bishop";
            case 5: return "dark-knight";
            case 6: return "dark-pawn";

            case 7: return "bright-king";
            case 8: return "bright-queen";
            case 9: return "bright-rook";
            case 10: return "bright-bishop";
            case 11: return "bright-knight";
            case 12: return "bright-pawn";
        }
    }

    displayPieces()
    {
        for (let row = 0; row < this.NUMBER_OF_ROWS; row++)
        {
            for (let column = 0; column < this.NUMBER_OF_COLUMS; column++)
            {
                let cell = this.getCell(row, column);
                cell.classList.add(this.getPiece(cell.dataset["index"]));
            }
        }
    }
}