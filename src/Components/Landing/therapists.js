import React from 'react';
import Card from '../Card';
import CardTitle from '../CardTitle';

class FeaturedTherapists extends React.Component {
    render() {
        return (
            <div className="landing-therapist-container">
                <CardTitle 
                    name={'Featured Therapists'}
                    description={'A quick view of therapists leading the chart'}
                />
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