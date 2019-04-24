import React from 'react';
import { Link } from "react-router-dom";
import './PageNav.css';


class PageNav extends React.Component {
    render() {
        return (
            <div className="col page-nav-div">
                <div className="col-sm-1 page-nav-right"><Link to="/" className="page-nav-link">Home</Link></div>
                <div className="col-sm-1 page-nav-center"></div>
                <div className="col-sm-6 page-nav-left">
                    <Link to="/" className="page-nav-link">{this.props.link}</Link>
                </div>
            </div>
        )
    }
}

export default PageNav;