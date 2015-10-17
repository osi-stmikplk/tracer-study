<?php
/**
 * Untuk mengatur data alumni
 * User: toni
 * Date: 17/10/15
 * Time: 17:40
 */

namespace STMIKPLK\Factories;


use STMIKPLK\ProfilAlumni;
use STMIKPLK\Tools\UtilBootstrapTable;

class AlumniFactory extends AbstractFactory
{
    /**
     * Raih data dari table profil alumni dan sesuaikan dengan permintaan dari bootstrap table.
     * @param $pagination
     * @return string
     */
    public function getData($pagination)
    {
        $table = new UtilBootstrapTable(
            \DB::table('profil_alumni')
        );
        $data = $table->search(['nama_lengkap', 'NIM', 'pekerjaan'], $pagination['search'])
            ->setPaginationOffset($pagination['offset'])
            ->setPaginationLimit($pagination['limit'])
            ->setSortBy($pagination['sort'], $pagination['order'])
            ->getData();
        // kembalikan JSON formatted data!
        return '{'
        .'"total": '. $table->getDbCount() .','
        .'"rows": ' . json_encode($data)
        .'}';
    }

    /**
     * Kembalikan Profil Alumni berdasarkan $id. Bila $id adalah null maka kembalikan profil alumni yang saat itu login.
     * @param int|null $id
     * @return mixed
     */
    public function getById($id)
    {
        if(is_null($id))
        {
            return ProfilAlumni::where('user_id', '=', \Auth::user()->id)->first();
        }
        return ProfilAlumni::find($id);
    }

    /**
     * Store profile
     * @param array $input
     */
    public function store($input)
    {
        $m = new ProfilAlumni();
        return $this->realSave($m, $input);
    }

    /**
     * Simpan sebenarnya
     * @param ProfilAlumni $model
     * @param $input
     */
    protected function realSave(ProfilAlumni $model, $input)
    {
        $model->fill($input);
        if(!$model->exists)
        {
            // insert a new data?
            $model->user_id = \Auth::user()->id;
        }
        if($model->save())
        {
            $this->last_insert_id = $model->id;
            return true;
        }
        return false;
    }

    public function update(ProfilAlumni $model, $input)
    {
        return $this->realSave($model, $input);
    }
}