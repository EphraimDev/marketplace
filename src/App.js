import React, { Component } from "react";
import { BrowserRouter } from "react-router-dom";

import Navbar from "./Components/Navbar";
import Become from "./Components/become";

class App extends Component {
	render() {
		return (
			<BrowserRouter>
				<div>
					<Navbar />
					<Become />
				</div>
			</BrowserRouter>
		);
	}
}

export default App;
