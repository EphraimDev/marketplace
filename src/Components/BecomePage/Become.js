import React from "react";
import Banner from "./Banner";
import Info from "./Info";
import Form from "./Form";

import "./become.css";
import Navbar from "../Navbar/LoggedNav";
import Footer from "../Footer/Footer";

const Become = props => (
  <div>
    <Navbar />
    <div className="become_therapist">
      <Banner />
      <div className="container">
        <div className="row">
          <div className="col-md-4">
            <Info />
          </div>
          <div className="col-md-8">
            <Form />
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
);

export default Become;
