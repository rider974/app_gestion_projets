import React from 'react';
import logoApp from './../images/logo_app_gestion_projet.png';
import './../../styles/header.css';
import 'bootstrap';
import AppLogo from './AppLogo';

import Separator from './Separator';
export default function HeaderHomepage(props) {

    return ( 
    <div className='header'>
       <img className='appLogo' src={logoApp} alt='logo de l"application. Just Agile avec un avion en papier '/>

        <AppLogo userInitials={props.userInitials} />
        <Separator />
    </div>
    );


};
