# Session manager for PHP
Handle sessions in your application with this PHP library.

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
	