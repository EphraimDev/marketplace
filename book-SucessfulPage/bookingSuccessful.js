import React, { Component } from 'react';

import "./bookingSuccessful.css"; 


class bookingError extends Component {
  render() {
    return (
       <div className="nav-p">
     <p><a href="#">Home    <i class="fas fa-angle-right"></i></a><a href="#">Therapist  <i class="fas fa-angle-right"></i></a><a href="#">Dr Joe  <i class="fas fa-angle-right"></i></a><a href="#" ><span class="color"> Book Apoiniment</span></a></p>
    </div>
    
    <div className="book-successful">
        <h2> Your Booking was Successful! </h2>
        <h4> You will receive a confirmation email on email@sample.com</h4>
        <button type="sumbit" id="submit">  View Details </button>
    </div>

    );
  }
}

export default bookingSuccesful;
