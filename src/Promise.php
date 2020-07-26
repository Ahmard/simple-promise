<?php


namespace SimplePromise;

/**
 * A simple PHP promise library that works synchronously.
 * Class Promise
 * @package SimplePromise
 */
class Promise
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
     * Previous then data
     * @var mixed
     */
    protected $prevThenResult;

    public function __construct($resolveData, $otherwiseData)
    {
        //Provide resolve data
        $this->resolveData = $resolveData;
        //Provide rejection data
        $this->otherwiseData = $otherwiseData;
    }

    /**
     * Register callback to be called when this operation succeeded
     * @param callable $callback
     * @return $this
     */
    public function then(callable $callback)
    {
        if ($this->resolveData) {
            $result = $callback($this->prevThenResult ?? $this->resolveData);
            if ($result) {
                $this->prevThenResult = $result;
            }
        }
        return $this;
    }

    /**
     * Register callback to be called when this operation failed
     * @param callable $callback
     * @return $this
     */
    public function otherwise(callable $callback)
    {
        if ($this->otherwiseData) {
            $callback($this->otherwiseData);
        }
        return $this;
    }
}
