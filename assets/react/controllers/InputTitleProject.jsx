import React, {useState} from 'react';
import './../../styles/form_new_project.css';
import 'bootstrap';

export default function InputTitleProject({onChange, name, id, currentValue, required}) {

    const [inputValue, setInputValue] = useState('');

    const handleInputChange = (e) => {
      const value = e.target.value;
      setInputValue(value);
  
      // Appeler la fonction onChange pour passer la valeur au composant parent
      onChange(value);
    }
    return ( 
    <div >
        <input type="text" name={name ??name}id={id} className='form-control' value={currentValue ?? currentValue} onChange={handleInputChange} required={required ? true: false}/>

    </div>
    );
};