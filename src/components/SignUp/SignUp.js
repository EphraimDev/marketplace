import React, { useState } from "react";
import { Link } from "react-router-dom";
import "./SignUp.css";

const SignUp = () => {
  const [state, setState] = useState({ fullName: "", email: "", password: "" });
  const [quotes, setQoute] = useState({
    quote: "The best way out is always through",
    author: "Robert Frost"
  });
  const [checked, setChecked] = useState(false);

  this.onChange = e => {
    setState({
      [e.target.name]: e.target.value
    });
  };
  this.onSubmit = e => {
    e.preventDefault();
    if (!checked) alert("You have to agree with the terms and Privacy Policy");
  };
  this.onChecked = e => {
    setChecked(!checked);
  };
  return (
    <div className="signup-container">
      <section className="signup-quote">
        "{quotes.quote}"
        <span className="signup-quote-author">- {quotes.author}</span>
      </section>
      <section className="signup-form">
        <form onSubmit={this.onSubmit}>
          <input
            type="text"
            onChange={this.onChange}
            value={state.fullName}
            name="fullName"
            placeholder="Full Name"
          />
          <input
            type="email"
            onChange={this.onChange}
            value={state.email}
            name="email"
            placeholder="Email Address"
          />
          <input
            type="password"
            onChange={this.onChange}
            value={state.password}
            name="password"
            placeholder="Password"
          />
          <div className="signup-terms">
            <input type="checkbox" onChange={this.onChecked} /> I agree with all
            the{" "}
            <a href="#!" className="signup-link">
              Terms
            </a>{" "}
            and{" "}
            <a href="#!" className="signup-link">
              Privacy Policy
            </a>
            <button type="submit" disabled={!checked} className="signup-btn">
              Sign Up
            </button>
          </div>
          <div>
            Already have an account?{" "}
            <Link to="/login" className="signup-link">
              Log In
            </Link>
          </div>
        </form>
      </section>
    </div>
  );
};

export default SignUp;
