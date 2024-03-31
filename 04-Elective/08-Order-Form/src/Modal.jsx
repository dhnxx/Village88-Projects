import React from "react";
import { Modal, Button } from "react-bootstrap";

const CustomModal = ({
	showModal,
	onHide,
	customerName,
	deliveryAddress,
	contactNumber,
	tshirtQuantity,
	capQuantity,
}) => {
	return (
		<Modal show={showModal} onHide={onHide}>
			<Modal.Header closeButton>
				<Modal.Title>Order Summary</Modal.Title>
			</Modal.Header>
			<Modal.Body>
				<p>Customer Name: {customerName}</p>
				<p>Delivery Address: {deliveryAddress}</p>
				<p>Contact Number: {contactNumber}</p>
				<p>Limited Edition V88 T-Shirt Quantity: {tshirtQuantity}</p>
				<p>Limited Edition V88 Cap Quantity: {capQuantity}</p>
			</Modal.Body>
			<Modal.Footer>
				<Button variant="primary" onClick={onHide}>
					Confirm
				</Button>
			</Modal.Footer>
		</Modal>
	);
};

export default CustomModal;
