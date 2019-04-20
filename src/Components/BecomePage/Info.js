import React from "react";
import Btn from "./Btn";

const Info = props => {
	return (
		<div className="info">
			<p>
				Thank you for your interest in becoming therapist on this platform. If
				you have any questions, feel free to contact us here. We look forward to
				recieving your application.
			</p>
			<Btn class="button">
				<i class="fa fa-envelope" />
				Email Us
			</Btn>
			<Btn class="button">
				<i class="fa fa-mobile" />
				+23490998578
			</Btn>
			<Btn class="button">
				<i class="fa fa-comment" /> Chat
			</Btn>
			<hr />
			<p>
				Once you have been approved, we'll ask you to scan and email us a copy
				of your liability insurance information and state lincense. Want to
				learn more about been a member of TherapyMart?
			</p>
			<Btn class="button">VISIT OUR THERAPIST FAQS</Btn>
		</div>
	);
};

export default Info;
