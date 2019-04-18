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

const apiUrl = "https://api-marketplace.herokuapp.com/api/v1/auth/register";

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
    username: data.username,
    password: data.password,
    userId: data.user._id
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

export function userLogin({ username, password }) {
  return dispatch => {
    dispatch(userLoginBegin());
    axios
      .post(`${apiUrl}/login`, { username, password })
      .then(response => {
        localStorage.setItem("token", response.data.token);
        dispatch(userLoginSuccess(response.data));
        console.log(response.data.token);
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
      .post(`${apiUrl}/login`, { first_name, last_name, email, password, role })
      .then(response => {
        localStorage.setItem("token", response.data.token);
        dispatch(addUserSuccess(response.data));
        console.log(response.data.token);
      })
      .catch(error => {
        dispatch(addUserFailure(error));
      });
  };
}
