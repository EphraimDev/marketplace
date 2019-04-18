import React from 'react';

import Header from './header';
import Therapists from './therapists';
import Countries from './countries';
import './Landing.css';

const Home = props => (
    <div className="container landing">
            <Header />
            <Therapists />
            <Countries />
    </div>
)

export default Home;