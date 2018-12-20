import React from 'react';

import Nav from './components/UI/Nav/Nav';
import Sidebar from './components/UI/Sidebar/Sidebar';

class App extends React.Component {
	render() {
		return (
			<div className="app">
				<Sidebar />
				<Nav />
			</div>
		);
	}
}

export default App;
