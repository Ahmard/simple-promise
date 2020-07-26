<?php


namespace SimplePromise;

/**
 * A promise in pending state
 * Class Deferred
 * @package SimplePromise
 */
class Deferred
{

    /**
     * Data that will provided when the promise is resolved
     * @var mixed
     */
    protected $resolveData;

    /**
     * Data that will provided when the promise is rejected
     * @var mixed
     */
    protected $otherwiseData;

    /**
     * Resolve this promise
     * @param mixed $data
     * @return $this
     */
    public function resolve($data)
    {
        $this->resolveData = $data;
        return $this;
    }

    /**
     * Reject this promise
     * @param mixed $data
     * @return $this
     */
    public function reject($data)
    {
        $this->otherwiseData = $data;
        return $this;
    }

    public function promise(): Promise
    {
        return new Promise($this->resolveData, $this->otherwiseData);
    }
}