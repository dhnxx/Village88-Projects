import lol from "./assets/league.jpg";
import dota from "./assets/dota2.webp";
import hots from "./assets/hots.jpg";
import moba from "./assets/moba.jpg";
import { useState } from "react";

export function Poll({ data, value }) {
	const [choice, setChoice] = useState("");
	return (
		<div className="text-white p-5 mx-auto text-center">
			<p className="font-bold text-3xl mb-5">Poll Survey</p>
			<div className="container flex flex-wrap gap-5 mx-auto mb-5">
				<div
					className={`h-80 flex-1 bg-blue-300 text-black font-bold rounded-xl bg-center bg-cover ${
						choice === "lol" ? "border-4 border-blue-300" : ""
					}`}
					style={{ backgroundImage: `url(${lol})` }}
					onClick={() => setChoice("lol")}></div>
				<div
					className={`h-80 flex-1 bg-blue-300 text-black font-bold rounded-xl bg-center bg-cover ${
						choice === "dota" ? "border-4 border-blue-300" : ""
					}`}
					style={{ backgroundImage: `url(${dota})` }}
					onClick={() => setChoice("dota")}></div>
			</div>
			<div className="container flex flex-wrap gap-5 mx-auto mb-5">
				<div
					className={`h-80 flex-1 bg-blue-300 text-black font-bold rounded-xl bg-center bg-cover ${
						choice === "hots" ? "border-4 border-blue-300" : ""
					}`}
					style={{ backgroundImage: `url(${hots})` }}
					onClick={() => setChoice("hots")}></div>
				<div
					className={`h-80 flex-1 bg-blue-300 text-black font-bold rounded-xl bg-center bg-cover ${
						choice === "ml" ? "border-4 border-blue-300" : ""
					}`}
					style={{ backgroundImage: `url(${moba})` }}
					onClick={() => setChoice("ml")}></div>
			</div>
			<button
				className="bg-blue-500 p-3 w-20 block mx-auto rounded-lg"
				onClick={() => {
					data(choice);
					value();
				}}>
				Submit
			</button>
		</div>
	);
}
