import React from 'react';
import { Card, CardImg, CardText, CardBody,
  CardTitle, CardSubtitle } from 'reactstrap';

class CardA extends React.Component {
    render() {
        return (
            <div className="landing-card">
                <Card className={this.props.cardClass}>
                    <CardImg top width="100%" src={this.props.src} alt={this.props.alt} className={this.props.imgClass} />
                    <CardBody>
                        <CardTitle className={this.props.titleClass}>{this.props.title}</CardTitle>
                        <CardText className={this.props.textClass}>{this.props.review}</CardText>
                        <CardSubtitle>{this.props.specialty}</CardSubtitle>
                        <CardText><i class="fa fa-map-marker-alt" style={{color: '#01ADBA'}}></i> {this.props.location}</CardText>
                    </CardBody>
                </Card>
            </div>
        );
    }

};


export default CardA;