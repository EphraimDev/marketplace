import React, { Component } from "react";

import "./single.css";

import ProfileCard from "./ProfileCard";
import Appointments from "./Appointments";
import Chart from "./Chart";
import ContactInfo from "./ContactInfo";
import Knowledge from "./Knowledge";
import Hours from "./Hours";
import Recommendations from "./Recommendations";

class Single extends Component {
	render() {
		return (
			<div className="st-page container my-5">
				<div className="row">
					<div className="col-lg-3">
						<ProfileCard />
						<ContactInfo />
						<Hours />
					</div>
					<div className="col-lg-5">
						<Appointments />
						<Knowledge />
						<Recommendations />
					</div>
					<div className="col-lg-4">
						<Chart />
					</div>
				</div>
			</div>
		);
	}
}

export default Single;
