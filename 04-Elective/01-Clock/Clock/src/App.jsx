import React, { useState, useEffect } from "react";

function App() {

	const [hours, setHours] = useState("");
	const [minutes, setMinutes] = useState("");
	const [seconds, setSeconds] = useState("");

	const updateTime = () => {
		const time = new Date();
		setHours(time.getHours());
		setMinutes(time.getMinutes());
		setSeconds(time.getSeconds());
	};

	useEffect(() => {
		updateTime();
		const intervalId = setInterval(updateTime, 1000);
		return () => clearInterval(intervalId);
	}, []);

	return <h1>{`${hours}:${minutes}:${seconds}`}</h1>;
}

export default App;
