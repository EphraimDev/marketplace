import React, { Component } from 'react';
import { Link } from 'react-router-dom';

import "./bookingError.css"; 


class bookingError extends Component {
  render() {
    return (
      <div className="App">
        <div className="nav-p">
     <p><Link to="/">Home    <i class="fas fa-angle-right"></i></Link><Link to="/therapists">Therapist  <i class="fas fa-angle-right"></i></Link><Link to="/">Dr Joe  <i class="fas fa-angle-right"></i></Link><Link to="/" ><span className="color"> Book Apoiniment</span></Link></p>
    </div>
      <div className="book-error"/>
          <h2> Your Booking was Unsuccessful! </h2>
          <h4> Your booking may have been unsuccessful due to the following reasons:</h4>
          <p> Payment validation failed: Processor Declined</p>
          <p> Booking cannot be completed at the moment</p>
          <p> For security reasons, re-enter your payment information</p>
          <p>Tip: You may try another credit card.</p>
          <button type="sumbit" id="submit">  Retry Booking </button>
      </div>

    );
  }
}

export default bookingError;
