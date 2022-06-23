<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use App\Http\Requests\CategoryRequest;
use App\Traits\Media;
use App\DataTables\CategoryDataTable;

class CategoriesController extends Controller
{
    use Media;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        try {
                return $dataTable->render('backend.categories.index');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categorises = Category::all();
            return view('backend.categories.create',compact('categorises'));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
           $category = Category::create($request->except('image'));
            if($file = $request->file('image')) {
                $fileData = $this->uploads($file,'images/categories/');
                $category->image = $fileData['fileName'];
            }
            $category->save();
            return response()->json(['message' =>__('messages.save'), 'icon' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $row = Category::findOrFail($id);
            $categorises = Category::all();
            return view('backend.categories.edit',compact('categorises','row'));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {

            $category = Category::findOrFail($id);
            $category->update($request->except('image'));
             if($file = $request->file('image')) {
                $image = public_path('storage/images/categories/' . $category->getOriginal('image'));
                if(file_exists($image)) {
                     unlink($image);
                }
              
                 $fileData = $this->uploads($file,'images/categories/');
                 $category->image = $fileData['fileName'];
             }
             $category->save();
             return response()->json(['message' =>__('messages.update'), 'icon' => 'success']);
         } catch (Exception $e) {
             return response()->json($e->getMessage(), 500);
         }
    }


    public function updateStatus($id){
        try {
            $category = Category::findOrFail($id);
            $category->update(['status'=>!$category->status]);
            return response()->json(['message' => __('messages.update'), 'icon' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => __('messages.delete'), 'icon' => 'success']);
    } catch (Exception $e) {
        return response()->json($e->getMessage(), 500);
    }
    }

    public function Delete_All(Request $request){
        try{
             $ids = $request->id;
            $categorises = Category::whereIn('id',$ids)->delete();
            return response()->json(['message' => __('messages.delete'), 'icon' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
        }
   
}
