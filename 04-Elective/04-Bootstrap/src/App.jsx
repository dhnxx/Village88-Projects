import React, { useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";
import {
	Button,
	Container,
	Form,
	Alert,
	Badge,
	Carousel,
	Modal,
	Navbar,
	Pagination,
	Toast,
} from "react-bootstrap";

function App() {
	const [count, setCount] = useState(0);

	const incrementCount = () => {
		setCount((prevCount) => prevCount + 1);
	};

	const decrementCount = () => {
		setCount((prevCount) => prevCount - 1);
	};

	return (
		<>
			<Navbar bg="dark" variant="dark">
				<Container>
					<Navbar.Brand>React Bootstrap App</Navbar.Brand>
				</Container>
			</Navbar>

			<Container className="mt-3">
				<Form>
					<Form.Group controlId="formCount">
						<Form.Label>Count:</Form.Label>
						<Form.Control type="number" value={count} readOnly />
						<Form.Text className="text-muted">This is the count value.</Form.Text>
					</Form.Group>

					<Form.Group controlId="formButtons">
						<Button variant="primary" className="mr-2" onClick={incrementCount}>
							Increment
						</Button>
						<Button variant="danger" onClick={decrementCount}>
							Decrement
						</Button>
					</Form.Group>
				</Form>

				<Alert variant="success" className="mt-3">
					Current Count: {count}
				</Alert>

				<Badge variant="info" className="mt-3">
					Count: {count}
				</Badge>

				<Carousel className="mt-3">
					<Carousel.Item>
						<img
							className="d-block w-100"
							src="https://via.placeholder.com/800x400"
							alt="First slide"
						/>
						<Carousel.Caption>
							<h3>First slide label</h3>
							<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
						</Carousel.Caption>
					</Carousel.Item>
				</Carousel>

				<Modal show={count > 10}>
					<Modal.Header closeButton>
						<Modal.Title>Count Alert</Modal.Title>
					</Modal.Header>
					<Modal.Body>
						<p>The count value has exceeded 10!</p>
					</Modal.Body>
					<Modal.Footer>
						<Button variant="secondary" onClick={() => setCount(0)}>
							Reset Count
						</Button>
					</Modal.Footer>
				</Modal>

				<Pagination className="mt-3">
					<Pagination.Prev />
					<Pagination.Item active>{count}</Pagination.Item>
					<Pagination.Next />
				</Pagination>

				<Toast className="mt-3">
					<Toast.Header>
						<strong className="mr-auto">Toast Notification</strong>
					</Toast.Header>
					<Toast.Body>Current Count: {count}</Toast.Body>
				</Toast>
			</Container>
		</>
	);
}

export default App;
