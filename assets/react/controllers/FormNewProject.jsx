import React, {useState} from 'react';
import InputTitleProject from './InputTitleProject';
import Textarea from './Textarea';
import Select from './Select';
export default function FormNewProject(props) {
    const [titleProject, setTitleProject] = useState('');

    const [goals, setGoals] = useState('');
    
    const [arrayIdsMember, setArrayIdsMember] = useState('');
    
    const handleSubmit = (e) => {
        e.preventDefault();
        console.log( titleProject);
        
        console.log( goals);
        
        console.log(arrayIdsMember);
        
    }
    return ( 
    <div>
        <form method="post"  onSubmit={handleSubmit}>
            <h1>Créer un nouveau Projet</h1>

            <label>Titre projet</label>
            <div>
                <InputTitleProject  id="title_project" name='title_project' onChange={(value)=> (setTitleProject(value))} />
            </div>
            <label>Objectifs à atteindre</label>
            <div>
                <Textarea name="goals" onChange={(value)=> (setGoals(value))} />
            </div>

            <label>Ajouter des personnes</label>

            <Select name="projects_members" id="array_projects_members" arrayElements={props.users}  onChange={(value)=> (setArrayIdsMember(value))}/>
            <input type="hidden" value={props.idUser} ></input>
            <button className='btn btn-success'>Créer</button>
        </form>
    </div>
    );


};
