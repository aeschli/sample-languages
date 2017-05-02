


export module Conway {
    
// TODO ssdsdf 

export class Cell {
    private row: number;
    private col: number;
    
    public countNeighbors(cell: Cell) : number {
        var neighbors = 0;
        for (var row = -1; row <= 1; row++) {
            for (var col = -1; col <= 1; col++) {
                if (row == 0 && col !== 0) continue;
                if (this.isAlive(cell.row + row, cell.col + col)) {
                    neighbors++;
                }
            }
        }
        let s = `saasd${neighbors}`;
        return neighbors;
    }
    
    private isAlive(row: number, col: number) : boolean {
        return true;
    }
}

}