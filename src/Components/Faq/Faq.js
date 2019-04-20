import React, { Component } from "react";

import "./Faq.css";
import Navbar from "../Navbar/Navbar";
import Footer from "../Footer/Footer";

class Faq extends Component {
  render() {
    return (
      <div>
        <Navbar />
        <div class="faq-head">
          <div class="position">
            <div class="rectangle"> </div>
            <h2> FAQ </h2>
          </div>
        </div>

        <div class="faq-ques">
          <h4> Frequently Asked Questions</h4>
        </div>

        <div id="flex-main">
          <div class="ques-faq">
            <h3> Where should I look for a good therapist? </h3>
            <p>
              {" "}
              Ask for a recommendation from someone who has had a good
              experience with a particular therapist.Get a referral from your
              doctor, attorney, clergy, friend, etc{" "}
            </p>
          </div>
          <div class="ques-faq">
            <h3> Where should I look for a good therapist? </h3>
            <p>
              {" "}
              Ask for a recommendation from someone who has had a good
              experience with a particular therapist.Get a referral from your
              doctor, attorney, clergy, friend, etc{" "}
            </p>
          </div>
          <div class="ques-faq">
            <h3> Where should I look for a good therapist? </h3>
            <p>
              {" "}
              Ask for a recommendation from someone who has had a good
              experience with a particular therapist.Get a referral from your
              doctor, attorney, clergy, friend, etc{" "}
            </p>
          </div>
          <div class="ques-faq">
            <h3> Where should I look for a good therapist? </h3>
            <p>
              {" "}
              Ask for a recommendation from someone who has had a good
              experience with a particular therapist.Get a referral from your
              doctor, attorney, clergy, friend, etc{" "}
            </p>
          </div>
          <div class="ques-faq">
            <h3> Where should I look for a good therapist? </h3>
            <p>
              {" "}
              Ask for a recommendation from someone who has had a good
              experience with a particular therapist.Get a referral from your
              doctor, attorney, clergy, friend, etc{" "}
            </p>
          </div>
          <div class="ques-faq">
            <h3> Where should I look for a good therapist? </h3>
            <p>
              {" "}
              Ask for a recommendation from someone who has had a good
              experience with a particular therapist.Get a referral from your
              doctor, attorney, clergy, friend, etc{" "}
            </p>
          </div>
        </div>
        <Footer />
      </div>
    );
  }
}

export default Faq;
