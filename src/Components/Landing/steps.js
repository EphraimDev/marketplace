import React from 'react';
import CardTitle from '../CardTitle';
import Image from '../Image';

class Steps extends React.Component {
    render() {
        return (
            <div className="landing-steps-container">
                <CardTitle 
                    name={'In 4 Easy Steps'}
                />
                <center>
                    <div className="container">
                        <div className="row">
                            <div className="col-sm-3 mb-3 mb-md-0">
                                <Image 
                                    src={"https://res.cloudinary.com/ephaig/image/upload/v1555605055/vector1.png"}
                                    alt={"search"}
                                />
                                <br></br>
                                <strong>Find Your Match</strong>
                            </div>

                            <div className="col-sm-3 mb-3 mb-md-0">
                                <Image 
                                    src={"https://res.cloudinary.com/ephaig/image/upload/v1555605056/vector2.png"}
                                    alt={"right plan"}
                                /><br></br>
                                <strong>Choose the Right Plan</strong>
                            </div>

                            <div className="col-sm-3 mb-3 mb-md-0">
                                <Image 
                                    src={"https://res.cloudinary.com/ephaig/image/upload/v1555605055/vector3.png"}
                                    alt={"assessment"}
                                />
                                <br></br>
                                <strong>Get an Assessment</strong>
                            </div>

                            <div className="col-sm-3 mb-3 mb-md-0">
                                <Image 
                                    src={"https://res.cloudinary.com/ephaig/image/upload/v1555605055/vector4.png"}
                                    alt={"begin therapy"}
                                />
                                <br></br>
                                <strong>Begin Therapy</strong>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        );
    }
}

export default Steps;