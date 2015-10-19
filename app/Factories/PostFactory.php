<?php
/**
 * Melayani permintaan terhadap Post
 * User: toni
 * Date: 18/10/15
 * Time: 15:08
 */

namespace STMIKPLK\Factories;

use Illuminate\Database\Eloquent\Collection;
use STMIKPLK\Post;

class PostFactory extends AbstractFactory
{
    /**
     * Dapatkan post berdasarkan author
     * @param int|null $userId bila null maka semuanya
     * @return Collection
     */
    public function getByAuthor($userId=null, $type=null)
    {
        $p = new Post();
        if($userId!==null) $p = $p->where('author_id', '=', $userId);
        if($type!==null) $p = $p->whereOwnerType($type);
        return $p->orderBy('updated_at','desc')->get();
    }

    /**
     * Dapatkan jumlah post berdasarkan author
     * @param null|int $userId bila null maka semua
     * @param null|string $type bila null maka semua tipe
     * @return mixed
     */
    public function getCountByAuthor($userId=null, $type=null)
    {
        $p = new Post();
        if($userId!==null) $p = $p->where('author_id', '=', $userId);
        if($type!==null) $p = $p->whereOwnerType($type);
        return $p->count();
    }

    /**
     * Dapatkan post berdasarkan id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Post::find($id);
    }
}