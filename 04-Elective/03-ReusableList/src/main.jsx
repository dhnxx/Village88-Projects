import React from "react";
import ReactDOM from "react-dom/client";
import "./style.css";
import ReusableList from "./ReusableList.jsx";
import messages from "./assets/List.js";

ReactDOM.createRoot(document.getElementById("root")).render(
	<React.StrictMode>
		<ul>
			{messages.map((msg, index) => (
				<ReusableList value={msg} key={index} />
			))}
		</ul>
	</React.StrictMode>
);
