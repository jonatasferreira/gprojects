<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "/models/dao/BaseDao.php";

class TaskDao extends BaseDao
{
    public function __construct($em)
    {
        parent::__construct($em, 'id', 'Task');
    }
}