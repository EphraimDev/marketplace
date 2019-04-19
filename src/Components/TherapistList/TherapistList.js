import React, { Component } from 'react';
import TherapistItem from './TherapistItem';
import PropTypes from 'prop-types';
import './therapist.css';

class TherapistList extends Component {
	render() {
		const {therapists} = this.props

		return (
			<div className="list-item">
   				{therapists.map(therapist => <TherapistItem key={therapist._id} therapist={therapist} />)}
   			
  			</div>
		);
	}
}
TherapistList.propTypes = {
  therapists: PropTypes.array.isRequired
}
export default TherapistList;