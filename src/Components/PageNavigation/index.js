import React from 'react';
import './PageNav.css';


class PageNav extends React.Component {
    render() {
        return (
            <div className="col page-nav-div">
                <div className="col-sm-1 page-nav-right"><a href="/" className="page-nav-link">Home</a></div>
                <div className="col-sm-1 page-nav-center">></div>
                <div className="col-sm-6 page-nav-left">
                    <a href="#" className="page-nav-link">{this.props.link}</a>
                </div>
            </div>
        )
    }
}

export default PageNav;