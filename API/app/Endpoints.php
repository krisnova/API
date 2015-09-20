<?php
namespace API\app;

require_once __DIR__ . '/../Autoload.php';

use API\src\Request\Request;

/**
 * All requests are born here
 *
 * From nothing.. comes everything..
 *
 * ..Kris
 *
 * Basically this is where the applicaton is bootstrapped
 * And the request is attempted to be parsed
 *
 *
 * Sep 20, 2015
 *
 * @author Kris Nova <kris@nivenly.com> github.com/kris-nova
 */
class Endpoints
{

    /**
     *
     * @var Request
     */
    protected $request = null;

    public function runBuildRequest()
    {
        $request = new Request();
    }

    /**
     * This really should be a trait.
     *
     * Anyway, this is a fabulous method that turns procedural code
     * Into dynamic building blocks
     */
    static public function run()
    {
        $instance = new self();
        $reflection = new \ReflectionClass($instance);
        $methodsObjs = $reflection->getMethods();
        foreach ($methodsObjs as $methodsObj) {
            $methodName = $methodsObj->name;
            if (strpos($methodName, 'run') === 0 && $methodName !== 'run') {
                $break = $instance->$methodName();
                if ($break) {
                    break;
                }
            }
        }
    }
}
/* One bootstrap to rule them all */
Endpoints::run();