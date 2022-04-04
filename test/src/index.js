import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import reportWebVitals from './reportWebVitals';
import Homepage from './Project/All_user/Homepage';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom';
import Header from './Project/All_user/Header';
import Login from './Project/All_user/Login';
import Register from './Project/All_user/Register';

ReactDOM.render(
  <React.StrictMode>
    <Router>
      <Header></Header>
      <Switch>
        <Route exact path="/"> <Homepage/> </Route>
        <Route exact path="/login"> <Login/> </Route>
        <Route exact path="/register"> <Register/> </Route>
      </Switch>
    </Router>
  </React.StrictMode>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
