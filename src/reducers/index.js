import { combineReducers } from "redux";
import users from "./userReducer";
import therapists from "./therapistCartReducer";

export default combineReducers({
  users,
  therapists
});
