import React from 'react';


class Button extends React.Component {
    render() {
        return (
          <button className={this.props.class} name={this.props.name} type={this.props.type} value={this.props.value} disabled={this.props.disabled} autoFocus={this.props.autofocus}>{this.props.value}</button>
        );
    }
}

export default Button;