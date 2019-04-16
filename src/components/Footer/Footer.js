import React, { Component } from "react";
import '.Components/Footer/Footer.css';
import { Link } from 'react-router-dom';

 class Footer extends Component {
  render() {
    return (
      <div>
        <footer className="footer is-primary">
        <div className="container">
        <div  className="column">
        <div className="column">
        moreLinks={
            <Link className="grey-text text-lighten-4 right" href="#!">More Links</Link>
          }
          links={
            <ul>
              <li><Link to="/About Us" className="grey-text text-lighten-3">About Us</Link></li>
              <li><Link to="/Terms & Conditions" className="grey-text text-lighten-3">Terms & Conditions</Link></li>
              <li><Link to="/Help" className="grey-text text-lighten-3">Help</Link></li>
              <li><Link to="/Contact Us" className="grey-text text-lighten-3">Contact Us</Link></li>
            </ul>
          }
        </div>
        <p>&copy; 2019 TherapyApp</p>
        <div className="column has-text-right">
        <a className="icon" href="#"><i className="fa fa-facebook"></i></a>
        <a className="icon" href="#"><i className="fa fa-twitter"></i></a>
        </div>
        </div>
      </div>
        </footer>
      </div>
    );
  }
}

export default Footer;
