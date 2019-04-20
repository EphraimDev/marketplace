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
        <div class="main">
          <div class="header">
            <div class="left">
              <div class="logo red">TherapyMart </div>
              <div class="header-links">
                <div>
                  <Link to="/">Home</Link>
                </div>
                <div>
                  <Link to="/therapist_list">Therapists</Link>
                </div>
                <div>
                  <Link to="/donate">Donate</Link>
                </div>
                <div>
                  <Link to="/blog">Blog</Link>
                </div>
                <div>
                  <Link href="/about_us">About Us</Link>
                </div>
                <div>
                  <Link to="/become_a_therapist">Become a Therapist</Link>
                </div>
              </div>
            </div>
            <div class="right">
              <div class="payment">
                <img style={{ height: "20px" }} src={Nja} alt="" />{" "}
                <span style={{ padding: "10px" }}> &#8358;</span>{" "}
                <i style={{ fontSize: "20px" }} class="fa fa-caret-down" />
              </div>
              <div class="account">
                <i style={{ fontSize: "35px" }} class="fa fa-user-circle" />
                <Link style={{ padding: "10px" }} to="/login">
                  Account{" "}
                </Link>
                <i style={{ fontSize: "20px" }} class="fa fa-caret-down" />
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default Navbar;
