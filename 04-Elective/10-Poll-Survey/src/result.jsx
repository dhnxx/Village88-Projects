export function Result({ value, data }) {
	return (
		<div className="container mx-auto p-5 bg-slate-600">
			<h1>This is Result</h1>
			{Object.keys(data).map((key) => (
				<div key={key}>
					<h1>{key}</h1>
					<div className="w-full h-3 bg-gray-200 rounded my-4">
						<div
							className="h-full bg-blue-500 rounded"
							style={{ width: `${data[key]}%` }}></div>
					</div>
				</div>
			))}
			<button className="bg-blue-500 p-3 w-20 block mx-auto rounded-lg" onClick={value}>
				Return
			</button>
		</div>
	);
}
