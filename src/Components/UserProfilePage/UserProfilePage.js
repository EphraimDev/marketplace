import React, { Component } from 'react';
import Navbar from '../Navbar/Navbar';
import { Link } from "react-router-dom";
import axios from 'axios';
import toastr from 'toastr'
import 'toastr/build/toastr.min.css'

import './UserProfilePage.css';
import Footer from '../Footer/Footer';
import Loader from '../Loader/Loader';
import UpdatePassword from './UpdatePassword';

const token = localStorage.getItem("token");
const userId = localStorage.getItem("userId");
const baseUrl = 'https://api-marketplace.herokuapp.com';
axios.defaults.headers.common = {'Authorization': `Bearer ${token}`,'Content-Type':'application/json'}

class UserProfile extends Component {
    
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
        newpassword:"",
        oldpassword:"",
        repeatpassword: "",
        passwordError:false,
        show: false,
        load: false,
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
        const formData = new FormData();
        const { title, firstname, lastname, email, number } = this.state;
        if (title === ""){
        formData.set('title', this.state.user.title || 'Mr');
        }
        if (firstname === ""){
        formData.set('first_name', this.state.user.first_name)
        }
        if (lastname === ""){
            formData.set('last_name',  this.state.user.last_name)
        }
        if (email === ""){
            formData.set('email', this.state.user.email)
        }
        if (number === "" && !this.state.user.phone && !isNaN(number)){
            toastr.options = {
                positionClass : 'toast-top',
                hideDuration: 300,
                timeOut: 5000
              }
              toastr.clear()
              toastr.error("Please check that you have inputed a correct phone number")
        }
        if(number === "" && this.state.user.phone){
            formData.set('number', this.state.user.phone)
        }else{
        formData.set('title', title);
        formData.set('first_name', firstname);
        formData.set('last_name', lastname);
        formData.set('email', email);
        formData.set('phone', number);}
        axios({
            method: "POST",
            url: `${baseUrl}/api/v1/ordinary-users/${userId}`,
            data: formData,
            headers: {
              'Authorization': "Bearer " + token,
            }
        })
        .then(res => {
            console.log(res);
            this.getUser()
            toastr.options = {
                positionClass : 'toast-top',
                hideDuration: 300,
                timeOut: 5000
                }
                toastr.clear()
                toastr.success("Profile updated successfully")
                this.setState({
                    title:"",
                    firstname:"",
                    lastname:"",
                    email:"",
                    number:"",
                })
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
    }
    
    getUser = () => {
    axios({
        method: "GET",
        url: `${baseUrl}/api/v1/auth/user`,
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
    }

    updatePasswordHandler = (e) => {
        e.preventDefault();
        this.state.show ? this.setState({show:false}) : this.setState({show:true})
    }

    updatePasswordChange = (e) => {
        e.preventDefault();
        this.setState({[e.target.name] : e.target.value})
    }

    submitPassword = (e) =>{
        e.preventDefault();
        if (this.state.newpassword !== this.state.repeatpassword) {
            this.setState({passwordError: true})
        } else {
            const formData = new FormData();
            formData.set('old_password', this.state.oldpassword);
            formData.set('new_password', this.state.newpassword);
            formData.set('confirm_password', this.state.repeatpassword);
            this.setState({passwordError: false, load:true})
            
            formData.entries()
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]); 
            }
            fetch(`${baseUrl}/api/v1/auth/change-password`,{
                method: "PUT",
                body: formData,
                headers: {
                    Authorization: "Bearer " + token,
                    'Content-Type' : "application/json"
                }
              })
                .then(res => {
                    // console.log(this.state.newpassword +" " + this.state.oldpassword +" "  + this.state.repeatpassword)
                    if (res.status.code === 200) {
                      this.setState({show:false, load: false},()=>{
                        toastr.options = {
                            positionClass : 'toast-top',
                            hideDuration: 300,
                            timeOut: 5000
                          }
                          toastr.clear()
                          toastr.info("Your password has been changed")
                        })
                  }else{
                      console.log(res)
                      res.json().then(res=>console.log(res.error.errors))
                      throw Error
                  }
              }).catch(e=>{
                  console.log(e)
                this.setState({load: false},()=>{
                    toastr.options = {
                        positionClass : 'toast-top',
                        hideDuration: 300,
                        timeOut: 5000
                      }
                      toastr.clear()
                      toastr.error("An error occurred, please try again")
                    })
                    alert(`An error occurred, please try again`)
                    this.setState({
                        newpassword:"",
                        oldpassword:"",
                        repeatpassword :"",
                    })
              })
            
        }
    }

    render() {
        return (
            <div>
                <Navbar />
                {
                    this.state.loader ? <Loader /> :
                <div className="main_page">
                    <div className="jumbo">
                        <div className="breadcrumb">
                            <p className="home"><Link to="/"> Home </Link></p>
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
                        <form onSubmit={this.handleSubmit}>
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
                                <input className="profile_inputs name" name="number" type="text" placeholder="08012345678" value={this.state.number} onChange={this.handleChange} />
                            </div>
                            <div className="profile_name" style={{marginTop:"30px"}}>
                                <input className="profile_inputs name" style={{backgroundColor: "#01ADBA",color:"white",cursor:"pointer"}} type="submit" value="Change Password" onClick={this.updatePasswordHandler} />
                                <input className="profile_inputs name" style={{backgroundColor: "#01ADBA",color:"white",cursor:"pointer"}} type="submit" value="Save Changes"/>
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
                
                <UpdatePassword
                shows={this.state.show}
                oldpassword={this.state.oldpassword}
                newpassword={this.state.newpassword}
                repeatpassword={this.state.repeatpassword}
                clicked={this.updatePasswordHandler}
                onChangeHandler={this.updatePasswordChange}
                submit={this.submitPassword}
                error={this.state.passwordError}
                load={this.state.load}
                />
                <Footer />
            </div>
        )
    }
}


export default UserProfile;