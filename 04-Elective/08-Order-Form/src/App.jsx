import React, { useState } from "react";
import { Form, Button, Container, Row, Col, Modal } from "react-bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import CustomModal from "./Modal";

const App = () => {
	const [customerName, setCustomerName] = useState("");
	const [deliveryAddress, setDeliveryAddress] = useState("");
	const [contactNumber, setContactNumber] = useState("");
	const [tshirtQuantity, setTshirtQuantity] = useState(0);
	const [capQuantity, setCapQuantity] = useState(0);
	const [showModal, setShowModal] = useState(false);

	const handleSubmit = (event) => {
		event.preventDefault();
		console.log("Order submitted:", {
			customerName,
			deliveryAddress,
			contactNumber,
			tshirtQuantity,
			capQuantity,
		});
		setShowModal(true);
	};

	//* Function to clear input fields
	const clearInputs = () => {
		setCustomerName("");
		setDeliveryAddress("");
		setContactNumber("");
		setTshirtQuantity(0);
		setCapQuantity(0);
	};

	return (
		<Container>
			<Row className="justify-content-center">
				<Col xs={12} md={8} lg={6}>
					<div className="order-form">
						<Form className="mt-4 p-4" onSubmit={handleSubmit}>
							<h1>Order Form</h1>
							<Form.Group controlId="customerName">
								<Form.Label>Customer Name:</Form.Label>
								<Form.Control
									type="text"
									value={customerName}
									onChange={(e) => setCustomerName(e.target.value)}
									required
								/>
							</Form.Group>
							<Form.Group controlId="deliveryAddress">
								<Form.Label>Delivery Address:</Form.Label>
								<Form.Control
									as="textarea"
									value={deliveryAddress}
									onChange={(e) => setDeliveryAddress(e.target.value)}
									required
								/>
							</Form.Group>
							<Form.Group controlId="contactNumber">
								<Form.Label>Contact Number:</Form.Label>
								<Form.Control
									type="tel"
									value={contactNumber}
									onChange={(e) => setContactNumber(e.target.value)}
									required
								/>
							</Form.Group>

							<h3>Products</h3>
							<Form.Group controlId="tshirt">
								<Form.Label>Limited Edition V88 T-Shirt:</Form.Label>
								<Form.Control
									type="number"
									min="0"
									max="10"
									value={tshirtQuantity}
									onChange={(e) => setTshirtQuantity(e.target.value)}
								/>
							</Form.Group>
							<Form.Group controlId="cap">
								<Form.Label>Limited Edition V88 Cap:</Form.Label>
								<Form.Control
									type="number"
									min="0"
									max="10"
									value={capQuantity}
									onChange={(e) => setCapQuantity(e.target.value)}
								/>
							</Form.Group>

							<Button variant="primary" type="submit" className="mt-4">
								Place Order
							</Button>
						</Form>
					</div>
				</Col>
			</Row>
			<CustomModal
				showModal={showModal}
				onHide={() => {
					setShowModal(false);
					clearInputs(); 
				}}
				customerName={customerName}
				deliveryAddress={deliveryAddress}
				contactNumber={contactNumber}
				tshirtQuantity={tshirtQuantity}
				capQuantity={capQuantity}
			/>
		</Container>
	);
};

export default App;
