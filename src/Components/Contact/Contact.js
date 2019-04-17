import React, { Component } from "react";

import "./Contact.css";

class Contact extends Component {
  render() {
    return (
      <div>
        <header>
          <div>
            <h1> Header and Nav </h1>
          </div>
        </header>

        <section id="showcase">
          <div class="container">
            <h1> Contact Us </h1>
            <p>
              {" "}
              Ask us anything and we will guide you on how to use this platform
            </p>
            <div class="rect"> </div>
          </div>
        </section>

        <div class="address">
          <p> Our Address </p>
        </div>

        <hr width="50px" />

        <section id="info">
          <div class="container1">
            <div class="box">
              <h1> Address </h1>
              <p>1209 Abuja Street, Karu, 93001 FCT-Abuja, Nigeria</p>
            </div>
            <div class="box">
              <h1> Phone: </h1>
              <p>
                {" "}
                +234 1234567891 <br />
                +234 1234567891{" "}
              </p>
            </div>
            <div class="box">
              <h1> Online Service</h1>
              <p>
                {" "}
                www.therapymart.com.ng <br />
                info@therapymart.com.ng
              </p>
            </div>
          </div>
        </section>

        <div class="msg">
          <p> Send Us a Message </p>
        </div>
        <hr width="50px" />

        <section id="form">
          <div class="container1">
            <form action="">
              <div> Full Name </div>
              <input type="text" name="name" value="" placeholder="Your Name" />
              <div> Email </div>
              <input
                type="text"
                name="email"
                value=""
                placeholder="you@example"
              />
              <div> Message </div>
              <textarea name="" id="" placeholder="Your message..." />
              <br />
              <button id="send" type="submit" name="" value="">
                Send Message
              </button>
              <button id="cancel" type="" name="" value="">
                Cancel
              </button>
            </form>
          </div>
        </section>

        <footer>Footer</footer>
      </div>
    );
  }
}

export default Contact;
