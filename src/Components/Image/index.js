import React from 'react';


class Image extends React.Component {
    render() {
        return (
          <img className={this.props.class} src={this.props.src} alt={this.props.alt} />
        );
    }
}

export default Image;