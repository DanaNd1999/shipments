import React, {useState, useEffect} from 'react'
import Button from 'react-bootstrap/Button';
import Form from 'react-bootstrap/Form';

const Login = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    function register() {
        const requestOptions = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify({ name: name, email: email, password: password })
        };
        fetch('http://127.0.0.1:8000/api/auth/login', requestOptions)
            .then(response => response.json())
            .catch(error => {
                this.setState({ errorMessage: error.toString() });
                console.error('There was an error!', error);
            });


    }

    return (
        <div className='container align-items-center'>
            <h1 className="mt-5">Login!</h1>
            <Form className="mt-3 mb-3">
                <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label>Email address</Form.Label>
                    <Form.Control type="email" placeholder="Enter email" onChange={(e) => setEmail(e.target.value)}/>
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>Password</Form.Label>
                    <Form.Control type="password" placeholder="Password" onChange={(e) => setPassword(e.target.value)}/>
                </Form.Group>
                <Button onClick={register} onCvariant="primary" type="submit" className="col-xs-12 col-sm-12 col-lg-1 col-xl-1">
                    Login
                </Button>
            </Form>
        </div>
    );
};

export default Login

