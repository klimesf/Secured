<?php


namespace Klimesf\Secured;

use Doctrine\Common\Annotations\Annotation;

/**
 * @package   Klimesf\Secured
 * @author    Filip Klimes <filip@sfilipklimes.cz>
 * @Annotation
 * @Target({"METHOD"})
 */
class Secured
{

	/**
	 * Roles that are allowed
	 * @var array<string>
	 */
	public $roles;

}