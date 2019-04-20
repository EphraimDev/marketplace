import React from 'react';
import CardTitle from '../CardTitle';

class Featured extends React.Component {
    render() {
        return (
            <div className="landing-blog-container">
                <CardTitle 
                    name={"We've Been Featured In"}
                />
                <div className="container">
                    <div className="row">

                    <div className="col-sm-3 mb-3 mb-md-0">
                        <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605056/image.png" />
                    </div>

                    <div className="col-sm-3 mb-3 mb-md-0">
                        <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605056/image_2.png" />
                    </div>

                    <div className="col-sm-3 mb-3 mb-md-0">
                        <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605056/image_3.png" />
                    </div>

                    <div className="col-sm-3 mb-3 mb-md-0">
                        <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605056/image_4.png" />
                    </div>

                    </div>
                </div>
                <br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
            </div>
        )
    }
}

export default Featured;