import React from "react";

const Skills = props => {
	return (
		<div className="knowledge mt-5">
			<div className="qualification card d-flex flex-row justify-content-around grey-bg">
				<div className="align-self-center">
					<i className="fa fa-graduation-cap" />
				</div>
				<div>
					<p className="font-weight-bold">Qualification</p>
					<p>M.M.S, B.sc Human Therapy</p>
				</div>
			</div>
			<div className="skill card mt-5 d-flex flex-row justify-content-around grey-bg">
				<div className="align-self-center">
					<i className="fa fa-wrench" />
				</div>
				<div>
					<p className="font-weight-bold">Skills</p>
					<p>Excellent in Communication</p>
				</div>
			</div>
		</div>
	);
};

export default Skills;
