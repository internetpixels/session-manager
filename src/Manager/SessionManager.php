<?php

namespace InternetPixels\SessionManager\Manager;

use InternetPixels\SessionManager\Entities\SessionEntity;

/**
 * Class SessionManager
 * @package InternetPixels\SessionManager\Manager
 */
class SessionManager {

	/**
	 * Get a session, or false when the session does not exists.
	 *
	 * @param string $sessionName
	 * @param string $defaultValue
	 *
	 * @return SessionEntity
	 */
	public function get( string $sessionName, $defaultValue = '' ) {
		if ( $this->exists( $sessionName ) ) {
			$entity = new SessionEntity();
			$entity->setName( $sessionName );
			$entity->setValue( $_SESSION[$sessionName] );

			return $entity;
		}

		$default = new SessionEntity();
		$default->setName( $sessionName );
		$default->setValue( $defaultValue );

		return $default;
	}

	/**
	 * Set a session with a given value, returns true on success.
	 *
	 * @param SessionEntity $sessionEntity
	 *
	 * @return bool
	 * @throws \Exception
	 * @internal param $sessionName
	 * @internal param $value
	 */
	public function set( SessionEntity $sessionEntity ) {
		if ( empty( $sessionEntity->getName() ) ) {
			throw new \Exception( 'Session name must be set!' );
		}

		$_SESSION[$sessionEntity->getName()] = $sessionEntity->getValue();

		return $this->exists( $sessionEntity->getName() );
	}

	/**
	 * Checks if a given session exists.
	 *
	 * @param string $sessionName
	 *
	 * @return bool
	 */
	public function exists( string $sessionName ) {
		if ( isset( $_SESSION[$sessionName] ) && !empty( $_SESSION[$sessionName] ) ) {
			return true;
		}

		return false;
	}

}