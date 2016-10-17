var loginButton;
if (loggedIn) {
  loginButton = <LogoutButton />;
} else {
  loginButton = <LoginButton />;
}

return (
  <nav>
    <Home />
    {loginButton}
  </nav>
);

var Nav, Profile;
// Input (JSX):
var app = <Nav color="blue"><Profile>click</Profile></Nav>;
// Output (JS):
var app = React.createElement(
  Nav,
  {color:"blue"},
  React.createElement(Profile, null, "click")
);

return 
    <View>
        <Text> {JSON.stringify(this.state.connectionInfoHistory)} </Text>
    </View>;

<Element id="aProperty">
    { thing.map(x => <div>{x}</div>) }
</Element>
<div className="aProperty">
    { thing.map(x => <div>{x}</div>) }
</div>

<Element>
    { thing.map(x=> <div>{x}</div>) }
</Element>
<div>
    { thing.map(x => <div>{x}</div>) }
</div>