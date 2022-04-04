import React from 'react';
const Login = () =>
{
    return (
        <div>
            <form>
                <h1>Login</h1>

                <label><b>Username</b></label><br/>
                <input type="text" placeholder="Enter Username" name="username"/><br/>

                <label><b>Password</b></label><br></br>
                <input type="password" placeholder="Enter Password" name="password"/><br/>
                
                <button type="submit">Login</button><br></br>
                <a>Forgot your password?</a>
            </form> 
        </div>
    )
}
export default Login;
