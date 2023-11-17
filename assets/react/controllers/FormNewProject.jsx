import React, {useState, useEffect} from 'react';
import InputTitleProject from './InputTitleProject';
import Textarea from './Textarea';
import Select from './Select';
import axios from 'axios';
import { Redirect } from 'react-router-dom';
export default function FormNewProject(props) {
    const [titleProject, setTitleProject] = useState('');
    const [goals, setGoals] = useState('');
    const [arrayIdsMembers, setArrayIdsMembers] = useState([]);
    

    const [formData, setFormData] = useState({
        titleProject: '',
        goals: '',
        arrayIdsMembers: null,
      });

    const handleSubmit =  async (e) => {
        e.preventDefault();
         formData.titleProject = titleProject;
        
         formData.goals = goals;
        
         formData.arrayIdsMembers = arrayIdsMembers;
        // send data 
        const response = await axios.post('http://localhost:8000/project/create_new_project', JSON.stringify(formData));

        if (response.status == 200)         
        {
          location.href = "page_project";
        }
        else 
        {
            alert("Une erreur est survenue. Le projet n'a pas pu être créer");
        }
    }   
    //verify the member is not already added to the project
    const handleProjectsMembers = (idMember) => {
        let newArrayIdsMembers = [...arrayIdsMembers]; 
        if(!arrayIdsMembers.includes(idMember))  newArrayIdsMembers.push(idMember);

        setArrayIdsMembers(newArrayIdsMembers);
        };

       useEffect(() => {}, [arrayIdsMembers]);
    return ( 
    <div>
        <form method="post"  onSubmit={handleSubmit}>
            <h1>Créer un nouveau Projet</h1>

            <label>Titre projet</label>
            <div>
                <InputTitleProject  id="title_project" name='title_project' onChange={(value)=> (setTitleProject(value))} required="required"/>
            </div>
            <label>Objectifs à atteindre</label>
            <div>
                <Textarea name="goals" onChange={(value)=> (setGoals(value))} />
            </div>

            <label>Ajouter des personnes</label>

            <Select name="projects_members" id="array_projects_members" arrayElements={props.users}  onChange={(value)=> (handleProjectsMembers(value))}/>
            
           {  arrayIdsMembers.map((member, index)=> (
            
                    props.users.map((user) => (
                        user.id == member
                        ?   <li key={index}>{user?.prenom} {user?.nom} </li>: null 
                        )) )) } 

            <input type="hidden" value={props.idUser} ></input>
           <button className='btn btn-success'>Créer</button>
        </form>
    </div>
    );


};
