<?php

namespace Modules\Blog\Services;
use App\Http\Services\Service;
use Modules\Blog\Repositories\BlogRepository;

class BlogService extends Service
{
    public function __construct(
        private BlogRepository $blogRepository
    )
    {}

    public function getAllBlogsWithPaginate($perOfPage=10){
        return $this->blogRepository->getAllBlogsWithPaginate($perOfPage);
    }

    public function getBlogByIdOrSlug($data){
        return $this->blogRepository->getBlogByIdOrSlug($data);
    }

    public function createBlog($data){
        return $this->blogRepository->createBlog($data);
    }

    public function deleteBlogByIdOrSlug($data){
        return $this->blogRepository->deleteBlogByIdOrSlug($data);
    }

    public function updateBlogByIdOrSlug($id, $data){
        return $this->blogRepository->updateBlogByIdOrSlug($id, $data);
    }
}
