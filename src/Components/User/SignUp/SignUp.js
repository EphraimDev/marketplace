import React, { Component } from "react";
import { Link } from "react-router-dom";
import { connect } from "react-redux";

import { signUp } from "../../../actions/userActions";

import "./SignUp.css";

class SignUp extends Component {
  constructor(props) {
    super(props);
    this.state = {
      first_name: "",
      last_name: "",
      email: "",
      password: "",
      role: ""
    };
  }

  handleChange = e => {
    e.preventDefault();
    this.setState({ [e.target.name]: e.target.value });
  };

  handleSubmit = e => {
    e.preventDefault();
    const data = this.state;
    this.props.dispatch(signUp(data));
  };

  render() {
    return (
      <React.Fragment>
        <div className="signup-container">
          <section className="signup-quote">
            <span className="signup-quote-author" />
          </section>
          <section className="signup-form">
            <form onSubmit={this.handleSubmit}>
              <input
                type="text"
                onChange={this.handleChange}
                value={this.state.first_name}
                name="first_name"
                placeholder="First Name"
              />
              <input
                type="text"
                onChange={this.handleChange}
                value={this.state.last_name}
                name="last_name"
                placeholder="Last Name"
              />
              <input
                type="email"
                onChange={this.handleChange}
                value={this.state.email}
                name="email"
                placeholder="Email Address"
              />
              <input
                type="password"
                onChange={this.handleChange}
                value={this.state.password}
                name="password"
                placeholder="Password"
              />
              <div className="signup-terms">
                <button
                  onClick={this.handleSubmit}
                  type="submit"
                  className="signup-btn"
                >
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
      </React.Fragment>
    );
  }
}

const mapStateToProps = state => ({
  loading: state.users.loading,
  error: state.users.error
});

export default connect(mapStateToProps)(SignUp);
