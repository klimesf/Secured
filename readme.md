Klimesf/Secured
===============

`@Secured` annotation for Nette framework inspired by [Spring `@Secured` annotation](http://docs.spring.io/autorepo/docs/spring-security/3.2.2.RELEASE/apidocs/org/springframework/security/access/annotation/Secured.html).

Installation
------------

First, you need to have `Kdyby\AOP` [installed and configured](https://github.com/Kdyby/Aop/blob/master/docs/en/index.md#installation).

Install Secured using composer:

```sh
composer require klimesf/secured:@dev
```

and register `SecuredAspect` in your Nette application:

```
aspects:
	- Klimesf\Secured\Secured
```

Usage
-----

Now, you can put annotation @Cached on methods in your services like this:

```php
class Service
{

	/**
	 * @Klimesf\Secured\Secured(roles = {"admin"})
	 */
	public function doStuff() {
		// do stuff requiring admin role ...
	}
  
}
```

If current `Nette\Security\User` is not logged in or does not have required roles,
`Nette\Security\AuthenticationException` will be thrown.

Notes
-----

Note: Due to a [bug](https://github.com/Kdyby/Aop/issues/6) in `Kdyby\AOP`, you can't import 
the annotation with use statements at this moment.
Until it's fixed you have to provide fully qualified name of the annotation (`@Klimesf\Secured\Secured`)

Note: You cannot annotate presenter methods.

Note: This extension is inspired by [`redhead/Cached`](https://github.com/readhead/Cached).