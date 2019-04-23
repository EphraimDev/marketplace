import React from 'react';
import Modal from '../UI/Modal';

const UpdatePassword = (props) => {
        return (
            <div style={{width:'30%'}}>
                <Modal  show={props.shows} clicked={props.clicked}>
                    <div className="update">
                        <form  onSubmit={props.submit}>
                            <h3 style={{textAlign:"center", paddingTop:"30px"}}>Update Password</h3>
                            <hr />
                            <div className="update_tabs" style={{alignContent:"center"}}>
                                <input className="profile_inputs mail" style={{marginBottom:"25px"}} type="password" value={props.oldpassword} name="oldpassword" onChange={props.onChangeHandler} placeholder="Old password"  required />
                                <input className="profile_inputs mail" style={{marginBottom:"25px"}} type="password" value={props.newpassword} name="newpassword" onChange={props.onChangeHandler}  placeholder="New password" required />
                                <input className="profile_inputs mail" style={{marginBottom:"25px"}} type="password" value={props.repeatpassword} name="repeatpassword" onChange={props.onChangeHandler}  placeholder="Repeat password" required />
                                {props.error ? <p style={{color:"red", fontStyle:"italic"}}>passwords do not match</p> : null}
                                <hr style={{marginLeft:"-25%"}} />
                                { !props.load ? <input className="profile_inputs name" type="submit" style={{backgroundColor: "#01ADBA",color:"white",cursor:"pointer", marginBottom:"30px"}} value="Update" /> :
                                <button className="profile_inputs name " type="submit" style={{width: "200px", backgroundColor: "#01ADBA",color:"white",cursor:"pointer", marginBottom:"30px"}} >
                                Please wait <i class="fa fa-spinner fa-spin"></i>
                              </button>}
                            </div>
                        </form>
                    </div>
                </Modal>
        </div>
    )
}
export default UpdatePassword;