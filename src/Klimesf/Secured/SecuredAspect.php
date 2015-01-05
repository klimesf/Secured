<?php


namespace Klimesf\Secured;

use Doctrine\Common\Annotations\AnnotationReader;
use Kdyby\Aop\JoinPoint\AroundMethod;
use Kdyby\Aop\Around;
use Nette\Security\AuthenticationException;
use Nette\Security\User;

/**
 * @package Klimesf\Secured
 * @author  Filip Klimes <filip@filipklimes.cz>
 */
class SecuredAspect
{

	/**
	 * @var User
	 */
	private $user;

	/**
	 * @var AnnotationReader
	 */
	private $reader;

	/**
	 * @param User $user
	 */
	function __construct(User $user)
	{
		$this->user = $user;
		$this->reader = new AnnotationReader();
	}

	/**
	 * @Around("methodAnnotatedWith(Klimesf\Secured\Secured)")
	 */
	public function process(AroundMethod $m)
	{
		$secured = $this->getAnnotation($m);
		foreach ($secured->roles as $role) {
			if (!$this->user->isLoggedIn()) {
				break;
			}
			if (in_array($role, $this->user->getRoles())) {
				return $m->proceed();
			}
		}

		$parentClass = $m->getTargetObjectReflection()->parentClass->name;
		$methodName = $m->getTargetReflection()->name;
		throw new AuthenticationException("User is not allowed to call " . $parentClass . '::' . $methodName . "().");
	}

	/**
	 * @param \Kdyby\Aop\JoinPoint\AroundMethod $m
	 * @return \Klimesf\Secured\Secured|null
	 */
	private function getAnnotation(AroundMethod $m)
	{
		return $this->reader->getMethodAnnotation($m->getTargetReflection(), 'Klimesf\Secured\Secured');
	}

}