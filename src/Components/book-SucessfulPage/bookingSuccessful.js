import React, { Component } from 'react';
import { Link } from 'react-router-dom';

import "./bookingSuccessful.css"; 


class bookingSuccesful extends Component {
  render() {
    return (
      <div>
        <div className="nav-p">
        <p><Link to="/">Home    <i class="fas fa-angle-right"></i></Link><Link to="/therapists">Therapist  <i class="fas fa-angle-right"></i></Link><Link to="/">Dr Joe  <i class="fas fa-angle-right"></i></Link><Link to="/" ><span className="color"> Book Apoiniment</span></Link></p>
    </div>
      
      <div className="book-successful">
          <h2> Your Booking was Successful! </h2>
          <h4> You will receive a confirmation email on email@sample.com</h4>
          <button type="sumbit" id="submit">  View Details </button>
      </div>
    </div>
    );
  }
}

export default bookingSuccesful;
