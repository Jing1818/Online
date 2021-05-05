<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;

class TeamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$teams = Team::paginate();
		return view('teams.index', compact('teams'));
	}

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

	public function create(Team $team)
	{
		return view('teams.create_and_edit', compact('team'));
	}

	public function store(TeamRequest $request)
	{
		$team = Team::create($request->all());
		return redirect()->route('teams.show', $team->id)->with('message', 'Created successfully.');
	}

	public function edit(Team $team)
	{
        $this->authorize('update', $team);
		return view('teams.create_and_edit', compact('team'));
	}

	public function update(TeamRequest $request, Team $team)
	{
		$this->authorize('update', $team);
		$team->update($request->all());

		return redirect()->route('teams.show', $team->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Team $team)
	{
		$this->authorize('destroy', $team);
		$team->delete();

		return redirect()->route('teams.index')->with('message', 'Deleted successfully.');
	}
}