import React from "react";

import Header from './header';
import Therapists from './featured-therapists';
import Countries from './countries';
import Issues from './popular-issues';
import Steps from './steps';
import Blog from './blog';
import Featured from './featured';
import Navbar from "../Navbar/Navbar";
import Footer from "../Footer/Footer";
import './Landing.css';

const Home = props => (
    <div className="container landing">
            <Navbar />
            <Header />
            <Therapists />
            <Countries />
            <Issues />
            <Steps />
            <Blog />
            <Featured />
            <Footer />
    </div>
);

export default Home;
