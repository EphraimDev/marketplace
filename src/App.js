import React, { Component } from "react";
import { Switch, Route } from "react-router-dom";
import Become from "./Components/BecomePage/Become";
import Contact from "./Components/Contact/Contact";
import Faq from "./Components/Faq/Faq";
import TherapistListPage from "./Components/TherapistList/TherapistListPage";
import Home from "./Components/Landing/Home";
import Login from "./Components/User/Login/Login";
import SignUp from "./Components/User/SignUp/SignUp";
import User from './Components/UserProfilePage/UserProfilePage';
import ProtectedRoute from './Components/ProtectedRoute/ProtectedRoute';

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
          <Route exact path="/therapist_list" component={TherapistListPage} />
          <ProtectedRoute exact path="/user" component={User} />
        </Switch>
      </div>
    );
  }
}

export default App;
