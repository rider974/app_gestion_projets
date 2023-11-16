import React, {useState} from 'react';
import './../../styles/form_new_project.css';
import 'bootstrap';

export default function InputTitleProject({onChange}, props) {

    const [inputValue, setInputValue] = useState('');

    const handleInputChange = (e) => {
      const value = e.target.value;
      setInputValue(value);
  
      // Appeler la fonction onChange pour passer la valeur au composant parent
      onChange(value);
    }
    return ( 
    <div >
        <input type="text" name={props?.name ?? props.name}id={props?.id} className='form-control' value={props?.currentValue ?? props.currentValue} onChange={handleInputChange}/>

    </div>
    );
};