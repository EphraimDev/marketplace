import React from "react";
import Image from "../Image";

class Header extends React.Component {
    render() {
        return (
            <div className="landing-header-image-container">
                <div className="col-sm-12">
                    <Image
                        class={"col-sm-12 landing-header-image"}
                        src={
                            "https://res.cloudinary.com/ephaig/image/upload/v1555447750/container.png"
                        }
                        alt={"Landing page header image"}
                    />
                </div>
                <div className="landing-header-design" />
            </div>
        );
    }
}

export default Header;
