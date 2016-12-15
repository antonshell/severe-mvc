<?php
/**
 * Created by PhpStorm.
 * User: Antonshell
 * Date: 24.01.2016
 * Time: 15:11
 */

class NewsService extends CoreService{

    public function getTable()
    {
        return 'news';
    }

    public function getItems($where = '',$orderBy = '',$limit = '',$offset = ''){
        $db = Database::getInstance();
        $table = $this->getTable();

        $sql = "SELECT * FROM " . $table;

        if($where){
            // @TODO implement filters
        }

        if($orderBy){
            // @TODO implement sorting
        }

        if($limit){
            $sql .= ' LIMIT ' . $limit . ' ';
        }

        if($offset){
            $sql .= ' OFFSET ' . $offset . ' ';
            // @TODO implement sorting
        }

        $params = array();

        $items = $db->execSql($sql,$params);
        //return $items;

        $collection = array();

        foreach($items as $item){
            $model = new News();

            foreach($item as $k=>$v){
                $model->$k = $v;
            }

            $collection[] = $model;
        }

        return $collection;
    }
}