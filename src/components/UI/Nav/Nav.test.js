import React from 'react';
import ReactDOM from 'react-dom';
import Nav from './Nav';

describe('Nav Component', () =>
{
	it('renders without crashing', () => {
		const nav = document.createElement('nav');
		ReactDOM.render(<Nav />, nav)
	});
});