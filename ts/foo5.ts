export class UI {
    public searchbar: SearchBar;
    public console: Console;
    
    constructor() {
        var a, b  = 0;
        var content = a  ? a : (b || 'hhtp');
    }
}

class Thing { 
    public static inject = ["$mdDialog","$http","$scope","$filter","$stateParams","$state"] 
    constructor(public $mdDialog: angular.material.IDialogService, private $http: angular.IHttpService){}  
 } 
 
var token_text, token_type, last_type, last_last_text, indent_string;

class A<X, Y> { }
class A1<T extends { a: () => string }> { }
class B { }
class C { }
function foo<T>() { return 1;}
let x1: A<(param?: number) => void, B>;
let x2: A<C | B, C & B>;
const t = 1 < (5 > 10 ? 1 : 2);
var f6 = 1 < foo<string>();


