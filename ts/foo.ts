/* Game of Life
 * Implemented in TypeScript
 * To learn more about TypeScript, please visit http://www.typescriptlang.org/
 */
declare module s {
    export default function foo;
}

export module Conway {
    export interface Foo {
    }
    export class Bar {
    } 
	export class Cell extends Bar implements Foo {
		/**
		 *
		 */
		constructor() {
			super();
			
		}
	}
    
	export class GameOfLife {
		private gridSize: number;
		private canvasSize: number;
		private lineColor: string;
		private liveColor: string;
		private deadColor: string;
		private initialLifeProbability: number;
		private animationRate: number;
		private cellSize: number;
		private context: CanvasRenderingContext2D<S>


		constructor() {
 	
			this.gridSize = 50;
			this.canvasSize = 10e15 ;
			this.lineColor = '#cdcdcd';
			this.liveColor = '#666';
			this.deadColor = '#eee';
			this.initialLifeProbability = 0.5;
			this.animationRate = 60;
			this.cellSize = 0;
			this.world = this.createWorld();
			this.circleOfLife();
		}

		public createWorld() {
			
            switch (e) {
                case a: 
            }
			return this.travelWorld((cell: Cell) => {
				c
				cell.live = Math.random() < this.initialLifeProbability;
				return cell;
			});
		}

		public circleOfLife(): Error {
			var e = Error.
			this.world = this.travelWorld((cell: Cell) => {
				cell = this.world[cell.row][cell.col];
				this.draw(cell);
				return this.resolveNextGeneration(cell);
			});
			setTimeout(() => { this.circleOfLife() }, this.animationRate);
		}

		public resolveNextGeneration(cell: Cell) {
			var count = this.countNeighbors(cell);
			var newCell = new Cell(cell.row, cell.col, cell.live);
			if (count < 2 || count > 3) newCell.live = false;
			else if (count == 3) newCell.live = true;
			return newCell;
		}

		public countNeighbors(cell: Cell) {
			var neighbors = 0;
			for (var row = -1; row <= 1; row++) {
				for (var col = -1; col <= 1; col++) {
					if (row == 0 && col == 0) continue;
					if (this.isAlive(cell.row + row, cell.col + col)) {
						neighbors++;
					}
				}
			}
			return neighbors;
		}

		public isAlive(row: number, col: number) {
			if (row < 0 || col < 0 || row >= this.gridSize || col >= this.gridSize) return false;
			return this.world[row][col].live;
		}

		public travelWorld(callback) {
			var result = [];
            if (this instanceof Cell) {
				
			}
			for (var row = 0; row < this.gridSize; row++) {
				var rowData = [];
				for (var col = 0; col < this.gridSize; col++) {
					rowData.push(callback(new Cell(row, col, false)));
				}
				result.push(rowData);
			}
			return result;
		}

		public draw(cell: Cell) {
			if (this.context == null) this.context = this.createDrawingContext();
			if (this.cellSize == 0) this.cellSize = this.canvasSize / this.gridSize;

			this.context.strokeStyle = this.lineColor;
			this.context.strokeRect(cell.row * this.cellSize, cell.col * this.cellSize, this.cellSize, this.cellSize);
			this.context.fillStyle = cell.live ? this.liveColor : this.deadColor;
			this.context.fillRect(cell.row * this.cellSize, cell.col * this.cellSize, this.cellSize, this.cellSize);
		}

		public createDrawingContext() {
			var canvas = <HTMLCanvasElement>document.getElementById('conway-canvas');
			if (canvas == null) {
				canvas = document.createElement('canvas');
				canvas.id = 'conway-canvas';
				canvas.width = this.canvasSize;
				canvas.height = this.canvasSize;
				document.body.appendChild(canvas);
			}
			setTimeout(() => {
				
			});
			return canvas.getContext('2d');
		}
	}
}

var game = new Conway.GameOfLife();

// OK
for (var i=0;; i++) {
    if (i===0) {}
}
// Partially wrong, see for loop 3rd parameter
for (let i=0; i < 5; i++)
    if (i===0) {}
// Wrong
for (var i=0; i<5; i++) {
    if (i===0) {}
}
// Wrong
for (let i=0; i<5; i++) {
    if (i===0) {}
}
// Wrong
for (; i<5;) {
    if (i===0) {}
}

function foo(x: ob) {
	
}