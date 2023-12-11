<?php

namespace Modules\Blog\app\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Blog\Services\BlogService;
use Modules\Blog\app\Resources\BlogResource;
use Modules\Blog\app\Http\Requests\CreateBlogRequest;
use Modules\Blog\app\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function __construct(
        private BlogService $blogService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->blogService->getAllBlogsWithPaginate($request->perOfPage);

        return $this->respondWithSuccess([
            'data' => BlogResource::collection($data)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(CreateBlogRequest $request)
    {
        $blog = $this->blogService->createBlog([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'content' => $request->content,
            'is_published' => true,
        ]);

        $blog->addMediaFromRequest('image')->toMediaCollection('image');

        return $this->respondWithSuccess([
            'data' => new BlogResource($blog)
        ]);
    }

    /**
     * Show the specified resource.
     */
    public function show($IdOrSlug)
    {
        $data = $this->blogService->getBlogByIdOrSlug($IdOrSlug);

        return $this->respondWithSuccess([
            'data' => new BlogResource($data)
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, $id): RedirectResponse
    {
        $blog = $this->blogService->updateBlogByIdOrSlug($id, [
            'name' => $request->name,
            'description' => $request->description,
            'content' => $request->content,
        ]);

        $blog->clearMediaCollection('image');
        $blog->addMediaFromRequest('image')->toMediaCollection('image');

        return $this->respondWithSuccess([
            'data' => new BlogResource($blog)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($IdOrSlug)
    {
        $data = $this->blogService->deleteBlogByIdOrSlug($IdOrSlug);

        return $this->respondNoContent();
    }
}
