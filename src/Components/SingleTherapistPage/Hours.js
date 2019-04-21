import React from "react";

const Hours = props => {
	return (
		<div className="hours">
			<div className="card mt-5">
				<div className="heading px-2 py-2 d-flex justify-content-between">
					<p className="my-0">Operating Hours</p>
					<i className="fa fa-ellipsis-v" />
				</div>
				<p className="ml-2">Tue 8.00 AM - 4.00 PM</p>
				<p className="ml-2">Tue 8.00 AM - 4.00 PM</p>
				<p className="ml-2">Tue 8.00 AM - 4.00 PM</p>
			</div>
			<button className="mt-3 d-block px-4 py-2 w-100 text-white">
				Book an Appointment
			</button>
		</div>
	);
};

export default Hours;
