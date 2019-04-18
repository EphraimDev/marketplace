import React, { Component } from "react";
import { Switch, Route } from "react-router-dom";
import Become from "./Components/BecomePage/Become";
import Contact from "./Components/Contact/Contact";
import Faq from "./Components/Faq/Faq";
import Landing from "./Components/Landing/Home";
import Home from "./Components/Landing/Home";
import Footer from "./Components/Footer/Footer";
import Navbar from "./Components/Navbar/Navbar";

class App extends Component {
  render() {
    return (
      <div>
        <Navbar/>
        <Switch>
          <Route exact path="/contact" component={Contact} />
          <Route exact path="/" component={Become} />
          <Route exact path="/faq" component={Faq} /> 
          {/*<Route exact path="/register" component={R} />
          <Route exact path="/profile" component={} /> */}
          <Route path="/landing" component={Home} />
        </Switch>
        <Footer />
      </div>
    );
  }
}

export default App;
