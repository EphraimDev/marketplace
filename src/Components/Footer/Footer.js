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
                <h5>Therapymart</h5>
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
                    <a href="/contact">
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
                    <a href="#">
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
                    <a href="/faq">
                      <i class="fa fa-angle-double-right" />
                      Client FAQs
                    </a>
                  </li>
                  <li>
                    <a href="#" title="Design and developed by">
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
                      updates about therapy from us
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
            <div className="row">
              <div class="col-xs-12 col-sm-4 col-md-4">
                <p
                  style={{ color: "white", fontFamily: "'EB Garamond', serif" }}
                  class="list-unstyled list-inline text-left"
                >
                  Copyright &copy;{new Date().getFullYear()} All rights reserved
                  | TherapyMart
                </p>
              </div>
              <div
                style={{ color: "white", fontFamily: "'EB Garamond', serif" }}
                class="col-xs-12 col-sm-4 col-md-4"
              >
                <a style={{ marginLeft: "40px" }} href="javascript:void();">
                  <i class="" />
                  Privacy Policy
                </a>
                <a style={{ marginLeft: "20px" }} href="javascript:void();">
                  <i class="" />
                  Terms and Condition
                </a>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4">
                <ul class="list-unstyled list-inline social text-center">
                  <li class="list-inline-item">
                    <a href="javascript:void();">
                      <i style={{ fontSize: "20px" }} class="fa fa-youtube" />
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void();">
                      <i style={{ fontSize: "20px" }} class="fa fa-instagram" />
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void();">
                      <i style={{ fontSize: "20px" }} class="fa fa-facebook" />
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="javascript:void();" target="_blank">
                      <i style={{ fontSize: "20px" }} class="fa fa-twitter" />
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </React.Fragment>
    );
  }
}

export default Footer;
