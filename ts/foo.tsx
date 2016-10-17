
import React = __React;
declare var mountNode: any;

interface HelloWorldProps {
	name: string;
}

var HelloMessage = React.createClass<HelloWorldProps, any>({
	render: function() {
		return <div>Hello {this.props.name}</div>;
	}
});
