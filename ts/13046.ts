export interface IFilesConfiguration {
	files: {
		associations: { [filepattern: string]: string };
		exclude: glob.IExpression;
		watcherExclude: { [filepattern: string]: boolean };
		encoding: string;
		autoGuessEncoding: boolean;
		defaultLanguage: string;
		trimTrailingWhitespace: boolean;
		autoSave: string;
		autoSaveDelay: number;
		eol: string;
		hotExit: string;
	};
}

function f(x: number[]): number[] { return x; }