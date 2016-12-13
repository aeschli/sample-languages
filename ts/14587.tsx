class MyComponent<P, S> implements React.ClassicComponent<P, S> {

    public setState(f: (prevState: S, props: P) => S, callback?: () => any): void {
    }

    public getClassName(): string {
        this.getClassName();
        return '';
    }

    public render(): React.ReactElement<any> {
        return (
            <header className="navbar navbar-inverse navbar-static-top bs-docs-nav" role="banner">
                <script type="text/javascript" src="requirejs/require.js"></script>
                <script type="text/javascript" src="Config.js"></script>
                <script type="text/javascript">
                    {
                        this.getClassName()
                    }
                </script>
                <div className={this.getClassName()}>
                    <script type="text/javascript" src="requirejs/require.js"></script>
                    <div className="navbar-header">
                        <a href="../" className="navbar-brand">Search</a>
                    </div>
                    <nav id="bs-navbar" className="collapse navbar-collapse">
                        <ul className="nav navbar-nav">
                            <li>
                                <a href="../">Flights</a>
                            </li>
                        </ul>
                        <ul className="nav navbar-nav navbar-right">
                            <li>
                                <a href="../">Log in</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>
        );
    }

    public replaceState(nextState: S, callback?: () => any) {

    }

    public isMounted(): boolean {
        return false;
    }
}