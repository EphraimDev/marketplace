import React from 'react';
import CardTitle from '../CardTitle';
import Button from '../Button';

class Blog extends React.Component {
    render() {
        return (
            <div className="landing-blog-container">
                <CardTitle 
                    name={'From the Blog'}
                    description={'Trendy therapy articles and posts for you'}
                />
                <div className="container">
                    <div className="card-deck">
                        <div className="card mb-4">
                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555607350/car.png" alt="Card image cap" />
                                <a href="#" className="link1">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div className="card-body">
                                <h4 className="card-title">Therapy ideas</h4>
                                <p className="card-text">Without therapy, life would be a mistake</p>
                                <a href="#" className="link2">Read more..</a>
                                <hr></hr>
                                <div className="blog-owner">
                                    <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605056/Group.png"/>  Paul Rand
                                </div>
                            </div>

                        </div>

                        <div className="card mb-4 landing-blog-select">

                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555447811/image_copy.png" alt="Card image cap" />
                                <a href="#!" className="link1">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <div className="card-body">

                                <h4 className="card-title">Therapy ideas</h4>
                                <p className="card-text">One good thing about therapy, when it hits you</p>
                                <a href="#" className="link2">Read more..</a>
                                <hr></hr>
                                <div>
                                    <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605055/Group_2.png" />  Ian Reevees
                                </div>
                            </div>

                        </div>

                        <div className="card mb-4">

                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555447812/image_copy_2.png" alt="Card image cap" />
                                <a href="#" className="link1">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <div className="card-body">

                                <h4 className="card-title">Therapy ideas</h4>
                                <p className="card-text">None but ourselves can free our minds</p>
                                <a href="" className="link2">Read more..</a>
                                <hr></hr>
                                <div>
                                    <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605055/Group_3.png" />  Georgial Alvarado
                                </div>
                            </div>

                        </div>
                        <div className="card mb-4">

                            <div className="view overlay">
                                <img className="card-img-top" src="https://res.cloudinary.com/ephaig/image/upload/v1555447811/image_copy_3.png" alt="Card image cap" />
                                <a href="#!" className="link1">
                                    <div className="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <div className="card-body">

                                <h4 className="card-title">Therapy ideas</h4>
                                <p className="card-text">Some people have lives, some people have therapy</p>
                                <a href="" className="link2">Read more..</a>
                                <hr></hr>
                                <div>
                                    <img src="https://res.cloudinary.com/ephaig/image/upload/v1555605056/Group_4.png" />  Justin Ortiz
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <br></br>
                <div align="center">
                    <Button
                    class={"btn landing-button"}
                    type={"button"}
                    value={"Read about Therapy"}
                     />
                </div>
                <br></br><br></br><br></br>
            </div>
        );
    }
}

export default Blog;