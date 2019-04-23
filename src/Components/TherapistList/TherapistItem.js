import React, { Component } from "react";
import "./therapist.css";
import image from "./img1.jpg";
import { connect } from "react-redux";
import { removeItem, addToCart } from "../../actions/cartActions";

class TherapistItem extends Component {
  handleBooking = id => {
    this.props.addToCart(id);
  };
  removeBooking = id => {
    this.props.removeItem(id);
  };
  render() {
    const {
      id,
      name,
      image_src,
      reviews,
      desc,
      location,
      price
    } = this.props.therapist;
    return (
      <div className="item">
        <img src={image_src} alt="lol" className="item-pics" />
        <p className="item-price">$ {price}</p>
        <p className="item-name">{name}</p>
        <p className="item-review">{reviews} reviews</p>
        <p className="item-text">{desc}</p>
        <span className="item-footer">
          <p className="item-location">
            <i className="fas fa-map-marker-alt" aria-hidden="true" />
            &nbsp;&nbsp;&nbsp; {location}
          </p>
          <p
            className="btn-primary"
            onClick={() => {
              this.handleBooking(id);
            }}
          >
            Book Now
          </p>
        </span>
      </div>
    );
  }
}

const mapDispatchToProps = dispatch => {
  return {
    addToCart: id => {
      dispatch(addToCart(id));
    },
    removeItem: id => {
      dispatch(removeItem(id));
    }
  };
};

export default connect(
  null,
  mapDispatchToProps
)(TherapistItem);
