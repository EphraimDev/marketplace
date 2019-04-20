import React, { Component } from 'react';
import Navbar from '../Navbar/Navbar';

import './UserProfilePage.css';

class UserProfile extends Component {
    state={
        profile: true,
        homeClass: 'home',
        profileClass: "your_profile"
    }
    changeAppointment = e => {
        e.preventDefault();
        this.setState({profile:false, homeClass: 'your_profile', profileClass:"home"})
    }
    changeProfile = e => {
        e.preventDefault();
        this.setState({profile:true, homeClass: 'home', profileClass:"your_profile"})
    }
    render() {
        return (
            <div>
                <Navbar />
                <div className="main_page">
                    <div className="jumbo">
                        <div className="breadcrumb">
                            <p className="home">Home </p>
                            <p className="bread_right"><i class="fa fa-angle-right fa-fw" aria-hidden="true"></i></p>
                            <p className="active_link">Edit profile</p>
                        </div>
                            <div className="profile">
                                <div className="profile_pic">
                                    <p>Add Photo</p>
                                </div>
                                <div className="profile_details">
                                    <p className="user_name">Pau Mo</p>
                                    <p className="user_email">paumo@gmail.com</p>
                                    <p className="edit_profile">Edit your profile to input phone number</p>
                                </div>
                            </div>
                        <div className="breadcrumb2">
                        <div className={this.state.homeClass} onClick={this.changeAppointment}>Your Appointments</div>
                        <div className={this.state.profileClass} onClick={this.changeProfile}>Profile</div>
                        </div>
                    </div>

                    {this.state.profile ?
                        <div className="tabs">
                        <p className="tab_menu">Edit Profile</p>
                            <hr style={{ width: "80%", borderBottom:"1px outset rgba(194, 190, 190,0.8)" }} />
                        <form>
                            <div className="profile_name">
                                <label className="name_label">Name</label>
                                <input className="profile_inputs mr" name="title" type="text" placeholder="Mr"  />
                                <input className="profile_inputs name" name="fname" type="text" placeholder="First Name"  />
                                <input className="profile_inputs name" name="lname" type="text" placeholder="Last Name"  />
                            </div>
                            <div className="profile_name">
                                <label>Email Address</label>
                                <input className="profile_inputs mail" name="email" type="text" placeholder="paumo@gmail.com"  />
                            </div>  
                            <div className="profile_name">
                                <label>Phone Number</label>
                                <input className="profile_inputs name" name="ctry" type="text" placeholder="(+234) Nigeria"  />
                                <input className="profile_inputs name" name="number" type="text" />
                            </div>
                            <div className="profile_name" style={{marginTop:"30px"}}>
                                <input className="profile_inputs name" style={{backgroundColor: "#01ADBA",color:"white"}} type="submit" value="Change Password"  />
                                <input className="profile_inputs name" style={{backgroundColor: "#01ADBA",color:"white"}} type="submit" value="Save Changes" />
                            </div>
                        </form>
                    </div> :
                        <div className="tabs">
                            <p className="tab_menu">Your Appointments</p>
                            <hr style={{width:"80%",height:'5px'}}/>
                        </div>
                    }
                </div>
            </div>
        )
    }
}

export default UserProfile;