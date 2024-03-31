import React from "react";
import { Container, Row, Col, Image } from "react-bootstrap";

const AboutMe = () => {
	return (
		<Container>
			<h1>About Me</h1>
			<Row>
				<Col>
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
				</Col>
				<Col>
					<p>
						Cats are fascinating creatures known for their independence, agility, and
						mysterious nature. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
						ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
						ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
						velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
						cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
						est laborum.
					</p>
				</Col>
			</Row>
		</Container>
	);
};

export default AboutMe;
