import React from 'react';
import CardTitle from '../CardTitle';

class FeaturedTherapists extends React.Component {
    render() {
        return (
            <div className="landing-issues-container">
                <CardTitle 
                    name={'Popular Therapists Issues'}
                    description={'See our top pick of issues solved by most therapists'}
                />
                <div className="container">
                    <div className="row">
                        <div className="col-sm-2 mb-3 mb-md-0">
                            <div className="card" style={{border: "2px solid #01ADBA", borderRadius: "5px"}}>
                                <div className="card-body">
                                    <h5 className="card-title" style={{fontSize: "15px"}}>Marriage</h5>
                                    <p className="card-text">2279 therapists</p>
                                </div>
                            </div>
                        </div>

                        <div className="col-sm-2 mb-3 mb-md-0">
                            <div className="card" style={{border: "2px solid #01ADBA", borderRadius: "5px"}}>
                                <div className="card-body">
                                    <h5 className="card-title" style={{fontSize: "15px"}}>Psychologists</h5>
                                    <p className="card-text">814 therapists</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-2 mb-3 mb-md-0">
                            <div className="card" style={{border: "2px solid #01ADBA", borderRadius: "5px"}}>
                                <div className="card-body">
                                    <h5 className="card-title" style={{fontSize: "15px"}}>Psychiatrists</h5>
                                    <p className="card-text">397 therapists</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-2 mb-3 mb-md-0">
                            <div className="card" style={{border: "2px solid #01ADBA", borderRadius: "5px"}}>
                                <div className="card-body">
                                    <h5 className="card-title" style={{fontSize: "15px"}}>Psychotherapists</h5>
                                    <p className="card-text">346 therapists</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-2 mb-3 mb-md-0">
                            <div className="card" style={{border: "2px solid #01ADBA", borderRadius: "5px"}}>
                                <div className="card-body">
                                    <h5 className="card-title" style={{fontSize: "15px"}}>Child therapist</h5>
                                    <p className="card-text">184 therapists</p>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-2 mb-3 mb-md-0">
                            <div className="card" style={{border: "2px solid #01ADBA", borderRadius: "5px"}}>
                                <div className="card-body">
                                    <h5 className="card-title" style={{fontSize: "15px"}}>Career</h5>
                                    <p className="card-text">169 therapists</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default FeaturedTherapists;