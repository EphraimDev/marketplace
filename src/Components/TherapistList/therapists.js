import React from 'react';
import CardTitle from '../CardTitle';

class Therapist extends React.Component {
    render() {
        return (
            <div className="landing-blog-container">
                <CardTitle 
                    name={"811 Therapists match your search"}
                />

                <div className="container">
                    <div className="card-deck">
                        <div className="card mb-4">
                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555447743/Bitmap.png" alt="Card image cap" />
                                <a href="#!">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <div className="card-body">

                                <h4 className="card-title">Lilly Schmidt</h4>
                                <p className="card-text">2 reviews</p>
                                <p>Marriage and Family therapist <i className="fa fa-map-marker-alt landing-icon"></i> Lagos, Nigeria</p>
                            
                            </div>

                        </div>

                        <div className="card mb-4">

                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555447782/Bitmap_1.png" alt="Card image cap" />
                                <a href="#!">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div className="card-body">

                                <h4 className="card-title">Card title</h4>
                                <p className="card-text">2 Reviews</p>
                                <p>Marriage and Family therapist <i className="fa fa-map-marker-alt landing-icon"></i> Atlanta, USA</p>
                                

                            </div>

                        </div>
                        <div className="card mb-4">

                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555447783/Bitmap_3.png" alt="Card image cap" />
                                <a href="#!">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <div className="card-body">

                                <h4 className="card-title">Lilly Schmidt</h4>
                                <p className="card-text">2 Reviews</p>
                                <p>Marriage and Family therapist <i className="fa fa-map-marker-alt landing-icon"></i> Lagos, Nigeria</p>
                            

                            </div>

                        </div>
                        <div className="card mb-4">

                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555447783/Bitmap_2.png" alt="Card image cap" />
                                <a href="#!">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <div className="card-body">

                                <h4 className="card-title">Card title</h4>
                                <p className="card-text">2 Reviews</p>
                                <p>Marriage and Family therapist</p>
                                    <i className="fa fa-map-marker-alt landing-icon"></i> Atlanta, USA
                            

                            </div>

                        </div>

                    </div>
                </div>

                <br></br><br></br><br></br><br></br><br></br>
            </div>
        )
    }
}

export default Therapist;