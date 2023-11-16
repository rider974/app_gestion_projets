import { BrowserRouter as Router, Route, Routes} from 'react-router-dom';
import React from 'react';
import 'bootstrap';
import './CreationNewProject';

import './HomePage';

export default function App() {

return (
    <Router>
        <div>
        <Routes>
            <Route path="/" element={<HomePage />} />
            <Route path="/project/page_creation_project" element={<CreationNewProject />} />
        </Routes>
        </div>
    </Router>
     )
}