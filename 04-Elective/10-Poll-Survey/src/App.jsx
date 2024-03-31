import { useState } from "react";
import { Poll } from "./poll";
import { Result } from "./result";

import "./App.css";

export function App() {
	const [result, setResult] = useState(true);
	const [poll, setPoll] = useState({ lol: 0, dota: 0, hots: 0, ml: 0 });
	const toggleResult = () => {
		setResult(!result);
	};

	return (
		<>
			{result ? (
				// Poll Interface
				<Poll
					value={() => toggleResult()}
					data={(choice) => {
						setPoll((prevPoll) => ({
							...prevPoll,
							[choice]: prevPoll[choice] + 1,
						}));
						console.log(poll[choice]);
					}}
				/>
			) : (
				// Result Interface
				<Result value={toggleResult} data={poll} />
			)}
		</>
	);
}
