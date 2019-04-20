import React, { Component } from "react";
import { NavLink, Link } from "react-router-dom";
import Nja from "../../images/img.jpg";
import "./Navbar.css";

class Navbar extends Component {
  constructor(props) {
    super(props);
    this.toggle = this.toggle.bind(this);
    this.state = { collapse: false };
  }

  toggle() {
    this.setState(state => ({ collapse: !state.collapse }));
  }

  render() {
    return (
      <div>
        <div className="main">
          <div className="header">
            <div className="left">
              <div className="logo red">TherapyMart </div>
              <div className="header-links">
                <div>
                  <Link to="/">Home</Link>
                </div>
                <div>
                  <Link to="/therapists">Therapists</Link>
                </div>
                <div>
                  <Link to="/donate">Donate</Link>
                </div>
                <div>
                  <Link to="/blog">Blog</Link>
                </div>
                <div>
                  <Link to="/about_us">About Us</Link>
                </div>
                <div>
                  <Link to="/become_a_therapist">Become a Therapist</Link>
                </div>
              </div>
            </div>
            <div className="right">
              <div className="payment">
                <img style={{ height: "20px" }} src={Nja} alt="" />{" "}
                <span style={{ padding: "10px" }}> &#8358;</span>{" "}
                <i style={{ fontSize: "20px" }} className="fa fa-caret-down" />
              </div>
              <div className="account">
                <i style={{ fontSize: "35px" }} className="fa fa-user-circle" />
                <Link style={{ padding: "10px" }} to="/login">
                  Account{" "}
                </Link>
                <i style={{ fontSize: "20px" }} className="fa fa-caret-down" />
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default Navbar;
