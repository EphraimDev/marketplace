import React, { Component } from "react";
import { Switch, Route } from "react-router-dom";

import Navbar from "./Components/Navbar/Navbar";
import Become from "./Components/BecomeATherapist";

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
          <Route exact path="/become-a-therapist" component={Become} />
        </Switch>
      </div>
    );
  }
}

export default App;
