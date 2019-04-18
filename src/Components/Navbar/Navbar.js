import React, { Component } from "react";
import { NavLink, Link } from "react-router-dom";
import { Collapse, Button, CardBody, Card } from "reactstrap";
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
                  <a href="#">Home</a>
                </div>
                <div>
                  <a href="#">Therapists</a>
                </div>
                <div>
                  <a href="#">Donate</a>
                </div>
                <div>
                  <a href="#">Blog</a>
                </div>
                <div>
                  <a href="#">About Us</a>
                </div>
                <div>
                  <a href="#">Become a Therapist</a>
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
                <a style={{ padding: "10px" }} href="#">
                  Account{" "}
                </a>
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
