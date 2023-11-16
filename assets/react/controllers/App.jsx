import { BrowserRouter as Router, Route, Routes} from 'react-router-dom';
import React from 'react';
import 'bootstrap';
import './CreationNewProject';
import './HomePage';
import HomePage from './HomePage';
export default function App() {

return (
    <Router>
            <div>
            <Routes>
                <Route path="/" >
                    <HomePage />    
                </Route>
                <Route path="/project/page_creation_project" >
                    <CreationNewProject />
                </Route>
            </Routes>
            </div>
    </Router>
     )
}