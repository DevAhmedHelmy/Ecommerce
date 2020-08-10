<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index',['categories' => $categories,'title' => trans('admin.categories_Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',['categories' => $categories,'title' => trans('admin.create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        if (request()->hasFile('icon')) {
			$data['icon'] = up()->uploadFile([
                'file'        => 'logo',
                'path'        => 'categories',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
		}
        Category::create($data);
		session()->flash('success', trans('admin.added_successfully'));
		return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.categories.edit',['category' => $category,'title' => trans('admin.update')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if (request()->hasFile('icon')) {
			$data['icon'] = up()->uploadFile([
                'file'        => 'icon',
                'path'        => 'categories',
                'upload_type' => 'single',
                'delete_file' => $country->icon,
            ]);
		}
        $category->update($data);
		session()->flash('success', trans('admin.updated_successfully'));
		return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        self::delete_parent($category->id);
        session()->flash('success', trans('admin.deleted_successfully'));
		return redirect(route('admin.categories.index'));
    }
    public static function delete_parent($id)
    {
        $categories = Category::where('parent_id',$id)->get();
        foreach($categories as $sub)
        {
            self::delete_parent($sub->id);
            \Storage::has($sub->icon) && !empty($sub->icon) ? \Storage::delete($sub->icon) : '';
            Category::findOrfail($sub->id)->delete();
        }
        $main_cat = Category::findOrfail($id);
        \Storage::has($main_cat->icon) && !empty($main_cat->icon) ? \Storage::delete($main_cat->icon) : '';
        $main_cat->delete();
    }
}
