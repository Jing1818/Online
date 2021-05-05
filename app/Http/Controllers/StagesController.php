<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StageRequest;

class StagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$stages = Stage::paginate();
		return view('stages.index', compact('stages'));
	}

    public function show(Stage $stage)
    {
        return view('stages.show', compact('stage'));
    }

	public function create(Stage $stage)
	{
		return view('stages.create_and_edit', compact('stage'));
	}

	public function store(StageRequest $request)
	{
		$stage = Stage::create($request->all());
		return redirect()->route('stages.show', $stage->id)->with('message', 'Created successfully.');
	}

	public function edit(Stage $stage)
	{
        $this->authorize('update', $stage);
		return view('stages.create_and_edit', compact('stage'));
	}

	public function update(StageRequest $request, Stage $stage)
	{
		$this->authorize('update', $stage);
		$stage->update($request->all());

		return redirect()->route('stages.show', $stage->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Stage $stage)
	{
		$this->authorize('destroy', $stage);
		$stage->delete();

		return redirect()->route('stages.index')->with('message', 'Deleted successfully.');
	}
}