import React from 'react';
import 'bootstrap';
export default function ({onChange}) {

    return ( 
    <div>
        <ul>
            {props?.users?.map((user)=> (
            arrayIdsMembers?.includes(user?.id) ? 
            <li>{user?.prenom} {user?.nom} </li>: null 
            ))}
        </ul>
    </div>
    );


};
