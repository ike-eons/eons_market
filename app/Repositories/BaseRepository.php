<?php
    namespace App\Repositories;

    use App\Contracts\BaseContract;
    use Illuminate\Database\Eloquent\Model;

    class BaseRepository implements BaseContract
    {
        protected $model;

        /*
         *  inject the eloquent model class
         *   using the class constructor
        */
        public function __construct(Model $model)
        {
            $this->model = $model;
        }

        //create a model instance
        public function create(array $attributes)
        {
            return $this->model->create($attributes);
        }

        //update a model instance
        public function update(array $attributes, int $id):bool
        {
            return $this->find($id)->update($attributes);
        }

        //return all model rows
        public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc' )
        {
            return $this->model->orderBy($orderBy, $sortBy)->get($columns);
        }

        //find one by id
        public function find(int $id)
        {
            return $this->model->find($id);
        }

        //find one by id or throw exception
        public function findOneOrFail(int $id)
        {
            return $this->findOrFail($id);
        }

        //find base on a different column
        public function findBy(array $data)
        {
            return $this->model->where($data)->all();
        }

        //find one base on a different column
        public function findOneBy(array $data)
        {
            return $this->model->where($data)->first();
        }

        //find one base on a different column or throw exception
        public function findOneByOrFail(array $data)
        {
            return $this->model->where($data)->firstOrFail();
        }

        //delete one by id
        public function delete( int $id)
        {
            return $this->model->find($id)->delete();
        }

    }