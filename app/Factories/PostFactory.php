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
     * @param $userId
     * @return Collection
     */
    public function getByAuthor($userId, $type=null)
    {
        $p = Post::where('author_id', '=', $userId);
        if($type!==null) $p = $p->whereOwnerType($type);
        return $p->orderBy('updated_at','desc')->get();
    }

    public function getCountByAuthor($userId, $type=null)
    {
        $p = Post::where('author_id', '=', $userId);
        if($type!==null) $p = $p->whereOwnerType($type);
        return $p->count();
    }

    public function getById($id)
    {
        return Post::find($id);
    }
}