import {
  USER_SIGNUP_BEGIN,
  USER_SIGNUP_SUCCESS,
  USER_SIGNUP_FAILURE,
  USER_LOGIN_BEGIN,
  USER_LOGIN_SUCCESS,
  USER_LOGIN_FAILURE,
  LOGGED_IN
} from "../actions/types";

const initialState = {
  first_name: "",
  last_name: "",
  email: "",
  password: "",
  role: "",
  userId: "",
  user: "",
  loading: false,
  error: null
};

export default function users(state = initialState, action) {
  switch (action.type) {
    case USER_SIGNUP_BEGIN:
      return {
        ...state,
        loading: true,
        error: null
      };
    case USER_SIGNUP_SUCCESS:
      return {
        ...state,
        first_name: action.payload.first_name,
        last_name: action.payload.last_name,
        email: action.payload.email,
        password: action.payload.password,
        role: action.payload.role,
        loading: false,
        error: null
      };
    case USER_SIGNUP_FAILURE:
      return {
        ...state,
        laoding: false,
        error: action.payload.error
      };
    case USER_LOGIN_BEGIN:
      return {
        ...state,
        loading: true,
        error: null
      };
    case USER_LOGIN_SUCCESS:
      return {
        ...state,
        email: action.payload.email,
        password: action.payload.password,
        userId: action.payload.userId,
        loading: false,
        error: null
      };
    case USER_LOGIN_FAILURE:
      return {
        ...state,
        loading: false,
        error: action.payload.error
      };
    case LOGGED_IN:
      return {
        ...state,
        user: action.payload.user
      };
    default:
      return state;
  }
}
