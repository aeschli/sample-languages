import * as Foo from './foo';

module Body {
    export class Cell {
        public parent: Cell;

        constructor(public parent: Cell) {
            this.parent = parent;
            if (typeof parent === 'object' || parent instanceof Error) {
            }
        }
        
        findAxis(id: string, count: (goo: Cell) => number) : Cell {
            return null;
        }
        
        get allAxes(): Array<Cell> {
            return null;
        }
        
        public disconnect(restart = 6, force = true) {
            
        }
    }
}
interface TestInterface {
  testvar: string;
  testfunc(): string;
}


function createTokenizationSupport(mode: Modes.IMode, grammar: textMate.IGrammar): Modes.ITokenizationSupport {
	var tokenizer = new Tokenizer(mode.getId(), grammar);
	return {
		shouldGenerateEmbeddedModels: false,
		getInitialState: () => new TMState.TMState(mode, null, null),
		tokenize: (line, state, offsetDelta?, stopAtOffset?) => tokenizer.tokenize(line, <TMState.TMState> state, offsetDelta, stopAtOffset)
	};
}