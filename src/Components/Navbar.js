import React, { Component } from 'react';
import { NavLink } from 'react-router-dom'


class Navbar extends Component{
    render() {
        return (
            <nav class="nav navbar">
  <div className="container-fluid">
    <div className="navbar-header">
      <NavLink className="navbar-brand" href="#">TherapyMart</NavLink>
    </div>
    <ul className="nav navbar-nav">
      <li className="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
        )
    }
}
export default Navbar;