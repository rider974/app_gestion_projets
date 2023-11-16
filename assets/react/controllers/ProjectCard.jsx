import React from 'react';
import './../../styles/project_card.css';
import  'bootstrap';
import { BrowserRouter, useNavigate } from 'react-router-dom';
import App from './App';
export default function ProjectCard(props) {

// const navigation = useNavigate();

// const showPageCreation = () => {
//     navigation('/project/page_creation_project');
//     };

    return ( 
       <div className="card card-project ">
            <div className="card-body">
                <p className="card-text">{props?.projectName }</p>

                {props?.projectName !== 'Créer un nouveau projet' ? <button className='btn-project btn btn-danger ' >Voir le projet</button> 
                : <button className='btn-project btn btn-success ' 
                /*onClick={showPageCreation}*/>Créer</button> }  
            </div>
        </div>
    );


};
