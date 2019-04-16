import React, { Component } from "react";
import Navbar from "./Components/Navbar";
import Footer from "./components/Footer/Footer";
import { BrowserRouter } from "react-router-dom";

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
