<?php

namespace WHSymfony\Controller;

use Symfony\Component\HttpFoundation\{Request,RequestMatcherInterface};
use Symfony\Component\Routing\Exception\ExceptionInterface;

/**
 * Roughly based on code snippet from <https://www.strangebuzz.com/en/snippets/get-the-routing-information-of-the-referer>
 *
 * @author Will Herzog <willherzog@gmail.com>
 */
trait ReferrerRouteTrait
{
	protected function getReferrerRoute(Request $request, RequestMatcherInterface $matcher): ?string
	{
		$referrer = $request->headers->get('referer');

		if( empty($referrer) ) {
			return null;
		}

		$requestFromReferrer = Request::create($referrer);

		try {
			$routeInfoForReferrer = $matcher->matchRequest($requestFromReferrer);
		} catch( ExceptionInterface $e ) {
			return null;
		}

		return $routeInfoForReferrer['_route'];
	}
}
