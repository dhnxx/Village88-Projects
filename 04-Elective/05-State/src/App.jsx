import { useState } from "react";
import "./App.css";

function App() {
	const [count, setCount] = useState(0);

	return (
		<>
			<button onClick={() => setCount((count) => count + 1)}>Click Me</button>

			<h1>Total no of clicks: {count}</h1>
		</>
	);
}

export default App;
