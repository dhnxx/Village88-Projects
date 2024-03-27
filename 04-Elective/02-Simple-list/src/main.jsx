import React from "react";
import ReactDOM from "react-dom/client";
import ClassBased from "./ClassBased.jsx";
import "./style.css";
import FunctionBased from "./Function.jsx";

ReactDOM.createRoot(document.getElementById("root")).render(
	<React.StrictMode>
		{/* <ClassBased /> */}
		<FunctionBased />
	</React.StrictMode>
);
