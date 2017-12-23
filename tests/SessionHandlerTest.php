<?php

namespace InternetPixels\SessionManager\Tests;

use InternetPixels\SessionManager\Entities\SessionEntity;
use InternetPixels\SessionManager\Manager\SessionManager;
use PHPUnit\Framework\TestCase;

/**
 * Class SomethingTest
 * @package InternetPixels\SessionManager\Tests
 */
class SomethingTest extends TestCase {

	/**
	 * @var SessionManager
	 */
	private $manager;

	public function setUp() {
		$this->manager = new SessionManager();
	}

	public function testInstance() {
		$this->assertInstanceOf( SessionManager::class, $this->manager );
	}

	public function testManager() {
		$testSession = new SessionEntity();
		$testSession->setName( 'test' );
		$testSession->setValue( 'This is a test string in our session' );

		$this->assertTrue( $this->manager->set( $testSession ) );
		$this->assertEquals( $testSession->getValue(), $this->manager->get( 'test' )->getValue() );
	}

	public function testValidateEntity() {
		$session = $this->manager->get( 'test' );

		$this->assertInstanceOf( SessionEntity::class, $session );
	}

	public function testSessionExists() {
		$session = $this->manager->exists( 'test' );

		$this->assertTrue( $session );
	}

	public function testWrongSession() {
		$session = $this->manager->get( 'non_existing', 'default_string' );

		$this->assertEquals( 'default_string', $session->getValue() );
		$this->assertFalse( $this->manager->exists( 'non_existing' ) );
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Session name must be set!
	 */
	public function testWrongSetter() {
		$testSession = new SessionEntity();
		$testSession->setName( '' );
		$testSession->setValue( '' );

		$this->manager->set( $testSession );
	}

}