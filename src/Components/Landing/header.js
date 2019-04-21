import React from "react";
import Image from "../Image";
import Input from "../Input";

class Header extends React.Component {
    render() {
        return (
            <div className="landing-header-image-container">
                <div className="col-sm-12 landing-image-holder">
                    <Image
                        class={"col-sm-12 landing-header-image"}
                        src={
                            "https://res.cloudinary.com/ephaig/image/upload/v1555447750/container.png"
                        }
                        alt={"Landing page header image"}
                    />
                </div>
                <div className="landing-header-design" />
                <div className="landing-header-text">
                    <h1>
                        Find the Right
                        <br />
                        Therapist for You
                    </h1>
                    <br />
                    <p>
                        Search from over 250 professional therapists in over 40
                        countries around the word
                    </p>
                </div>
                <div className="container">
                    <div className="col-sm-2" />
                    <div className="col-sm-8 landing-search-container">
                        <div className="col-sm-5 landing-input-holder">
                            <label className="landing-input-label">
                                <Input
                                    type={"text"}
                                    class={"landing-header-input"}
                                    name={"landing-search"}
                                    placeholder={
                                        "Enter Location, City or Landmark"
                                    }
                                />
                            </label>
                        </div>
                        <div className="col-sm-5 landing-input-holder">
                            <select className="landing-header-input">
                                <option value="help">I need help with</option>
                            </select>
                        </div>
                        <div className="col-sm-2 landing-input-submit">
                            <Input
                                type={"submit"}
                                class={"landing-header-input landing-submit"}
                                name={"landing-header-submit"}
                                value="Search"
                            />
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Header;
