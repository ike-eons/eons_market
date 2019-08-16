<?php

    namespace App\Contracts;

    interface BaseContract
    {
        //create a model instance
        public function create(array $attributes);

        //update a model instance
        public function update(array $attributes, int $id);

        //return all model rows
        public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc' );

        //find one by id
        public function find(int $id);

        //find one by id or throw exception
        public function findOneOrFail(int $id);

        //find base on a different column
        public function findBy(array $data);

        //find one base on a different column
        public function findOneBy(array $data);

        //find one base on a different column or throw exception
        public function findOneByOrFail(array $data);

        //delete one by id
        public function delete( int $id);
        
    }