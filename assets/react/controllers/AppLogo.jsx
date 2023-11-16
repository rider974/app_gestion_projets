import React from 'react';
import './../../styles/header.css';
import 'bootstrap';
export default function AppLogo(props) {

    return ( 
    <div  className='InitialsContainer'>
        <div className='userInitials'>
            <span >{props.userInitials}</span>
        </div>
    </div>
    );


}
