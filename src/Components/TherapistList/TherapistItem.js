import React, { Component } from 'react';
import './therapist.css';
import  image from'./img1.jpg'

 class TherapistItem extends Component {
	render() {
		 const { name, image_src,reviews, desc, location,price } = this.props.therapist;
		return (
			 <div className="item">
      <img src={image_src} alt="lol" className="item-pics" />
      <p className="item-price">{price}</p>
      <p className="item-name">{name}</p>
      <p className="item-review">{reviews} reviews</p>
      <p className="item-text">{desc}</p>
      <span className="item-footer">
        <p className="item-location"><i className="fas fa-map-marker-alt" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;    {location}</p>
        <p className="btn-primary">Book Now</p>
      </span>
      
    </div>
		);
	}
}

export default TherapistItem;