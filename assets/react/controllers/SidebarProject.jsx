import React from 'react';
import './../../styles/header.css';
import 'bootstrap';
export default function (props) {

    const arrayTestTitleSidebar = ["Tableau de bord", "Membres du projet", "Autres tableaux", "projet UNICORN", "Trois Bassins", "Library"];
    return ( 
    <div  className='container'>
        <aside className='row'>
            {arrayTestTitleSidebar.map((item, index)=> (
                <div className='col-sm-12' key={"project-aside"+index}>
                    {item}
                </div>
            ))}
        </aside>
    </div>
    );


}