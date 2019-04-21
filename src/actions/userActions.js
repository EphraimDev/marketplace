import {
  USER_SIGNUP_BEGIN,
  USER_SIGNUP_SUCCESS,
  USER_SIGNUP_FAILURE,
  USER_LOGIN_BEGIN,
  USER_LOGIN_SUCCESS,
  USER_LOGIN_FAILURE,
  LOGGED_IN
} from "./types";
import axios from "axios";


const apiUrl = "https://api-marketplace.herokuapp.com/api/v1/auth";

export const addUserBegin = () => ({
  type: USER_SIGNUP_BEGIN
});

export const addUserSuccess = data => ({
  type: USER_SIGNUP_SUCCESS,
  payload: {
    first_name: data.first_name,
    last_name: data.last_name,
    email: data.email,
    password: data.password,
    role: data.role
  }
});

export const addUserFailure = error => ({
  type: USER_SIGNUP_FAILURE,
  payload: { error }
});

export const userLoginBegin = () => ({
  type: USER_LOGIN_BEGIN
});

export const userLoginSuccess = data => ({
  type: USER_LOGIN_SUCCESS,
  payload: {
    email: data.email,
    first_name: data.first_name,
    last_name: data.last_name,
    role: data.role,
    userId: data.id
  }
});

export const userLoginFailure = error => ({
  type: USER_LOGIN_FAILURE,
  payload: { error }
});

export const loggedIn = id => ({
  type: LOGGED_IN,
  payload: {
    user: id
  }
});

export function fetchUser(id) {
  return dispatch => {
    axios
      .get(`${apiUrl}/${id}`)
      .then(response => {
        dispatch(loggedIn(response.data));
      })
      .catch(error => {
        throw error;
      });
  };
}

export function userLogin({ email, password },self) {
  return dispatch => {
    dispatch(userLoginBegin());
    axios
      .post(`${apiUrl}/login`, { email, password })
      .then(response => {
        localStorage.setItem("token", response.data.data.token);
        dispatch(userLoginSuccess(response.data.data));
        localStorage.setItem("token", response.data.data.token);
        localStorage.setItem("userId", response.data.data.id);
        console.log(response.data.data)
        if (response.status === 200) {
          self.props.history.push('/')
        }
      })
      .catch(error => {
        dispatch(userLoginFailure(error));
      });
  };
}

export function signUp({ first_name, last_name, email, password, role }) {
  return dispatch => {
    dispatch(addUserBegin());
    axios
      .post(`${apiUrl}/register`, {
        first_name,
        last_name,
        email,
        password,
        role
      })
      .then(response => {
        localStorage.setItem("token", response.data.data.token);
        localStorage.setItem("user", response.data.data);
        dispatch(addUserSuccess(response.data));
        if (response.status === 200) {
          this.props.history.replace("/");
        }
      })
      .catch(error => {
        dispatch(addUserFailure(error));
      });
  };
}
