import React from "react";
import luffyDP from "./assets/luffy.png";
import zoroDP from "./assets/roro.jpg";
import sanjiDP from "./assets/sanji.jpg";

class ClassBased extends React.Component {
	list = [
		{
			name: "Monkey D. Luffy",
			message: "React is Amazing!",
			date: "January 25, 2022 3:00 PM",
			img: luffyDP,
		},
		{
			name: "Roronoa Zoro",
			message: "This website is cool!",
			date: "January 25, 2022 3:00 PM",
			img: zoroDP,
		},
		{
			name: "Vinsmoke Sanji",
			message: "I love ReactJS!",
			date: "January 25, 2022 3:00 PM",
			img: sanjiDP,
		},
	];
	render() {
		return (
			<div className="messages-list">
				{this.list.map((message, index) => (
					<div className="messages">
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
}

export default ClassBased;
