import React from 'react';
import './../../styles/project_card.css';
import  'bootstrap';
import Colonne from './COlonne';
export default function () {
    const colonnes = ["A faire", "En cours", "Terminé"];
    return ( 
        <div  className='container'>
        <div className="row">
            <div className="col-sm-12">App de gestion de projets AGILE</div>
            
            {colonnes.map((colonne, index)=> (
                <div className="col-sm-4" key={"column"+index}>
                   <p >{colonne}</p>
                </div>
            ))}
        </div>
        </div>
    );


};