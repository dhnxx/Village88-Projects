import { useState, useEffect } from "react";

import "./App.css";

export function App() {
	const value = {
		low: { name: "Low Risk", range: [-25, 100] },
		moderate: { name: "Moderate Risk", range: [-100, 1000] },
		high: { name: "High Risk", range: [-500, 2500] },
		severe: { name: "Severe Risk", range: [-3000, 5000] },
	};

	let [chances, setChances] = useState(10);
	let [money, setMoney] = useState(500);
	const [log, setLog] = useState([
		{ message: "Welcome to Money Button Game", style: `text-blue-500` },
	]);

	const gameplay = (value) => {
		if (chances <= 0 || money <= 0) return;

		const gamble =
			Math.floor(Math.random() * (value.range[1] - value.range[0] + 1)) + value.range[0];

		const afterGamble = money + gamble;

		const d = new Date();
		const dateMDY = d.toLocaleDateString();
		const time12hr = d.toLocaleTimeString();

		let style = "";
		afterGamble >= money ? (style = `text-green-500`) : (style = `text-red-500`);

		setMoney(money + gamble);
		const newLogEntry = `${dateMDY} ${time12hr}: You clicked "${value.name}", Value is ${afterGamble}, Current Money is ${money} with ${chances}chance/s left.`;
		setLog((prevLog) => [...prevLog, { message: newLogEntry, style: style }]);
		setChances(chances - 1);
	};

	useEffect(() => {
		if (chances <= 0 || money <= 0) {
			setLog((prevLog) => [...prevLog, { message: "Game Over!", style: `text-blue-500` }]);
		}
	}, [chances, money]);

	return (
		<div className="container mx-auto p-4">
			<div className="flex justify-between">
				<div className="text-xl font-bold">
					Your Money: <span id="money">{money}</span>
				</div>
				<div className="text-xl font-bold">
					Chances Left: <span id="chances">10</span>
				</div>
			</div>
			<div className="grid grid-cols-4 gap-4 mt-4">
				<div className="text-center font-bold">Low Risk</div>
				<div className="text-center font-bold">Moderate Risk</div>
				<div className="text-center font-bold">High Risk</div>
				<div className="text-center font-bold">Severe Risk</div>
				<div className="text-center">Bet: -25 to 100</div>
				<div className="text-center">Bet: -100 to 1000</div>
				<div className="text-center">Bet: -500 to 2500</div>
				<div className="text-center">Bet: -3000 to 5000</div>
				<button
					id="low-risk"
					className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
					onClick={() => {
						gameplay(value.low);
					}}>
					Low Risk
				</button>
				<button
					id="moderate-risk"
					className="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
					onClick={() => {
						gameplay(value.moderate);
					}}>
					Moderate Risk
				</button>
				<button
					id="high-risk"
					className="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"
					onClick={() => {
						gameplay(value.high);
					}}>
					High Risk
				</button>
				<button
					id="severe-risk"
					className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
					onClick={() => {
						gameplay(value.severe);
					}}>
					Severe Risk
				</button>
			</div>
			<div className="mt-4 border-t pt-4">
				<p className="text-sm">Game History:</p>
				{log.map((val, index) => (
					<p key={index} className={`${val.style}`}>
						{val.message}
					</p>
				))}
			</div>
		</div>
	);
}
