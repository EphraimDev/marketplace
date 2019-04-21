import React,{Component} from 'react';
import { Route, Redirect } from 'react-router-dom';

const token = localStorage.getItem("token")

class ProtectedRoute extends Component {
    render() {
        const Component = this.props.component;
    return (<Route {...this.rest} render={() => (
        token
          ? <Component {...this.props} />
            : <Redirect to='/login' />
      )} />)
};
};

  
export default ProtectedRoute;