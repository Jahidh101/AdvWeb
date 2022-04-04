import React from 'react';
const Register = () =>
{
    return (
        <div>
            <form>
                <h1>Register</h1>

                <label><b>Name :</b></label><br/>
                <input type="text" placeholder="Enter Name" name="name"/><br/><br/>

                <label><b>Gender :</b></label><br/>
                <input type="radio" id="male" name="gender" value="male"/>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female"/>
                <label for="female">Female</label>  
                <input type="radio" id="other" name="gender" value="other"/>
                <label for="other">Other</label><br/><br/>

                <label><b>User type :</b></label><br/>
                <select name="userTypes_id">
                    <option value="" disabled>Select a option</option>
                    <option value="4">patient</option>
                </select> <br></br>

                <label><b>Email :</b></label><br/>
                <input type="text" placeholder="Enter Email" name="email"/><br/>

                <label><b>Address :</b></label><br/>
                <textarea name="address" rows="4" columns="50"></textarea><br></br>
    
                <label><b>Username</b></label><br/>
                <input type="text" placeholder="Enter Username" name="username"/><br/>

                <label><b>Password</b></label><br></br>
                <input type="password" placeholder="Enter Password" name="password"/><br/>

                <label><b>Confirm Password :</b></label><br/>
                <input type="password" placeholder="Confirm Password" name="confirmPassword"/><br/>
                
                <button type="submit">Login</button><br></br>
                <a>Forgot your password?</a>
            </form> 
        </div>
    )
}
export default Register;
