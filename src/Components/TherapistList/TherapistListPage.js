import React, { Component } from 'react';
import TherapistList from './TherapistList';
import './therapist.css';
import  image from'./img1.jpg'


 class TherapistListPage extends Component {
     constructor(props) {
 		super(props);
  this.state = {
 			textField: "",
 			opts:"",
 			filter:"price"
 		}
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
			<div class="containerx">

			
		<section>
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
<section className="list-page">
  <div className="search-match"> 219 Theraphist match your seach</div>
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
  <TherapistList therapists={therapists} />

  </section>
 	{/* <!-- pagination starts here --> */}
  <div class="pagination">
    <p class="result">Showing Result 1-10 of 80</p>
    <p class="arrow"><i class="fas fa-long-arrow-alt-left"></i></p>
    <ul class="pages">
      <li class="active"> <a href="" > 1</a></li>
      <li class="page"><a href=""> 2</a></li>
      <li class="page"><a href=""> 3</a></li>
      <li class="page"><a href=""> 4</a></li>
    </ul>
    <p class="arrow"><i class="fas fa-long-arrow-alt-right"></i></p>
  </div>
</div>
		);
	}
}
export default TherapistListPage;