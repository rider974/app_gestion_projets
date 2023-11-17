import React, {useState} from 'react';
import 'bootstrap';
import SidebarProject from './SidebarProject';
import ContainerColonneProject from './ContainerColonneProject';
export default function () {

    return ( 
    <div className='container'>
       <div className='row'>
            <div className='col-sm-3'>
                <SidebarProject />
            </div>
            <div className='col-sm-9'>
                <ContainerColonneProject />
            </div>
       </div>
    </div>
    );


};
