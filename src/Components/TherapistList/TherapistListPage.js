import React, { Component } from 'react';
import TherapistList from './TherapistList';
import './therapist.css';
import PageNav from '../PageNavigation';
import Therapist from './therapists';
import image from "./img1.jpg";
import Footer from "../Footer/Footer";
import Navbar from "../Navbar/LoggedNav";

class TherapistListPage extends Component {
  constructor(props) {
    super(props);
    this.state = {
      textField: "",
      opts: "",
      filter: "price"
    };
    this.onChange = this.onChange.bind(this);
    this.onSubmit = this.onSubmit.bind(this);
  }
 			
 	onSubmit(e){
 		e.preventDefault();
 	}
 	

 	onChange(e){
 		this.setState({ [e.target.name]: e.target.value });
 	}

	render() {

		const therapists = [
 				{
 					name:"King Kong",
 					location:"Jungle Habitat",
 					price:"$2000",
 					reviews:"30",
 					desc:"Animal specialist",
 					image_src:image
 				},
 				{
 					name:"King Kong",
 					location:"Jungle Habitat",
 					price:"$2000",
 					reviews:"30",
 					desc:"Animal specialist",
 					image_src:image
 				},
 				{
 					name:"King Kong",
 					location:"Jungle Habitat",
 					price:"$2000",
 					reviews:"30",
 					desc:"Animal specialist",
 					image_src:image
 				},
 				{
 					name:"King Kong",
 					location:"Jungle Habitat",
 					price:"$2000",
 					reviews:"30",
 					desc:"Animal specialist",
 					image_src:image
 				}

 		]
		return (
			<div>
				<Navbar />
				<PageNav link={"Nigeria (811 Therapists)"} />
			<div className="container">
		<section className="therapist-section">
		<form onSubmit={this.onSubmit}>		
    <div className="search-field">	
     {/*} <div className="inputWithIcon"> 
        <input type="text" name="textField" onChange={this.onChange} value={this.state.textField} placeholder="Enter Location, city or landmark" name="" className="input"></input>
      <i className="fa fa-search fa-lg fa-fw" aria-hidden="true"></i>
      </div> */}
      <input type="text" name="textField" onChange={this.onChange} value={this.state.textField} placeholder="Enter Location, city or landmark" className="input"></input>
      <select name="opts" value={this.state.opts} onChange={this.onChange}  className="input3">
  <option value="volvo">I need Help with</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>
      <button type="submit" className="input2 btn-primary">Search Theraphist</button>  
    </div>
    </form>
</section>
<section className="list-page therapist-section">
  <div className="search-match"> 811 Therapists match your search</div>
  <div className="search-row">
   <div className="search-filter">
     <p>  Filter </p>
     <select name="filter" value={this.state.filter} onChange={this.onChange} >
  <option value="price">Price</option>
  <option value="time">Time</option>
  <option value="review">Review</option>
  <option value="location">Location</option>
</select>
   </div> 
  </div>
  
	<Therapist />
  </section>
 	{/* <!-- pagination starts here --> */}
  <div className="pagination">
    <p className="result">Showing Result 1-10 of 80</p>
    <p className="arrow"><i className="fas fa-long-arrow-alt-left"></i></p>
    <ul className="pages">
      <li className="active"> <a href="" > 1</a></li>
      <li className="page"><a href=""> 2</a></li>
      <li className="page"><a href=""> 3</a></li>
      <li className="page"><a href=""> 4</a></li>
    </ul>
    <p className="arrow"><i className="fas fa-long-arrow-alt-right"></i></p>
  </div>
</div>
</div>
		);
	}
  onSubmit(e) {
    e.preventDefault();
  }

  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }

  render() {
    const therapists = [
      {
        name: "King Kong",
        location: "Jungle Habitat",
        price: "$2000",
        reviews: "30",
        desc: "Animal specialist",
        image_src: image
      },
      {
        name: "King Kong",
        location: "Jungle Habitat",
        price: "$2000",
        reviews: "30",
        desc: "Animal specialist",
        image_src: image
      },
      {
        name: "King Kong",
        location: "Jungle Habitat",
        price: "$2000",
        reviews: "30",
        desc: "Animal specialist",
        image_src: image
      },
      {
        name: "King Kong",
        location: "Jungle Habitat",
        price: "$2000",
        reviews: "30",
        desc: "Animal specialist",
        image_src: image
      }
    ];
    return (
      <div>
        <Navbar />
        <div className="containerx">
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
                  Search Theraphist
                </button>
              </div>
            </form>
          </section>
          <section className="list-page">
            <div className="search-match"> 219 Theraphist match your seach</div>
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
          <div className="pagination">
            <p className="result">Showing Result 1-10 of 80</p>
            <p className="arrow">
              <i className="fas fa-long-arrow-alt-left" />
            </p>
            <ul className="pages">
              <li className="active">
                {" "}
                <a href=""> 1</a>
              </li>
              <li className="page">
                <a href=""> 2</a>
              </li>
              <li className="page">
                <a href=""> 3</a>
              </li>
              <li className="page">
                <a href=""> 4</a>
              </li>
            </ul>
            <p className="arrow">
              <i className="fas fa-long-arrow-alt-right" />
            </p>
          </div>
        </div>
        <Footer />
      </div>
    );
  }
}
export default TherapistListPage;
