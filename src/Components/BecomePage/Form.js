import React, { Component } from "react";

class Form extends Component {
	state = {};

	render() {
		return (
			<form className="data-form">
				<h4>Step 1: Account</h4>
				{/* Personal details */}
				<div className="row">
					<div className="form-group col-md-6">
						<input
							type="text"
							class="form-control"
							name="firstName"
							placeholder="First Name"
						/>
					</div>
					<div className="form-group col-md-6">
						<input
							type="text"
							className="form-control"
							name="lastName"
							placeholder="Last Name"
						/>
					</div>
				</div>
				{/* Email and password */}
				<div className="row">
					<div className="form-group col-md-6">
						<input
							type="email"
							className="form-control"
							name="email"
							placeholder="Work Email"
						/>
					</div>
					<div className="form-group col-md-6">
						<input
							type="password"
							className="form-control"
							name="password"
							placeholder="New Password"
						/>
					</div>
				</div>
				{/* How did you hear about us */}
				<div className="row">
					<div class="form-group col-md-12">
						<select name="options" class="form-control">
							<option selected>How did you hear about us?</option>
							<option>Facebook</option>
							<option>Twitter</option>
						</select>
					</div>
				</div>

				<h4>Step 2: Office details</h4>
				<p>
					All of the questions in this section pertain to TherapyMart's search
					functionality. If you want your profile to appear in searches by
					location, please be sure to fill out this section as accurately as
					possible.
				</p>

				{/* Name of practice */}
				<div className="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							class="form-control"
							name="nameOfPractice"
							placeholder="Name of Practice(Optional)"
						/>
					</div>
				</div>
				{/* Website and phone */}
				<div className="row">
					<div className="form-group col-md-6">
						<input
							type="text"
							class="form-control"
							name="website"
							placeholder="Practice Website"
						/>
					</div>
					<div className="form-group col-md-6">
						<input
							type="text"
							className="form-control"
							name="phone"
							placeholder="Office Phone"
						/>
					</div>
				</div>
				{/* Adresses */}
				<div className="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							class="form-control"
							name="adress1"
							placeholder="Adress Line 1: Street adress, P.O. Box, C/O, e.t.c"
						/>
					</div>
				</div>
				<div className="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							class="form-control"
							name="adress2"
							placeholder="Adress Line 2: Apt, Suite, Office, e.t.c "
						/>
					</div>
				</div>
				{/* Location */}
				<div className="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							class="form-control"
							name="city"
							placeholder="City"
						/>
					</div>
				</div>
				<div className="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							class="form-control"
							name="state"
							placeholder="State/ Province/ Region"
						/>
					</div>
				</div>
				<div className="row">
					<div class="form-group col-md-12">
						<select name="country" class="form-control">
							<option selected>Country of Practice</option>
							<option>Nigeria</option>
							<option>Germany</option>
						</select>
					</div>
				</div>
				<h4>Step 3: Public Profile</h4>
				<p>
					The questions contained in this part will be used to build your public
					TherapyMart profile. After we approve your application, you will be
					able to edit this information at any time.
				</p>
				{/* Public profile */}
				<div className="row">
					<div class="form-group col-md-12">
						<select name="country" class="form-control">
							<option selected>Title</option>
							<option>Mr</option>
							<option>Mrs</option>
						</select>
					</div>
				</div>
				<div className="row">
					<div className="form-group col-md-6">
						<input
							type="text"
							class="form-control"
							name="pronouns"
							placeholder="Personal Pronouns"
						/>
					</div>
					<div class="form-group col-md-6">
						<select name="therapistType" class="form-control">
							<option selected>Therapist type</option>
							<option>Yoga</option>
							<option>Psychologist</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							class="form-control"
							name="lincenseType"
							placeholder="Type of Lincense(LPC, LMFT, LCSW, Phd, e.t.c)"
						/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<input
							type="text"
							class="form-control"
							name="years"
							placeholder="Years in Practice"
						/>
					</div>
					<div class="form-group col-md-6">
						<input
							type="text"
							class="form-control"
							name="lincensedIn"
							placeholder="Lincensed In(Optional)"
						/>
					</div>
				</div>
				{/* Instituitions */}
				<div class="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							class="form-control"
							name="undergraduate"
							placeholder="Undergraduate Instituition Name: (Optional)"
						/>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<input
							type="text"
							s
							class="form-control"
							name="postgraduate"
							placeholder="Postgraduate Instituition Name: (Optional)"
						/>
					</div>
				</div>
				<h4>Profile details</h4>
				<p>Personal Statement</p>
				{/* Personal Statement */}
				<div class="row">
					<div class="form-group col-md-12">
						<textarea class="form-control" name="statement" rows="3" />
					</div>
				</div>
				<p>Press Enter (or Return) to begin a new line</p>
				<p>Press Enter (or Return) twice to begin a new paragraph</p>
				<br />
				{/* Profile photo */}
				<p>Profile Photo</p>

				{/* Todo: Insert Photo Upload widget */}
				<br />
				<h4>Step 4: Agreement</h4>
				<p>By submitting this form:</p>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="agreement" />
				</div>
				<p class="ml-3">
					You agree to keep your profile up-to-date, especially maintaining the
					accuracy of your availability.
				</p>
				<br />
				<button class="form-cta">Save</button>
				<button type="submit" class="form-cta submit ml-3">
					Submit
				</button>
			</form>
		);
	}
}

export default Form;
