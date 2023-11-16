import React from 'react';
import './../../styles/project_card.css';
import  'bootstrap';

import ProjectCard from  './ProjectCard';

import Separator from  './Separator';
export default function NewProjectCardContainer() {

    return ( 
       <div className='new-project-card-container'>
            <ProjectCard  projectName="Créer un nouveau projet"/>
        </div>
    );


};
