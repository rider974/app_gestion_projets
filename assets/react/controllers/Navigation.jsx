import React from 'react';
import './../../styles/project_card.css';
import  'bootstrap';
import { Link } from 'react-router-dom';
import ProjectCard from  './ProjectCard';

import Separator from  './Separator';
export default function NewProjectCardContainer() {
    return (
        <div>
            <nav>
                <ul>

                    <li>
                    <Link to="/">HomePage</Link>
                    </li>

                    <li>
                    <Link to="/projet/create_new_project">Créer un nouveau projet</Link>
                    </li>
                    
                </ul>
            </nav>
        </div>
        );


};
