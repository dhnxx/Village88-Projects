import luffyDP from "./assets/luffy.png";
import zoroDP from "./assets/roro.jpg";
import sanjiDP from "./assets/sanji.jpg";

function FunctionBased() {


	return (
		<div className="messages-list">
			{list.map((message, index) => (
				<div className="messages" key={index}>
					<img src={message.img} alt="" />
					<div className="message-text">
						<p className="date">Date: {message.date}</p>
						<p>Name: {message.name}</p>
						<p>Message: {message.message}</p>
					</div>
				</div>
			))}
		</div>
	);
}

export default FunctionBased;
