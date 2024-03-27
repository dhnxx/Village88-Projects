import React from "react";
import ReactDOM from "react-dom/client";
import "./style.css";
import ReusableList from "./ReusableList.jsx";
import message from "./assets/PostDetails.js";

ReactDOM.createRoot(document.getElementById("root")).render(
	<React.StrictMode>
		<ul>
			{message.map((msg, index) => (
				<ReusableList value={msg} key={index} />
			))}
		</ul>
	</React.StrictMode>
);
