import React from 'react';
import FormNewProject from './FormNewProject';

export default function (props) {

    return (
    <div>
        <FormNewProject users={props.users} idUser={props.userId}/>
    </div>
);
};
