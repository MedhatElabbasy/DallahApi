<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\app\Models\Blog;

class BlogRepository
{
    public function getAllBlogsWithPaginate($perOfPage=10)
    {
        return Blog::paginate($perOfPage);
    }

    public function getBlogByIdOrSlug($data){
        return Blog::where('id', $data)->orWhere('slug', $data)->firstOrFail();
    }

    public function createBlog($data){
        return Blog::create($data);
    }

    public function deleteBlogByIdOrSlug($data){
        $blog = Blog::where('id', $data)->orWhere('slug', $data)->firstOrFail();
        $blog->delete();
    }

    public function updateBlogByIdOrSlug($id, $data){
        $blog = Blog::where('id', $id)->orWhere('slug', $id)->firstOrFail();
        $blog->update($data);

        return $blog;
    }
}
