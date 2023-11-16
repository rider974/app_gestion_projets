import React from 'react';
import './../../styles/project_card.css';
import 'bootstrap';
import ProjectCard from  './ProjectCard';

export default function ProjectCardContainer(props) {
    return ( 
    <div className='cardsContainer'>

        {props.allProjectsTitle.map((projectTitle,index)=> (

            <ProjectCard key={index} projectName={projectTitle} />  
        ))} 


    </div>
    );
};