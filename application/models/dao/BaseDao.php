<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class BaseDao
{
    private $primaryKey;
    private $tableName;
    private $em;

    public function __construct($em, $primaryKey, $tableName)
    {
        $this->primaryKey = $primaryKey;
        $this->tableName = $tableName;
        $this->em = $em;
    }

    /**
     * Insert obj database
     *
     * @param  object  $obj
     *
     */ 
    public function create($obj)
    {
		$this->em->persist($obj);
        $this->em->flush();
    }
    
    /**
     * Select obj database
     *
     * @param  object  $obj
     *
     */ 
    public function read($obj)
    {
        $key = $obj->{'get'.$this->primaryKey}();
        $obj = NULL;

        $ObjReturn = $this->em->find($this->tableName, $key);
		if ($ObjReturn === null) {
			return null;
		}
		return $ObjReturn;
    }
    
    /**
     * Update obj database
     *
     * @param  object  $obj
     *
     */ 
    public function update($obj)
    {
		$this->em->flush();
    }
    
    /**
     * Delete obj database
     *
     * @param  object  $obj
     *
     */ 
    public function delete($obj)
    {
        $this->em->remove($obj);
        $this->em->flush();
    }
    
    /**
     * Select list obj database
     *
     * @param  string  $value
     * @param  string  $key
     *
     */ 
    public function readAll($value = null, $key = null)
    {
        $repository = $this->em->getRepository($this->tableName);

        if (is_null($value)) {
            return $repository->findAll();
        } else {
            if (is_null($key)) {
                $key = $this->primaryKey;
            }
            return $repository->findBy(array($key => $value), array()); 
        }
	}
}
