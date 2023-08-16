# symfony-referrer-route
 A trait for Symfony controllers which provides a getReferrerRoute() method.

 Note: To access Symfony's `router.default` service via the `Symfony\Component\Routing\Matcher\RequestMatcherInterface` signature (required for the trait method's second argument), you may want to add the following alias to your `services.yaml` file:

 `Symfony\Component\Routing\Matcher\RequestMatcherInterface: '@router.default'`
