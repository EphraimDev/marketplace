import React, { Component } from "react";
import Navbar from "./Components/Navbar/Navbar";
import { Switch, Route } from "react-router-dom";

class App extends Component {
  render() {
    return (
        <div>
          <Navbar />
          <Switch>
            <Route exact path="/" component={H} />
            <Route exact path="/login" component={L} />
            <Route exact path="/register" component={R} />
            <Route exact path="/profile" component={} />
          </Switch>
        
        </div>
    );
  }
}

export default App;
