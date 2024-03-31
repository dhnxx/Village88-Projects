import React from "react";
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";
import Home from "./Home";
import AboutMe from "./AboutMe.jsx";
import Gallery from "./Gallery";
import "bootstrap/dist/css/bootstrap.min.css";
import { Container, Row, Col, Image } from "react-bootstrap";

function App() {
	return (
		<Router>
			<Container>
				<div className="MyWebsite">
					<ul className="d-flex">
						<li className="me-3">
							<Link to="/">Home</Link>
						</li>
						<li className="me-3">
							<Link to="/aboutMe">About Me</Link>
						</li>
						<li className="me-3">
							<Link to="/gallery">Gallery</Link>
						</li>
					</ul>

					<Routes>
						<Route path="/" element={<Home />} />
						<Route path="/aboutMe" element={<AboutMe />} />
						<Route path="/gallery" element={<Gallery />} />
					</Routes>
				</div>
			</Container>
		</Router>
	);
}

export default App;
