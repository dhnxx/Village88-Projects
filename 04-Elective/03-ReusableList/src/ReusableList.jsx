function ReusableList(messages) {
	const message = messages.value;
	return (
		<li className="messages">
			<img src={message.img} alt="" />
			<div className="message-text">
				<p className="date">Date: {message.date}</p>
				<p>Name: {message.name}</p>
				<p>Message: {message.message}</p>
			</div>
		</li>
	);
}

export default ReusableList;
