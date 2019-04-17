import React, { Component } from 'react';
import { NavLink } from 'react-router-dom';
import Nja from '../../images/img.jpg';
import './Navbar.css';


class Navbar extends Component{
    render() {
        return (
            <nav className="nav nav navbar">
            <div className='navdiv container-fluid'>
    <div className="navbar-header">
                <NavLink className="navbarbrand navbar-brand" to="/">TherapyMart</NavLink>
                <button
                type="button"
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".navbar-collapse"
              >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" />
                <span class="icon-bar" />
                <span class="icon-bar" />
              </button>
    </div>
    <ul className="nav navbar-nav">
      <li className="active"><NavLink to="/">Home</NavLink></li>
      <li ><NavLink to="/therapists">Therapists</NavLink></li>
      <li ><NavLink to="/donate">Donate</NavLink></li>
      <li ><NavLink to="/blog">Blog</NavLink></li>
      <li ><NavLink to="/about_us">About Us</NavLink></li>
      <li ><NavLink to="/new_therepist">Become a Therapist</NavLink></li>
                </ul>
              <div className="navright nav-right">
                    <ul className="nav navbar-nav navbar-right">
                  <li className="nja">
                    <img className="nja_img" src={Nja} alt='nigeria_icon' />  &#8358; <span className="caret"></span>
                    </li>
                  <li className="acc"><span className="fa fa-user-circle fa-3x fa3x"></span> Account<span className="caret"></span></li>
                  </ul>
                
                    </div>
  </div>
</nav>
        )
    }
}
export default Navbar;
