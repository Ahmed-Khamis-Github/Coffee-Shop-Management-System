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
		$request_data["image"]='';
		Category::create($request_data);

		// $path = $image->store("uploadedfile", 'track_uploads');
		// $request_data["image"] = $path;



		return to_route('categories.index');
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$category = Category::findorfail($id);
		return view('dashboard.categories.show',compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$category = Category::findorfail($id);
		return view('dashboard.categories.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(StoreCategoryRequest $request, string $id)
	{
		//
		dd($request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Category $category)
	{
		    //    if($track->logo){
        //     try {
        //         unlink("images/track_logo/{$track->logo}");
        //     }catch (\Exception $e){
        //         dd($e);
        //     }
        // }
        $category->delete();
        return to_route('categories.index');
	}
}
