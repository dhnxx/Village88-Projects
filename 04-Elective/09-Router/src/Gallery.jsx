// Gallery.jsx
import React from "react";
import { Container, Row, Col, Image } from "react-bootstrap";

const Gallery = () => {
	return (
		<Container>
			<h1>This is Gallery</h1>
			<Row>
				<Col>
					<h2>Selfies</h2>
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
				</Col>
				<Col>
					<h2>My Family and Friends</h2>
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
				</Col>
				<Col>
					<h2>Adventures</h2>
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
					<Image src="https://dummyimage.com/150" alt="dp" roundedCircle />
				</Col>
			</Row>
		</Container>
	);
};

export default Gallery;
