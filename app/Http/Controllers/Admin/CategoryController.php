<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $category_list = $this->categoryRepository->getCategories();

        return view('admin.categories.index', compact(['category_list']));

    }

    public function create()
    {
        $category_list = $this->categoryRepository->getCategories();

        return view('admin.categories.add', compact(['category_list']));

    }

    public function store(CategoryRequest $request)
    {
        if ($this->categoryRepository->createCategory($request->only('category_name', 'parent_id')))
        {

            return redirect()->route('categories.index')->with('Success', trans('messages.category.success'));

        } else {

            return redirect()->route('categories.index')->with('Fail', trans('messages.category.fail'));
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $category = $this->categoryRepository->findCategories($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $update = $this->categoryRepository->updateCategory($id, $request->all());
        if ($update)
        {

            return redirect()->route('categories.index')->with('Success', trans('messages.category.success'));

        } else {

            return redirect()->route('categories.edit')->with('Fail', trans('messages.category.fail'));
        }
    }

    public function destroy($id)
    {
        $deleteResult = $this->categoryRepository->deleteCategory($id);
        if ($deleteResult)
        {
            return redirect()->route('categories.index')->with('Success', trans('messages.category.success'));

        } else {

            return redirect()->back()->with('Fail', trans('messages.category.fail'));
        }
    }

}
