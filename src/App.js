import React, { Component } from "react";
import Navbar from "./Components/Navbar/Navbar";
import Footer from "./Components/Footer/Footer";
import { Switch, Route } from "react-router-dom";
import Become from "./Components/BecomePage/Become";
import Contact from "./Components/Contact/Contact";
import Faq from "./Components/Faq/Faq";

class App extends Component {
  render() {
    return (
      <div>
        <Switch>
          <Navbar />
          <Route exact path="/" component={Become} />
          {/*<Route exact path="/" component={H} /> */}
          {/*<Route exact path="/register" component={R} />
          <Route exact path="/profile" component={} />
          <Route exact path="/become-a-therapist" component={Become} />*/}{" "}
        </Switch>
      </div>
    );
  }
}

export default App;
