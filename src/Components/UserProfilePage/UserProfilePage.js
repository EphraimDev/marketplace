import React, { Component } from 'react';
import Navbar from '../Navbar/Navbar';
import { Link } from "react-router-dom";
import { connect } from 'react-redux';
import axios from 'axios';
import toastr from 'toastr'
import 'toastr/build/toastr.min.css'

import './UserProfilePage.css';
import Footer from '../Footer/Footer';
import Loader from '../Loader/Loader';

const token = localStorage.getItem("token");
const userId = localStorage.getItem("userId");
const baseUrl = 'https://api-marketplace.herokuapp.com';
axios.defaults.headers.common = {'Authorization': `Bearer ${token}`,'Content-Type':'application/json'}
let container;

class UserProfile extends Component {
    userId = this.props.userId
    
    state={
        profile: true,
        homeClass: 'home',
        profileClass: "your_profile",
        profilePic: null,
        title: "",
        firstname: "",
        lastname: "",
        email: "",
        number: "",
        ctry: "",
        loader: true,
        user:{},
        appointments:[],
    }
    changeAppointment = e => {
        e.preventDefault();
        this.setState({ profile: false, homeClass: 'your_profile', profileClass: "home" });
    }
    changeProfile = e => {
        e.preventDefault();
        this.setState({ profile: true, homeClass: 'home', profileClass: "your_profile" });
    }
    handleChange = e => {
        e.preventDefault();
        this.setState({ [e.target.name]: e.target.value });
    }
    handleImageChange = e => {
        e.preventDefault();
        this.setState({ [e.target.name]:  e.target.files[0] });
        const {image } = this.state;
        const formData = new FormData();
        formData.append('image', image);
        axios({
            method: "PUT",
            url: `/api/v1/ordinary-users/${this.userId}`,
            data: formData,
            headers: {
              Authorization: token
            }
        })
    };
    handleProfileClick = e => {
        e.preventDefault();
        if (!this.state.profile) {
            this.setState({ profile: true, homeClass: 'home', profileClass: "your_profile" }, () => {   
                this.profile.current.scrollIntoView({
                    behavior: "smooth",
                    block: "nearest"
                })
            })
    }
    }
    handleSubmit = e => {
        e.preventDefault();
        const { title, firstname, lastname, email, number } = this.state;
        if (title === ""){
           this.setState({ title : this.state.user.title || 'Mr'})
        }
        if (firstname === ""){
            this.setState({ firstname :  this.state.user.first_name})
        }
        if (lastname === ""){
            this.setState({ lastname :  this.state.user.last_name})
        }
        if (email === ""){
            this.setState({ email :  this.state.user.email})
        }
        if (number === "" && !this.state.user.phone && !isNaN(number)){
            toastr.options = {
                positionClass : 'toast-top',
                hideDuration: 300,
                timeOut: 5000
              }
              toastr.clear()
              toastr.error("Please check that you have inputed a cuorrect phone number")
        }
        const formData = new FormData();
        formData.set('title', title);
        formData.set('first_name', firstname);
        formData.set('last_name', lastname);
        formData.set('email', email);
        formData.set('phone', number);
        console.log(formData)
        axios({
            method: "PUT",
            url: `${baseUrl}/api/v1/ordinary-users/${userId}`,
            data: formData,
            headers: {
              'Authorization': "Bearer " + token
            }
        })
        .then(res => {
            console.log(res);
            this.setState({ user: res.data.data },()=>{
                toastr.options = {
                    positionClass : 'toast-top',
                    hideDuration: 300,
                    timeOut: 5000
                  }
                  toastr.clear()
                  toastr.info("Profile updated successfully")
                });
                
            })
            .catch( e => {
              console.log(e)
              toastr.options = {
                positionClass : 'toast-top',
                hideDuration: 300,
                timeOut: 5000
              }
              toastr.clear()
              toastr.error("There was an error updating your profile")
          })
    } 

    componentWillMount() {
        axios
            .get(`${baseUrl}/api/v1/appointments/ordinary-user/${userId}`)  //fetch appointments
            .then(res => {
                console.log(res)
                this.setState({loader:false,appointments:res.data.data.user_appointments})
            }).catch(e => {
                this.setState({loader:false})
                console.log(e)
            })
        
        this.getUser();
        
        console.log(userId)
    }
    
