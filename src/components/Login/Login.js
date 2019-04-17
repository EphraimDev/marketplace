import React, { useState } from "react";
import { Link } from "react-router-dom";
import "./Login.css";

const Login = () => {
  const [state, setState] = useState({ email: "", password: "" });
  const [quotes, setQoute] = useState({
    quote: "The best way out is always through",
    author: "Robert Frost"
  });

  this.onChange = e => {
    setState({
      [e.target.name]: e.target.value
    });
  };
  this.onSubmit = e => {
    e.preventDefault();
    if (state.email === "" || state.password === "") {
      alert("You have to provide your email and password details");
    }
  };

  return (
    <div className="login-container">
      <section className="login-quote">
        "{quotes.quote}"
        <span className="login-quote-author">- {quotes.author}</span>
      </section>
      <section className="login-form">
        <form onSubmit={this.onSubmit}>
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
          <a href="#!!" className="login-link fgtpass">
            Forgot Password?
          </a>
          <button type="submit" className="login-btn">
            Login
          </button>
          <div>
            Don't have have an account?{" "}
            <Link to="/login" className="login-link">
              Sign Up
            </Link>
          </div>
        </form>
      </section>
    </div>
  );
};

export default Login;
