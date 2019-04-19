import React, { Component } from "react";
import { Switch, Route } from "react-router-dom";

import Navbar from "./Components/Navbar/Navbar";
import Become from "./Components/BecomePage/Become";
import Contact from "./Components/Contact/Contact";
import Faq from "./Components/Faq/Faq";
import TherapistListPage from './Components/TherapistList/TherapistListPage';

class App extends Component {
  render() {
    return (
      <div>
        <Switch>
          <Route exact path="/" component={Become} />
         {/* <Route exact path="/therapist-search" component={TherapistListPage} /> */}
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
