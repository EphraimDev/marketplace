import React, { Component } from "react";
import Navbar from './Components/Navbar';
import { BrowserRouter } from 'react-router-dom'

class App extends Component {
  render() {
    return (
      <BrowserRouter>
      <div>
        <Navbar />
        </div>
        </BrowserRouter>
    );
  }
}

export default App;

