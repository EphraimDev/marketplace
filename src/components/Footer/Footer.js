import React, { Component } from "react";
import '.Components/Footer/Footer.css';
import { Link } from 'react-router-dom';

 class Footer extends Component {
  render() {
    return (
      <div>
        <footer className="footer-area section-gap">
                <div className="container">
                  <div className="row">
                    <div className="col-lg-2 col-md-6 single-footer-widget">
                      <h4>Theraphymart</h4>
                      <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Mission and Vision</a></li>
                        <li><a href="#">Press Room</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Advertise with Us</a></li>
                      </ul>
                    </div>
                    <div className="col-lg-2 col-md-6 single-footer-widget">
                      <h4>Quick Links</h4>
                      <ul>
                        <li><a href="#">Find a Therapist</a></li>
                        <li><a href="#">Student Membership</a></li>
                        <li><a href="#">Partnership Information</a></li>
                        <li><a href="#">Therapist Membership</a></li>
                        <li><a href="#">Explore Therapy</a></li>
                      </ul>
                    </div>
                    <div className="col-lg-2 col-md-6 single-footer-widget">
                      <h4>Others</h4>
                      <ul>
                        <li><a href="#">Find a Treatment Center</a></li>
                        <li><a href="#">Issues Treated In therapy</a></li>
                        <li><a href="#">Warning Signs In Therapy</a></li>
                        <li><a href="#">Clients FAQs</a></li>
                        <li><a href="#">Membership Fee</a></li>
                      </ul>
                    </div>
                    <div className="col-lg-4 col-md-6 single-footer-widget">
                      <h4>Newsletter</h4>
                      <p>Subscribe to our newsletter and be the first to get updates about Therapy from us</p>
                      <div className="form-wrap" id="mc_embed_signup">
                        <form action="#" className="form-inline">
                          <input className="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                          required="" type="email">
                          <button className="click-btn btn btn-default text-uppercase">subscribe</button>
                          </input>
                          </form>
                            </div>
                          <div class="info"></div>
                      </div>
                    </div>
                  </div>
                  <hr></hr>
                  <div class="footer-bottom row align-items-left">
                    <p class="footer-text m-0 col-lg-8 col-md-12">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | TherapyApp</p>
            </div>
            </footer>
                    <div class="footer-bottom row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12">
                        <a href="#">Find a Treatment Center</a>
                        <a href="#">Issues Treated In therapy</a>
                        </p>
                        </div>
                    <div class="col-lg-4 col-md-12 footer-social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                  </div>
    );
  }
}

export default Footer;
