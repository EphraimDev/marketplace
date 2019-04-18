import React from 'react';
import Card from '../Card';
import CardTitle from '../CardTitle';

class Countries extends React.Component {
    render() {
        return (
            <div className="landing-therapist-container">
                <CardTitle 
                    name={'Choose your country'}
                    description={'180,176+ Therapists in the world'}
                />
                <div className="container">
                    <Card
                        cardClass={'landing-country'}
                        imgClass={'landing-country-image'}
                        titleClass={'landing-country-title'}
                        textClass={'landing-country-text'}
                        title={'United States of America'}
                        review={'82,877 Therapists in United States of America'}
                    />
                    <Card
                        cardClass={'landing-country'}
                        imgClass={'landing-country-image'}
                        titleClass={'landing-country-title'}
                        textClass={'landing-country-text'}
                        title={'United States of America'}
                        review={'82,877 Therapists in United States of America'}
                    />
                    <Card
                        cardClass={'landing-country'}
                        imgClass={'landing-country-image'}
                        titleClass={'landing-country-title'}
                        textClass={'landing-country-text'}
                        title={'United States of America'}
                        review={'82,877 Therapists in United States of America'}
                    />
                    <Card
                        cardClass={'landing-country'}
                        imgClass={'landing-country-image'}
                        titleClass={'landing-country-title'}
                        textClass={'landing-country-text'}
                        title={'United States of America'}
                        review={'82,877 Therapists in United States of America'}
                    />
                </div>
                <div className="row">
                </div>
            </div>
        );
    }
}

export default Countries;