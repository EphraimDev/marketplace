import React from "react";

const ProfileCard = props => {
	return (
		<div className="card">
			<div className="profile-info mx-auto">
				<img
					className="profile-img d-block"
					src="https://res.cloudinary.com/mrphemi/image/upload/v1555763571/15.jpg"
				/>
				<span className="status" />
				<span className="rating">
					<i className="fa fa-star" /> 5
				</span>
			</div>
			<h5 className="card-title text-center">Dr. Doe</h5>
			<div className="stats d-flex justify-content-around">
				<p className="clients text-center">
					40 <br />
					Clients
				</p>
				<p className="visits text-center">
					150 <br />
					Visits
				</p>
			</div>
		</div>
	);
};

export default ProfileCard;
