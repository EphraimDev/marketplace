import React from 'react';

import Header from './header';
import Therapists from './therapists';
import './Landing.css';

const Home = props => (
    <div className="container landing">
            <Header />
            <Therapists />
    </div>
)

export default Home;