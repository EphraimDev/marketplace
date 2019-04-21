import React from 'react';
import Header from './header';
import Navbar from '../Navbar/Navbar';
import Footer from '../Footer/Footer';

const Profile = props => (
    <div className="profile">
        <Navbar />
        <Header />
        <Footer />
    </div>
);

export default Profile;