import React from 'react';
import 'bootstrap';
import './InputTitleProject';
export default function FormNewProject(props) {

    return ( 
    <div>
        <h1>Créer un nouveau Projet</h1>

        <label>Titre projet</label>
        <InputTitleProject />

        <button className='btn btn-success'>Créer</button>
    </div>
    );


};
