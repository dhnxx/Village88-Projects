import React, { useState } from "react";
import "./App.css";
import imgOff from "./assets/light-off.png";
import imgOn from "./assets/light-on.png";

function App() {
	const [lights, setLights] = useState(false);

	function swap() {
		setLights(!lights);
	}

	return (
		<div className="lights-container">
			{lights ? <img src={imgOn} alt="On" /> : <img src={imgOff} alt="Off" />}
			<button onClick={swap}>{lights ? "Off" : "On"}</button>
		</div>
	);
}

export default App;
