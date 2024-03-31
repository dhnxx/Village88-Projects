import { useState, useEffect } from "react";
import "./App.css";
import pet from "./assets/pet.gif";

export function App() {
	const [petName, setPetName] = useState("");
	const [inputName, setInputName] = useState("");

	// useEffect(() => {
	// 	localStorage.setItem("petName", JSON.stringify(petName));
	// }, [petName]);

	useEffect(() => {
		const storedPetName = JSON.parse(localStorage.getItem("petName"));
		if (storedPetName !== null && storedPetName !== undefined) {
			setPetName(storedPetName);
		}
	}, []);

	return (
		<div className="h-screen bg-slate-600 flex justify-center">
			<div className="container mx-auto p-5">
				<h1 className="text-center font-bold text-3xl text-white mb-3">
					{petName ? `Hello I am ${petName}` : "I don't have name :("}
				</h1>
				<img className="mx-auto mb-5" src={pet} alt="" />
				<input
					type="text"
					id="name"
					value={inputName}
					className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-auto"
					required
					onChange={(e) => {
						setInputName(e.target.value);
					}}
				/>
				<div className="text-center mt-5">
					<button
						type="submit"
						className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
						onClick={() => {
							setPetName(inputName);
							setInputName("");
							localStorage.setItem("petName", JSON.stringify(inputName));
						}}>
						Set Pet Name
					</button>
				</div>
			</div>
		</div>
	);
}
