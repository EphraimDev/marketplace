import React, { Component } from "react";
import { BrowserRouter } from "react-router-dom";

import Navbar from "./Components/Navbar";
import Footer from "./components/Footer/Footer";

class App extends Component {
  render() {
    return (
      <BrowserRouter>
        <div>
          <Navbar />
        </div>
        <div>
          <Footer />
        </div>
      </BrowserRouter>
    );
  }
}

export default App;
