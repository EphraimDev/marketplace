import React from "react";

const Btn = props => {
	return <button className={props.class}>{props.children}</button>;
};

export default Btn;
