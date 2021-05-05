<?php

namespace App\Http\Controllers;

use App\Models\Combination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CombinationRequest;

class CombinationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$combinations = Combination::paginate();
		return view('combinations.index', compact('combinations'));
	}

    public function show(Combination $combination)
    {
        return view('combinations.show', compact('combination'));
    }

	public function create(Combination $combination)
	{
		return view('combinations.create_and_edit', compact('combination'));
	}

	public function store(CombinationRequest $request)
	{
		$combination = Combination::create($request->all());
		return redirect()->route('combinations.show', $combination->id)->with('message', 'Created successfully.');
	}

	public function edit(Combination $combination)
	{
        $this->authorize('update', $combination);
		return view('combinations.create_and_edit', compact('combination'));
	}

	public function update(CombinationRequest $request, Combination $combination)
	{
		$this->authorize('update', $combination);
		$combination->update($request->all());

		return redirect()->route('combinations.show', $combination->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Combination $combination)
	{
		$this->authorize('destroy', $combination);
		$combination->delete();

		return redirect()->route('combinations.index')->with('message', 'Deleted successfully.');
	}
}