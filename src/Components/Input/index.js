import React from 'react';


class Input extends React.Component {
    render() {
        return (
          <input className={this.props.class} type={this.props.type} name={this.props.name} value={this.props.value} placeholder={this.props.placeholder} />
        );
    }
}

export default Input;