import React, { useState } from "react";
import "./App.css";

function App() {
	const [name, setName] = useState("");
	const [email, setEmail] = useState("");
	const [messages, setMessages] = useState([]);

	const handleNameChange = (event) => {
		setName(event.target.value);
	};

	const handleEmailChange = (event) => {
		setEmail(event.target.value);
	};

	const handleClick = () => {
		setMessages([...messages, { name: name, email: email }]);
		setName(""); 
		setEmail(""); 
	};

	return (
		<>
			<h1>Contact Registration Form</h1>
			<label htmlFor="name">Name: </label>
			<input type="text" name="name" id="name" value={name} onChange={handleNameChange} />
			<label htmlFor="email">Email: </label>
			<input type="text" name="email" id="email" value={email} onChange={handleEmailChange} />
			<button onClick={handleClick}>Click Me</button>
			<h2>Contacts</h2>
			{messages.map((value, index) => (
				<div key={index}>
					<h3>
						{value.name} : {value.email}
					</h3>
				</div>
			))}
		</>
	);
}

export default App;
