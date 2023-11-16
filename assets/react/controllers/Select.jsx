import React, {useState} from 'react';
import './../../styles/form_new_project.css';
import 'bootstrap';

export default function Select( {name, id, arrayElements, prenom, nom,  intitule, onChange} ) {
    const [idMember, setIdMember] = useState('');

    const handleIdMember= (e) => {
      const value = e.target.value;
      // verify member has not been added to the array 
      setIdMember(value);
  
      // Appeler la fonction onChange pour passer la valeur au composant parent
      onChange(value);
    }

    return ( 
    <div>
     <select className="form-control" name={name} id={id} value={idMember} onChange={handleIdMember}>
          {arrayElements ? arrayElements.map((element)=> (
                <option key={element?.id} value={element?.id} name={name}  > {element?.prenom} {element?.nom} {element?.intitule}</option>
            )) :null}; 
        </select>
    </div>
    );
};