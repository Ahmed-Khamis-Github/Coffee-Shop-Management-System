<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$categories = Category::all();
		return view('dashboard.categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('dashboard.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreCategoryRequest $request)
	{

		$request_data = $request->all();
		$image = $request_data['image'];
		$path = $image->store("", 'categories_images');
		$request_data["image"] = $path;
		Category::create($request_data);




		return to_route('categories.index');
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$category = Category::findorfail($id);
		return view('dashboard.categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$category = Category::findorfail($id);
		return view('dashboard.categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(StoreCategoryRequest $request, string $id)
	{
		$category = Category::findorfail($id);

		$request_data = $request->all();

		if ($request->has('image')) {
			unlink("images/categories/$category->image");
			$image = $request_data['image'];
			$path = $image->store("", 'categories_images');
			$request_data["image"] = $path;
		}else{
			$request_data["image"] = $category->image;
		}

		$category->update($request_data);
		return to_route('categories.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Category $category)
	{
		unlink("images/categories/$category->image");
		$category->delete();
		return to_route('categories.index');
	}
}
