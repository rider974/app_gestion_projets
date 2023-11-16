import React from 'react';
import 'bootstrap';
import HeaderHomepage from './HeaderHomepage';

import NewProjectCardContainer from './NewProjectCardContainer';
import BrowserRouter from './App';
import ProjectCardContainer from './ProjectCardContainer';
export default function HomePage({userInitials,allProjectsTitle}) {

    return ( 
    <div>
        <div>
            <HeaderHomepage userInitials={userInitials}/>
       </div>
       <div className='container-projects'>
            <NewProjectCardContainer />
            <ProjectCardContainer allProjectsTitle={allProjectsTitle}/>
       </div>
    </div>
    );


};
