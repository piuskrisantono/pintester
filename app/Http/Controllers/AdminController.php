<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function show()
    {
        $users = User::all();
        return view('manageUser', compact('users'));
    }

    public function showCategory()
    {
        $categories = Category::all();
        return view('manageCategory', compact('categories'));
    }

    public function editProfile($id)
    {
        $user = User::find($id);
        return view('editProfile', compact('user'));
    }

    public function updateCategory($id)
    {
        $category = Category::find($id);
        return view('updateCategory', compact('category'));
    }

    public function doUpdateCategory(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:20',
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $category = Category::find($request->category_id);
        $category->category_name = $request->name;
        $category->save();
        return back()->with('message', 'Category succesfully updated');
    }
    public function doAddCategory(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:3|max:20',
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $category = new Category();
        $category->category_name = $request->name;
        $category->save();
        return redirect(url('/manage_category'))->with('message', 'Category succesfully added');
    }

    public function saveEdit(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'gender' => 'required'
            ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $user = User::find($request->userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();
        return back()->with('message', 'Profile Updated');
    }

    public function doDelete($id)
    {
        User::destroy($id);
        return redirect(url('/manage_user'))->with('message', 'User Successfully Deleted');

    }

    public function doDeleteCategory($id)
    {
        Category::destroy($id);
        return redirect(url('/manage_category'))->with('message', 'Category Successfully Deleted');
    }

}
