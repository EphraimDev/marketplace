import React, { Component } from "react";
import { Switch, Route } from "react-router-dom";
import Become from "./Components/BecomePage/Become";
import Contact from "./Components/Contact/Contact";
import Faq from "./Components/Faq/Faq";
import TherapistListPage from "./Components/TherapistList/TherapistListPage";
import Home from "./Components/Landing/Home";
import Login from "./Components/User/Login/Login";
import SignUp from "./Components/User/SignUp/SignUp";
import PageNav from "./Components/PageNavigation";
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
<<<<<<< HEAD
          {/* <Route exact path="/profile" component={Profile} /> */}
          <Route exact path="/therapists" component = {TherapistListPage} />
          <Route exact path="/nav" component = {PageNav} />
=======
          <Route exact path="/therapist_list" component={TherapistListPage} />
>>>>>>> 35ca67e95f44d63cf7bfa75e4a434b442de330c6
        </Switch>
      </div>
    );
  }
}

export default App;
