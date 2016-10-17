var node;
for (var i; i < 45; i++) {
  node = 234;

  node.a = 122;
  node.b += 122;
  node.b += '1' + 1 + '2';
}

var Nav, Profile;
// Input (JSX):
var app = <Nav color="blue"><Profile>click</Profile></Nav>;
// Output (JS):
var app = React.createElement(
  Nav,
  { color: "blue" },
  React.createElement(Profile, null, "click")
);
render() {
  return (
    <Scene>
      <Scene key="me" component={PageWrapper(HomePage) } title="me" />
    </Scene>
  );
}