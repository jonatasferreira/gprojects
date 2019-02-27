<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "/models/dao/BaseDao.php";

class ProjectDao extends BaseDao
{
    public function __construct($em)
    {
        parent::__construct($em, 'id', 'Project');
    }
}