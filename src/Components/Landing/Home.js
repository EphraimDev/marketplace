import React from "react";
import Header from "./header";
import Therapists from "./therapists";
import Countries from "./countries";
import Navbar from "../Navbar/Navbar";
import Footer from "../Footer/Footer";
import "./Landing.css";

const Home = props => (
  <div className="container landing">
    <Navbar />
    <Header />
    <Therapists />
    <Countries />
    <Footer />
  </div>
);

export default Home;
