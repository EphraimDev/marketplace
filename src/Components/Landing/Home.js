import React from 'react';

import Header from './header';
import Therapists from './featured-therapists';
import Countries from './countries';
import Issues from './popular-issues';
import Steps from './steps';
import Blog from './blog';
import Featured from './featured';
import './Landing.css';

const Home = props => (
    <div className="container landing">
            <Header />
            <Therapists />
            <Countries />
            <Issues />
            <Steps />
            <Blog />
            <Featured />
    </div>
)

export default Home;