import React from 'react';
import {Link} from 'react-router-dom';
const Homepage = () =>
{
    return (
        <div>
            <Link to="/">Homepage</Link> &nbsp;
            <Link to="/login">Login</Link> &nbsp;
            <Link to="/register">Register</Link> &nbsp;
        </div>
        
    )
}
export default Homepage;