class Parent {

    protected alpha: {[key: string]: number} = { 'hi': 200 };

    public bar(): void {
        console.log('hi');
    }
}

export class Class extends Parent {

    constructor(private parent: Parent) { super(); }

    fus = {
        ro: {
            da: (): void => {
                console.log('*shouts*');
            }
        }
    }

    public foo(): boolean {

        let event = null;
        event = undefined;

        let a: any = { };
        if(a instanceof String) console.log('instanceof string');
        else if(a instanceof Parent) console.log(`instanceof ${"parent"}`);
        var x = a.normal.keys.x.y.z.length.id.title.event.all.getAll().get().set().push().forEach().navigate().apply().sub().sup().anchor().big().normal().methods();
        a  =19;
        this.fus.ro.da();
        super.bar();

        return false;
    }
}