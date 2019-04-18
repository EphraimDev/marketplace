import React from 'react';
import { Card, CardImg, CardText, CardBody,
  CardTitle, CardSubtitle, Button } from 'reactstrap';

// const CardTherapist = (props) => {
//   return (
//     
//   );

class CardA extends React.Component {
    render() {
        return (
            <div className="landing-card mb-4">
                <Card>
                    <CardImg top width="100%" src={this.props.src} alt={this.props.alt} />
                    <CardBody>
                        <CardTitle>{this.props.title}</CardTitle>
                        <CardText>{this.props.review}</CardText>
                        <CardSubtitle>{this.props.specialty}</CardSubtitle>
                        <CardText><i class="fa fa-map-marker-alt" style={{color: '#01ADBA'}}></i> {this.props.location}</CardText>
                    </CardBody>
                </Card>
            </div>
        );
    }

};


export default CardA;