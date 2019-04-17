import React, { Component } from "react";
import { Link } from "react-router-dom";
import "./Footer.css";

class Footer extends Component {
  render() {
    return (
      <React.Fragment>
        <section id="footer">
          <div className="container">
            <div className="row text-center text-xs-center text-sm-left text-md-left">
              <div className="col-xs-12 col-sm-3 col-md-3">
                <h5>Theraphymart</h5>
                <ul className="list-unstyled quick-links">
                  <li>
                    <a href="javascript:void();">
                      <i className="fa fa-angle-double-right" />
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i className="fa fa-angle-double-right" />
                      Mission and Vision
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i className="fa fa-angle-double-right" />
                      Press Room
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Contact Us
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Advertise with us
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <h5>
                  <u>Quick links</u>
                </h5>
                <ul class="list-unstyled quick-links">
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Find a therapist
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Student Membership
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Partnership Information
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Therapist Membership
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Explore Therapy
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <h5>
                  <u>Others</u>
                </h5>
                <ul class="list-unstyled quick-links">
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Find Treatment Center
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Issues Treated in Therapy
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Warning Signs in Therapy
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void();">
                      <i class="fa fa-angle-double-right" />
                      Client FAQs
                    </a>
                  </li>
                  <li>
                    <a
                      href="https://wwwe.sunlimetech.com"
                      title="Design and developed by"
                    >
                      <i class="fa fa-angle-double-right" />
                      Membership Fee
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-3">
                <h5>
                  <u>Newsletter</u>
                </h5>
                <ul class="list-unstyled quick-links">
                  <li>
                    <p style={{ color: "white" }}>
                      Subscribe to our newsletter and be the first to get latest
                      updates about theraphy from us
                    </p>
                  </li>
                  <li>
                    <form action="">
                      <input
                        type="text"
                        placeholder="Type Email"
                        style={{
                          padding: "10px",
                          width: "200px",
                          backgroundColor: "#01ADBA",
                          borderColor: "3px solid white"
                        }}
                      />
                      <button
                        style={{
                          marginLeft: "10px",
                          padding: "10px",
                          backgroundColor: "white"
                        }}
                      >
                        <i class="fa fa-send-o" />
                      </button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
            <hr className="line-break" />
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class="list-unstyled list-inline social text-center">
                  <li class="list-inline-item">
                    <a href="javascript:void();">
                      <i class="fa fa-facebook" />
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void();">
                      <i class="fa fa-twitter" />
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void();">
                      <i class="fa fa-instagram" />
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void();">
                      <i class="fa fa-google-plus" />
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void();" target="_blank">
                      <i class="fa fa-envelope" />
                    </a>
                  </li>
                </ul>
              </div>
              <hr />
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <p class="list-unstyled list-inline text-left">
                Copyright &copy;{new Date().getFullYear()} All rights reserved |
                TherapyApp
              </p>
              <div class="col-xs-12 col-sm-3 col-md-3"></div>
                <ul class="list-unstyled quick-links text-center">
                    <li class="list-inline-item">
                      <a href="javascript:void();">
                        <i class="fa fa-angle-double-right" />
                        Privacy Policy
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void();">
                        <i class="fa fa-angle-double-right" />
                        Terms and Condition
                      </a>
                    </li>
                  </ul>
            </div>
          </div>
        </section>
      </React.Fragment>
    );
  }
}

export default Footer;
