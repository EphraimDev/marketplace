import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class FindTherapy extends Component{
    render(){
        return (
            <div>
            <header>
        <div className="jumbotron">
            <h1>Find the right <br />
                Therapist for you
            </h1>
            <p>Search from over 350 therapist in 40 countries in the world</p>
        </div>
        <form id="search-form" action="">
            <input type="text" name="" id="" />
            <select name="" id="">
                <option value="I need help with" disabled selected>I need help with</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Algeria">Algeria</option>
                <option value="France">France</option>
                <option value="Miami">Miami</option>
            </select>
            <button className="btn">Search Therapist</button>
        </form>
    </header>
    <div className="lg-container">
        <section className="feature">
            <h2>Featured Therapist</h2>
            <p>A quick view of therapist leading the chart</p>
            <hr />
            <div className="row">
                <div className="card">
                    <div className="img-box">
                        <img src="bg.jpg" alt="alt" />
                    </div>
                    <div className="info">
                        <h4 className="title">Lily Schmidt</h4>
                        <p className="reviews">2 reviews</p>
                        <p className="type">Marriage Therapist</p>
                        <p className="location">Lagos, Nigeria</p>
                    </div>
                </div>
                <div className="card">
                    <div className="img-box">
                        <img src="bg.jpg" alt="alt" />
                    </div>
                    <div className="info">
                        <h4 className="title">Lily Schmidt</h4>
                        <p className="reviews">2 reviews</p>
                        <p className="type">Marriage Therapist</p>
                        <p className="location">Lagos, Nigeria</p>
                    </div>
                </div>
                <div className="card">
                    <div className="img-box">
                        <img src="bg.jpg" alt="alt" />
                    </div>
                    <div className="info">
                        <h4 className="title">Lily Schmidt</h4>
                        <p className="reviews">2 reviews</p>
                        <p className="type">Marriage Therapist</p>
                        <p className="location">Lagos, Nigeria</p>
                    </div>
                </div>
                <div className="card">
                    <div className="img-box">
                        <img src="bg.jpg" alt="alt" />
                    </div>
                    <div className="info">
                        <h4 className="title">Lily Schmidt</h4>
                        <p className="reviews">2 reviews</p>
                        <p className="type">Marriage Therapist</p>
                        <p className="location">Lagos, Nigeria</p>
                    </div>
                </div>
            </div>
        </section>
    
        <section className="country-section">
            <h2>Choose your Countries</h2>
            <p>180,178+ Therapist in the world</p>
            <hr />
            <div className="row">
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America</h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
                <div className="us">
                    <h4 className="country">United States of America </h4>
                    <p className="num-therapist">82,667 therapist in United States of America</p>
                </div>
            </div>
        </section>

        <section>
            <h2>Popular Therapist Issues</h2>
            <p>See our top picks for therapists.</p>
            <hr />
            <div className="row">
                <div className="issue">
                    <h4 className="country">Marriage Therapists</h4>
                    <p>227 therapists</p>
                </div>
                <div className="issue">
                    <h4 className="country">Marriage Therapists</h4>
                    <p>227 therapists</p>
                </div>
                <div className="issue">
                    <h4 className="country">Marriage Therapists</h4>
                    <p>227 therapists</p>
                </div>
                <div className="issue">
                    <h4 className="country">Marriage Therapists</h4>
                    <p>227 therapists</p>
                </div>
                <div className="issue">
                    <h4 className="country">Marriage Therapists</h4>
                    <p>227 therapists</p>
                </div>
            </div>
        </section>

        <section>
            <h2>In 4 easy steps</h2>
            <div className="row">
                <div className="step">
                    <img className="icon"  alt="alt"/>
                    <div className="circle"></div>
                    <p>Find Your Match</p>
                </div>
                <div className="step">
                    <img className="icon"  alt="alt"/>
                    <div className="circle"></div>
                    <p>Find Your Match</p>
                </div>
                <div className="step">
                    <img className="icon"  alt="alt"/>
                    <div className="circle"></div>
                    <p>Find Your Match</p>
                </div>
                <div className="step">
                    <img className="icon"  alt="alt"/>
                    <div className="circle"></div>
                    <p>Find Your Match</p>
                </div>
            </div>
    
        </section>
        <section>
            <h2>Choose your Countries</h2>
            <p>180,178+ Therapist in the world</p>
            <hr />
            <div className="row">
                <div className="card blog">
                    <div className="img-box">
                        <img src="bg.jpg" alt="alt" />
                    </div>
                    <div className="info">
                        <h4 className="title">Therapy Ideas</h4>
                        <p className="paragraph">Therapy is always a good idea, life would be a mistake.</p>
                        <Link to="#">Read more</Link>
                        <hr className="blog-line"/>
                        <p className="author">Paul Gray</p>
                    </div>
                </div>
                <div className="card blog">
                    <div className="img-box">
                        <img src="bg.jpg" alt="alt" />
                    </div>
                    <div className="info">
                        <h4 className="title">Therapy Ideas</h4>
                        <p className="paragraph">Therapy is always a good idea, life would be a mistake.</p>
                        <Link to="#">Read more</Link>
                        <hr className="blog-line"/>
                        <p className="author">Paul Gray</p>
                    </div>
                </div>
                <div className="card blog">
                    <div className="img-box">
                        <img src="bg.jpg" alt="alt" />
                    </div>
                    <div className="info">
                        <h4 className="title">Therapy Ideas</h4>
                        <p className="paragraph">Therapy is always a good idea, life would be a mistake.</p>
                        <Link to="#">Read more</Link>
                        <hr className="blog-line"/>
                        <p className="author">Paul Gray</p>
                    </div>
                </div>
            </div>
            <button className="btn blog-btn">Read about Therapy</button>
        </section>
    </div>
    </div>
        )
}
}
export default FindTherapy;