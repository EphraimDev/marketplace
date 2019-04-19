import React, { Component } from "react";
import { Switch, Route } from "react-router-dom";
import Become from "./Components/BecomePage/Become";
import Contact from "./Components/Contact/Contact";
import Faq from "./Components/Faq/Faq";
import Home from "./Components/Landing/Home";
import Login from "./Components/User/Login/Login";
import SignUp from "./Components/User/SignUp/SignUp";
//import Profile from "./Components/Profile/Profile";

class App extends Component {
  render() {
    return (
      <div>
        <Switch>
          <Route exact path="/" component={Home} />
          <Route exact path="/become_a_therapist" component={Become} />
          <Route exact path="/contact" component={Contact} />
          <Route exact path="/login" component={Login} />
          <Route exact path="/register" component={SignUp} />
          <Route exact path="/faq" component={Faq} />
          {/* <Route exact path="/profile" component={Profile} /> */}
        </Switch>
      </div>
    );
  }
}

export default App;
