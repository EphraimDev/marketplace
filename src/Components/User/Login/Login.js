import React, { Component } from "react";
import { Link } from "react-router-dom";
import { connect } from "react-redux";
import { userLogin } from "../../../actions/userActions";

import "./Login.css";

class Login extends Component {
  constructor(props) {
    super(props);
    this.state = {
      email: "",
      password: ""
    };
  }

  handleChange = e => {
    e.preventDefault();
    this.setState({
      [e.target.name]: e.target.value
    });
  };

  handleSubmit = e => {
    let { email, password } = this.state;
    e.preventDefault();
    this.props.dispatch(userLogin({ email, password }, this));
  };

  render() {
    return (
      <div>
        <div className="login-container">
          <section className="login-quote">
            <span className="login-quote-author" />
          </section>
          <section className="login-form">
            <form onSubmit={this.handleSubmit}>
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
              <button
                onClick={this.handleSubmit}
                type="submit"
                className="login-btn"
              >
                Login
              </button>
              <div>
                Don't have have an account?{" "}
                <Link to="/register" className="login-link">
                  Sign Up
                </Link>
              </div>
            </form>
          </section>
        </div>
      </div>
    );
  }
}

const mapStateToProps = state => ({
  userId: state.users.userId,
  loading: state.users.loading,
  error: state.users.error
});

export default connect(mapStateToProps)(Login);
