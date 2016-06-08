<?php
/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 12:01 PM
 */

namespace AppCode\RiskModule\RiskIdentifier;


class RiskIdentifierClient
{
    private $firstHandler;

    public function __construct($handlersOrder)
    {
        if (count($handlersOrder) <= 0)
            throw new \Exception('Risk Identifier Client cannot be created without handlers');

        $this->firstHandler = $handlersOrder[0];

        if (count($handlersOrder) > 1)
        {
            $currHandler = $this->firstHandler;
            $remainingHandlers = array_slice($handlersOrder, 1);
            foreach ($remainingHandlers as $handler)
            {
                $currHandler->setSuccessor($handler);
                $currHandler = $handler;
            }
        }
    }

    public function process($request)
    {
        $response = $this->firstHandler->handle($request);

        return $response;
    }
}