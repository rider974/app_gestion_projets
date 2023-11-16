import React, {useState} from 'react';
import './../../styles/form_new_project.css';
import 'bootstrap';

export default function Textarea({onChange}, props) {
    
    const [textarea, setTextarea] = useState('');

    const handleTextareaChange= (e) => {
      const value = e.target.value;
      setTextarea(value);
  
      // Appeler la fonction onChange pour passer la valeur au composant parent
      onChange(value);
    }
    return ( 
    <div>
        <textarea className="form-control" rows="3" onChange={handleTextareaChange}>
            {props?.currentText ??  props.currentText  }
        </textarea>
    </div>
    );
};