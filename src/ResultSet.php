<?php

namespace Dilab\CakeMongo;

use Cake\Collection\CollectionTrait;
use Countable;
use IteratorIterator;
use JsonSerializable;
use MongoDB\Driver\Cursor;

/**
 * Decorates the MongoDB Cursor in order to hydrate results with the
 * correct class and provide a Collection interface to the returned results.
 */
class ResultSet extends IteratorIterator implements Countable, JsonSerializable
{
    use CollectionTrait;

    /**
     * Holds the original instance of cursor
     *
     * @var \MongoDB\Driver\Cursor
     */
    protected $cursor;

    /**
     * The full class name of the document class to wrap the results
     *
     * @var \Dilab\CakeMongo\Document
     */
    protected $entityClass;

    /**
     * ResultSet constructor.
     * @param Cursor $cursor
     * @param Query $query
     */
    public function __construct(Cursor $cursor, Query $query)
    {
        $this->cursor = $cursor;

        $repository = $query->repository();

//        $this->entityClass = $repository->

        parent::__construct($this->cursor);

        parent::rewind();
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * Returns the current document for the iteration
     *
     * @return \Dilab\CakeMongo\Document
     */
    public function current()
    {
        $result = parent::current();
        return $result;
    }

    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }

}