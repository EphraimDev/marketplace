import React from "react";

const ContactInfo = props => {
	return (
		<div className="contact-details card py-2 mt-5">
			<div className="heading px-2 py-2 d-flex justify-content-between">
				<p className="my-0">Contact Information</p>
				<i className="fa fa-ellipsis-v" />
			</div>
			<p class="email info pb-1 mx-4">
				<i class="fa fa-envelope mr-2" />
				doe@therapymart.com
			</p>
			<p class="phone info pb-1 mx-4">
				<i class="fa fa-phone mr-2" />
				+234890033443
			</p>
			<p class="work info pb-1 mx-4">
				<i class="fa fa-briefcase mr-2" />
				+01343223
			</p>
		</div>
	);
};

export default ContactInfo;