  getUser = () => {
    axios({
        method: "GET",
        url:`${baseUrl}/api/v1/auth/user`,
        headers: {
            'Authorization': "Bearer " + token,
            'Content-Type': 'application/json'
        }
      })
      .then(res => {
        console.log(res);
        this.setState({ user: res.data.data });
      })
      .catch( e => {
          console.log(e)
      })
  };
  
    render() {
        return (
            <div>
                <Navbar />
                {
                    this.state.loader ? <Loader /> :
                <div className="main_page">
                    <div className="jumbo">
                        <div className="breadcrumb">
                            <p className="home">Home </p>
                            <p className="bread_right"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i></p>
                            <p className="active_link">Edit profile</p>
                        </div>
                            <div className="profile">
                                <div className="profile_pic">
                                    <form>
                                        <label className="photo_label">Add Photo</label>
                                        <input className="photo" type="file" name="profilePic" />
                                    </form>
                                </div>
                                <div className="profile_details">
                                    <p className="user_name">{this.state.user.first_name +" " + this.state.user.last_name}</p>
                                    <p className="user_email">{this.state.user.email}</p>
                                    { !this.state.user.phone ?
                                    <p className="edit_profile" onClick={this.handleProfileClick}>Edit your profile to input phone number</p> :
                                    <p className="user_email">{this.state.user.phone}</p>
                                    }
                                </div>
                            </div>
                        <div className="breadcrumb2">
                        <div className={this.state.homeClass} onClick={this.changeAppointment}>Your Appointments</div>
                        <div className={this.state.profileClass} onClick={this.changeProfile}>Profile</div>
                        </div>
                    </div>

                    {this.state.profile ?
                        <div className="tabs" ref={this.profile}>
                        <p className="tab_menu">Edit Profile</p>
                            <hr style={{ width: "85%", borderBottom:"1px outset rgba(194, 190, 190,0.8)" }} />
                        <form>
                            <div className="profile_name">
                                <label className="name_label">Name</label>
                                <input className="profile_inputs mr" name="title" type="text" placeholder="Mr" value={this.state.title} onChange={this.handleChange} />
                                <input className="profile_inputs name" name="firstname" type="text" placeholder="First Name" value={this.state.firstname} onChange={this.handleChange} />
                                <input className="profile_inputs name" name="lastname" type="text" placeholder="Last Name" value={this.state.lastname} onChange={this.handleChange} />
                            </div>
                            <div className="profile_name">
                                <label>Email Address</label>
                                <input className="profile_inputs mail" name="email" type="text" placeholder={this.state.user.email} value={this.state.email} onChange={this.handleChange} />
                            </div>  
                            <div className="profile_name">
                                <label>Phone Number</label>
                                <input className="profile_inputs name" name="ctry" type="text" placeholder="(+234) Nigeria" vlaue="(+234) Nigeria" disabled />
                                <input className="profile_inputs name" name="number" type="text" value={this.state.number} onChange={this.handleChange} />
                            </div>
                            <div className="profile_name" style={{marginTop:"30px"}}>
                                <input className="profile_inputs name" style={{backgroundColor: "#01ADBA",color:"white"}} type="submit" value="Change Password" onClick={this.handleChangePasword} />
                                <input className="profile_inputs name" style={{backgroundColor: "#01ADBA",color:"white",cursor:"pointer"}} type="submit" value="Save Changes" onClick={this.handleSubmit} />
                            </div>
                        </form>
                    </div> :
                        <div className="tabs">
                            <p className="tab_menu">Your Appointments</p>
                            <hr style={{width:"85%",height:'5px'}}/>
                            {this.state.appointments.length < 1 ? <div><p>You haven't scheduled any appointments yet</p>
                                        <p>You can schedule one <Link to="/therapists"> here. </Link></p> </div> : this.state.appointments.map(appointment => {
                                            return (
                                    <p>{appointment}</p>
                                )
                            })
                        }
                        </div>
                    }
                </div>}
                <Footer />
            </div>
        )
    }
}

const mapStateToProps = state => ({
    userId: state.users.userId,
    // user: state.users
});

export default connect(mapStateToProps)(UserProfile);