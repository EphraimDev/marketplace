import React, { Component } from "react";

import "./Contact.css";

class Contact extends Component {
  render() {
    return (
      <div className="contact">
        {/* header */}
        <div className="contact-header">
          <div className="contact-header_title text-center">
            <h1>Contact Us</h1>
            <p>
              Ask us anything and we will guide you on how to use this platform
            </p>
            <span />
          </div>
        </div>
        {/* Contact Informations */}
        <div className="container">
          <div className="contact-info">
            <h4 className="text-center">Our Adress</h4>
            <span className="blue-line" />
            <div className="row">
              <div className="col-md-4">
                <h5>Address</h5>
                <p>
                  1209 Abuja street, Karu <br />
                  930001
                  <br />
                  FCT-Abuja, Nigeria
                </p>
              </div>
              <div className="col-md-4">
                <h5>Phone</h5>
                <p>
                  +234 1234567891
                  <br />
                  +234 1234567891
                </p>
              </div>
              <div className="col-md-4">
                <h5>Online Service</h5>
                <p>
                  www.therapymart.com.ng <br />
                  info@therapymart.com.ng
                </p>
              </div>
            </div>
          </div>
          {/* Contact form */}
          <form className="contact-form">
            <h4 className="text-center">Send Us a Message</h4>
            <span className="blue-line" />
            <div className="row">
              <div className="form-group col-md-12">
                <label for="fullName">Full Name</label>
                <input
                  type="text"
                  className="form-control"
                  id="fullName"
                  name="fullName"
                  placeholder="Your Name"
                />
              </div>
              <div className="form-group col-md-12">
                <label for="fullName">Email</label>
                <input
                  type="email"
                  className="form-control"
                  id="email"
                  name="email"
                  placeholder="You@example.com"
                />
              </div>
              <div className="form-group col-md-12">
                <textarea
                  className="form-control"
                  name="message"
                  rows="8"
                  placeholder="Your message...."
                />
              </div>
              <div className="buttons">
                <button className="button">Cancel</button>
                <button className="button button-alt">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    );
  }
}

export default Contact;
