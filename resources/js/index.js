import React from 'react';
import ReactDOM from 'react-dom';
import LandingPage from './screens/landing';

if (document.getElementById('LandingPage'))
    ReactDOM.render(<LandingPage />, document.getElementById('LandingPage'));
