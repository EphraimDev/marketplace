import React from 'react';
import './UI.css';

const backdrop = (props) => (
    props.show ? <div className='baackdrop' onClick={props.clicked}></div> : null
);

export default backdrop;