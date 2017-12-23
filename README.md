# Session manager for PHP
Handle sessions in your application with this PHP library.

[![License](https://camo.githubusercontent.com/cf76db379873b010c163f9cf1b5de4f5730b5a67/68747470733a2f2f6261646765732e66726170736f66742e636f6d2f6f732f6d69742f6d69742e7376673f763d313032)](https://github.com/internetpixels/session-manager)
[![Build Status](https://travis-ci.org/internetpixels/session-manager.svg?branch=master)](https://travis-ci.org/internetpixels/session-manager)
[![Maintainability](https://api.codeclimate.com/v1/badges/43c7b17d539b383d68a1/maintainability)](https://codeclimate.com/github/internetpixels/session-manager/maintainability)

## Basic examples

### Set a new session
In order to set a new session, you'll need to create a new session entity.

	$manager = new SessionManager();
	$testSession = new SessionEntity();
	$testSession->setName( 'my_session' );
	$testSession->setValue( 'Some value in the session' );

	$manager->set( $testSession );


### Validate a session
If you want to validate a session, simply call the ``exists`` method.

	$manager = new SessionManager();
	if( $manager->exists( 'my_session' ) ) {
		echo 'Exists!';	
	}
	else {
		echo 'Create session..';	
	}
	
### Get a session
Getting the session as an object is even easier. Simply call the ``get`` method, with an optional default value.

	$manager = new SessionManager();
	
	/** @var SessionEntity $session */
	$session = $manager->get( 'my_session' );
	
If you want to use a default value when the session is not available, you might want to use the default value.

	$manager = new SessionManager();
	
	/** @var SessionEntity $session */
	$session = $manager->get( 'test_non_existing', 'my value' );
	