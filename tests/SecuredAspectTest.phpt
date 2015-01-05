<?php

namespace Test;

use Nette,
	Tester,
	Tester\Assert;
use Nette\Security\AuthenticationException;

require __DIR__ . '/bootstrap.php';

/**
 * Class SecuredTest
 * @package Test
 * @TestCase
 */
class SecuredAspectTest extends Tester\TestCase
{

	function __construct()
	{
	}


	function setUp()
	{
	}

	function testAnnotatedMethodUnauthorized()
	{
		Assert::exception(function () {
			// TODO
		}, AuthenticationException::class);
	}

}

(new SecuredAspectTest())->run();
