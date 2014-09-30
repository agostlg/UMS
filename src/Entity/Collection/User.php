<?php

namespace UMS\Entity\Collection;

use Traversable;
use UMS\Entity\Entity;

class User implements \Iterator, \Countable
{
    protected $id;

    /**
     * @var \UMS\Entity\User[]
     */
    protected $users;

    public function __construct()
    {
        $this->users = array();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return \UMS\Entity\User
     */
    public function current()
    {
        return current($this->users);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->users);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->users);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        $key = key($this->users);
        return isset($this->users[$key]) ? true : false;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->users);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->users);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    /**
     * @param Entity $user
     */
    public function add(Entity $user)
    {
        $this->users[] = $user;
    }

    /**
     * @param Entity $user
     * @param $attributeName
     * @return array|bool
     */
    public function deleteByAttribute(Entity $user, $attributeName)
    {
        $attributeName = 'get' . ucfirst($attributeName);
        $result        = false;
        foreach ($this->users as $key => $userSearch) {
            if ($userSearch->$attributeName() == $user->$attributeName()) {
                $result[] = $this->users[$key];
                unset($this->users[$key]);
            }
        }

        return $result;
    }
}
