// Sample reducer for user and auth info
const INITIAL_STATE = {
	user: {
		username: "John doe",
		id: 1
	},
	isAuthenticated: false,
	isAuthorized: false
};

function userReducer(state = INITIAL_STATE, action) {
	switch (action.type) {
		default:
			return state;
	}
}

export default userReducer;
