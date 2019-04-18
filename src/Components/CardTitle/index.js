import React from 'react';


class CardTitle extends React.Component {
    render() {
        return (
            <div className="col">
                <div className="col-sm-12">
                    <h5 className="landing-featured">{this.props.name}</h5>
                </div>
                <div className="col-sm-12">
                    <h6 className="landing-featured">{this.props.description}</h6><br></br>
                </div>
                <div className="landing-therapist-design landing-featured green"></div><br></br>
            </div>
        )
    }
}

export default CardTitle;