import React, { Component } from "react";
import TherapistList from "./TherapistList";
import "./therapist.css";
// import PageNav from "../PageNavigation";
// import Therapist from "./therapists";
import image from "./img1.jpg";
import Footer from "../Footer/Footer";
import Navbar from "../Navbar/LoggedNav";
import { connect } from "react-redux";
import { removeItem, addToCart } from "../../actions/cartActions";

class TherapistListPage extends Component {
  constructor(props) {
    super(props);
    console.log(this.props);
    this.state = {
      textField: "",
      opts: "",
      filter: "price"
    };
    this.onChange = this.onChange.bind(this);
    this.onSubmit = this.onSubmit.bind(this);
  }

  handleBooking = id => {
    this.props.addToCart(id);
  };
  removeBooking = id => {
    this.props.removeItem(id);
  };

  onSubmit(e) {
    e.preventDefault();
  }

  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }

  render() {
    const therapists = this.props.therapists;
    return (
      <div>
        <Navbar />
        <div class="containerx">
          <section>
            <form onSubmit={this.onSubmit}>
              <div className="search-field">
                {/*} <div className="inputWithIcon"> 
		<input type="text" name="textField" onChange={this.onChange} value={this.state.textField} placeholder="Enter Location, city or landmark" name="" className="input"></input>
	<i className="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
	</div> */}
                <input
                  type="text"
                  name="textField"
                  onChange={this.onChange}
                  value={this.state.textField}
                  placeholder="Enter Location, city or landmark"
                  className="input"
                />
                <select
                  name="opts"
                  value={this.state.opts}
                  onChange={this.onChange}
                  className="input3"
                >
                  <option value="volvo">I need Help with</option>
                  <option value="saab">Saab</option>
                  <option value="fiat">Fiat</option>
                  <option value="audi">Audi</option>
                </select>
                <button type="submit" className="input2 btn-primary">
                  Search Therapist
                </button>
              </div>
            </form>
          </section>
          <section className="list-page">
            <div className="search-match"> 219 Therapist match your seach</div>
            <div className="search-row">
              <div className="search-filter">
                <p> Filter </p>
                <select
                  name="filter"
                  value={this.state.filter}
                  onChange={this.onChange}
                >
                  <option value="price">Price</option>
                  <option value="time">Time</option>
                  <option value="review">Review</option>
                  <option value="location">Location</option>
                </select>
              </div>
            </div>
            <TherapistList therapists={therapists} />
          </section>
          {/* <!-- pagination starts here --> */}
          <div class="pagination">
            <p class="result">Showing Result 1-10 of 80</p>
            <p class="arrow">
              <i class="fas fa-long-arrow-alt-left" />
            </p>
            <ul class="pages">
              <li class="active">
                {" "}
                <a href=""> 1</a>
              </li>
              <li class="page">
                <a href=""> 2</a>
              </li>
              <li class="page">
                <a href=""> 3</a>
              </li>
              <li class="page">
                <a href=""> 4</a>
              </li>
            </ul>
            <p class="arrow">
              <i class="fas fa-long-arrow-alt-right" />
            </p>
          </div>
        </div>
        <Footer />
      </div>
    );
  }
}
const mapStateToProps = state => {
  return { therapists: state.therapists.therapists };
};

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
  mapStateToProps,
  mapDispatchToProps
)(TherapistListPage);
