<?php
/**
 * Untuk mengatur data alumni
 * User: toni
 * Date: 17/10/15
 * Time: 17:40
 */

namespace STMIKPLK\Factories;


use Illuminate\Support\Arr;
use STMIKPLK\Pengumuman;
use STMIKPLK\Post;
use STMIKPLK\ProfilAlumni;
use STMIKPLK\Tools\UtilBootstrapTable;

class PengumumanFactory extends AbstractFactory
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
     * Dapatkan pengumuman berdasarkan id
     * @param int $id
     * @return mixed
     */
    public function getById($id)
    {
        return Pengumuman::find($id);
    }

    /**
     * Store profile
     * @param array $input
     */
    public function store($input)
    {
        $m = new Pengumuman();
        return $this->realSave($m, $input);
    }

    /**
     * Simpan sebenarnya
     * @param ProfilAlumni $model
     * @param $input
     */
    protected function realSave(Pengumuman $model, $input)
    {
        $insertmode = false;
        try
        {
            // terkait dengan beberapa part ...
            \DB::transaction(function() use($model, $input, $insertmode){

                // hanya ambil yang untuk pengumuman!
                $model->fill(Arr::only($input,['tgl_tayang','tgl_expired']));
                if(!$model->exists)
                {
                    // insert a new data?
                    $insertmode = true;
                }
                if($model->save())
                {
                    $this->last_insert_id = $model->id;
                    // update insert post!
                    // if not insertmode
                    if(!$insertmode)
                    {
                        $post = $model->post; // karena one to one otomatis model Post!
                    }
                    else
                    {
                        $post = new Post(); // insert then create baru
                        $post->author_id = \Auth::user()->id; // set author
                    }
                    $post->fill(Arr::only($input, ['judul', 'isi'])); // update
                    $model->post()->save($post); // save sebagai related table!
                }
            });
        }
        catch(\Exception $e)
        {
            \Log::error($e->getMessage() ."\n".$e->getTraceAsString(), ['PengumumanFactory::saveReal']);
            $this->errors->add('system', $e->getMessage());
        }
        return $this->errors->count() <= 0;
    }

    public function update(Pengumuman $model, $input)
    {
        return $this->realSave($model, $input);
    }

    public function destroy($id)
    {
        try
        {
            \DB::transaction(function() use($id) {
                $p = Pengumuman::find($id);
                $p->post->delete();
                $p->delete();
            });
        }
        catch(\Exception $e)
        {
            \Log::error($e->getMessage() ."\n".$e->getTraceAsString(), ['PengumumanFactory::destory']);
            $this->errors->add('system', $e->getMessage());
        }
        return $this->errors->count() <= 0;
    }
}