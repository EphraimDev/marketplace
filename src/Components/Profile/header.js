import React from 'react';

import './Profile.css';

const Header = props => (
    <div>
        <div className="container profile-header">
            <div className="col-sm-2">
                <a href="#">Home</a>
            </div>
            <div>></div>
            <div className="col-sm-2">
                <a href="#">My Profile</a>
            </div>
        </div>
    </div>
);

export default Header;