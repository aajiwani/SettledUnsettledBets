<?php

/**
 * Created by PhpStorm.
 * User: Amirali
 * Date: 6/8/2016
 * Time: 11:50 AM
 */

namespace AppCode\RiskModule\RiskIdentifier;

use AppCode\CSVModule\CSVUserTuple;

abstract class RiskHandler
{
    private $successor = null;

    final public function setSuccessor(RiskHandler $handler)
    {
        if ($this->successor === null) {
            $this->successor = $handler;
        } else {
            $this->successor->setSuccessor($handler);
        }
    }

    final public function handle($request)
    {
        $response = $this->process($request);
        if (($response === null) && ($this->successor !== null)) {
            $response = $this->successor->handle($request);
        }

        return $response;
    }

    abstract protected function process(RiskRequest $request);
}