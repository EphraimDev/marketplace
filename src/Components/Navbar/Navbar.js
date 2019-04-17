import React, { Component } from "react";

import "./Navbar.css";

class Navbar extends Component {
  render() {
    return (
      <div>
        <nav class="main-nav navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a
                style={{
                  color: "white",
                  fontSize: "35px",
                  fontFamily: "'Abril Fatface', cursive"
                }}
                class="navbar-brand"
              >
                TherapyMart
              </a>
              <button
                type="button"
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse"
              >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" />
                <span class="icon-bar" />
                <span class="icon-bar" />
              </button>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav ">
                <li class="active">
                  <a href="">Home</a>
                </li>
                <li>
                  <a href="">Band</a>
                </li>
                <li>
                  <a href="">Therapist</a>
                </li>
                <li>
                  <a href="">Donate</a>
                </li>
                <li>
                  <a href="">Blog</a>
                </li>
                <li>
                  <a href="">About Us</a>
                </li>
                <li>
                  <a href="">Become a Therapist</a>
                </li>
              </ul>
              <div class="dropdown-menu">
                <button
                  class="btn btn-default dropdown-toggle"
                  type="button"
                  data-toggle="dropdown"
                >
                  Dropdown Example
                  <span class="caret" />
                </button>
              </div>
            </div>
          </div>
        </nav>
      </div>
    );
  }
}

export default Navbar;
