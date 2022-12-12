import { useState } from "react";
import axios from "axios";
export default function CreateUser(){

    const [inputs,setInputs] =useState({})

    const handlechange=(event)=>{
        const name =event.target.name;
        const value =event.target.value;
        setInputs(values=>({...values,[name]:value}))
    }

    const handleSubmit=(event)=>{
        event.preventDefault();
        axios.post('http://localhost:80/api/user/save',inputs);
        console.log(inputs);
    }
    return(
        <div>
            <h1>Create User</h1>

            <form onSubmit={handleSubmit}>
                <table cellSpacing="10">
                    <tbody>
                    <tr>
                        <th>
                        <label>Name:</label>
                        </th>

                        <td>
                        <input type="text" name="name" onChange={handlechange}></input>    
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Email:</label>
                        </th>

                        <td>
                        <input type="text" name="email" onChange={handlechange}></input>    
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Mobile:</label>
                        </th>

                        <td>
                        <input type="text" name="Mobile" onChange={handlechange}></input>    
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>Age</label>
                        </th>

                        <td>
                        <input type="text" name="age" onChange={handlechange}></input>    
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <label>time Slot</label>
                        </th>

                        <td>
                        <input type="text" name="time" onChange={handlechange}></input>    
                        </td>
                    </tr>
                    <tr>
                       
                        <td colspan="2" align="center">
                        <button>Save</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                
                
                {/* <br/>
                <label>Name:</label>
                <input type="text" name="name"></input>
                <br/>
                <label>Name:</label>
                <input type="text" name="name"></input>
                <br/>
                <button>Save</button> */}
            </form>
        </div>
    )
}