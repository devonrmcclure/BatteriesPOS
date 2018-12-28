import React, { Fragment } from 'react';
import PropTypes from 'prop-types';
import { withStyles } from '@material-ui/core/styles';
import { 
	AppBar as Bar, 
	Button, 
	CssBaseline,
	Typography } from '@material-ui/core';
import Toolbar from '@material-ui/core/Toolbar';
import IconButton from '@material-ui/core/IconButton';
import MenuIcon from '@material-ui/icons/Menu';

const styles = {
	root: {
		flexGrow: 1,
	},
	grow: {
		flexGrow: 1,
	},
	menuButton: {
		marginLeft: -12,
		marginRight: 20,
	},
};

const AppBar = (props) => {
	const { classes } = props;

	return (
		<Fragment>
			<CssBaseline />
			<div className={classes.root}>
				<Bar position="static">
					<Toolbar>
						<IconButton className={classes.menuButton} color="inherit" aria-label="Menu">
							<MenuIcon />
						</IconButton>
						<Typography variant="h6" color="inherit" className={classes.grow}>
							White Rock
						</Typography>
						<Button color="inherit">Something</Button>
					</Toolbar>
				</Bar>
			</div>
		</Fragment>
	);
};

AppBar.propTypes = {
	classes: PropTypes.object.isRequired,
};

export default withStyles(styles)(AppBar);