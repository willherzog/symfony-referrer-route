<?php

namespace WHSymfony\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Exception\ExceptionInterface;

/**
 * Roughly based on code snippet from <https://www.strangebuzz.com/en/snippets/get-the-routing-information-of-the-referer>
 *
 * @author Will Herzog <willherzog@gmail.com>
 */
trait ReferrerRouteTrait
{
	protected function getReferrerRoute(Request $request, RouterInterface $router): ?string
	{
		$referrer = $request->headers->get('referer');

		if( empty($referrer) ) {
			return null;
		}

		$requestFromReferrer = Request::create($referrer);
		$pathInfoForReferrer = $requestFromReferrer->getPathInfo();

		try {
			$routeInfoForReferrer = $router->match($pathInfoForReferrer);
		} catch( ExceptionInterface $e ) {
			return null;
		}

		return $routeInfoForReferrer['_route'];
	}
}
