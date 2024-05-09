<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Repository\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $Question;

    public function __construct(QuestionRepositoryInterface $Question)
    {
        $this->Question =$Question;
    }
    public function index()
    {
        return $this->Question->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Question->create();
    }

    public function store(Request $request)
    {
        return $this->Question->store($request);
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return $this->Question->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Question->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Question->destroy($request);
    }
}
