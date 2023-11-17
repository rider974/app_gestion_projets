import React from 'react';
import './../../styles/project_card.css';
import  'bootstrap';
export default function ProjectCard(props) {

 
    return ( 
       <div className="card card-project ">
            <div className="card-body">
                <p className="card-text">{props?.projectName }</p>

                {props?.projectName !== 'Créer un nouveau projet' ? <button className='btn-project btn btn-danger ' >Voir le projet</button> 
                : 
                <div>
                    <a href="/project/page_creation_project">
                        <button className='btn-project btn btn-success ' >
                            Créer
                        </button>
                    </a>
               </div>
               }  
            </div>
        </div>
    );


};
