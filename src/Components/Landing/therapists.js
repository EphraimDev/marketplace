import React from 'react';
import Card from '../Card';

class FeaturedTherapists extends React.Component {
    render() {
        return (
            <div className="landing-therapist-container">
                <div className="row">
                    <div className="col-sm-12">
                        <h5 className="landing-featured">Featured Therapists</h5>
                    </div>
                    <div className="col-sm-12">
                        <h6 className="landing-featured">A quick view of therapist leading the chart</h6><br></br>
                    </div>
                    <div className="landing-therapist-design landing-featured green"></div><br></br>
                </div>
                <div className="container">
                    <Card
                        src={"https://res.cloudinary.com/ephaig/image/upload/v1555447743/Bitmap.png"}
                        alt={'Schmidt'}
                        title={'Lily Schmidt'}
                        review={'2 reviews'}
                        specialty={'Marriage and Family Therapist'}
                        location={'Atlanta'} 
                    />
                    <Card
                        src={"https://res.cloudinary.com/ephaig/image/upload/v1555447782/Bitmap_1.png"}
                        alt={'Schmidt'}
                        title={'Lily Schmidt'}
                        review={'2 reviews'}
                        specialty={'Marriage and Family Therapist'}
                        location={'Atlanta'} 
                    />
                    <Card
                        src={"https://res.cloudinary.com/ephaig/image/upload/v1555447783/Bitmap_3.png"}
                        alt={'Schmidt'}
                        title={'Lily Schmidt'}
                        review={'2 reviews'}
                        specialty={'Marriage and Family Therapist'}
                        location={'Atlanta'} 
                    />
                    <Card
                        src={"https://res.cloudinary.com/ephaig/image/upload/v1555447783/Bitmap_2.png"}
                        alt={'Schmidt'}
                        title={'Lily Schmidt'}
                        review={'2 reviews'}
                        specialty={'Marriage and Family Therapist'}
                        location={'Atlanta'} 
                    />
                </div>
                <div className="row">
                </div>
            </div>
        );
    }
}

export default FeaturedTherapists;