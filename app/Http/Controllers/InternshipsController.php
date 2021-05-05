<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InternshipRequest;

class InternshipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$internships = Internship::paginate();
		return view('internships.index', compact('internships'));
	}

    public function show(Internship $internship)
    {
        return view('internships.show', compact('internship'));
    }

	public function create(Internship $internship)
	{
		return view('internships.create_and_edit', compact('internship'));
	}

	public function store(InternshipRequest $request)
	{
		$internship = Internship::create($request->all());
		return redirect()->route('internships.show', $internship->id)->with('message', 'Created successfully.');
	}

	public function edit(Internship $internship)
	{
        $this->authorize('update', $internship);
		return view('internships.create_and_edit', compact('internship'));
	}

	public function update(InternshipRequest $request, Internship $internship)
	{
		$this->authorize('update', $internship);
		$internship->update($request->all());

		return redirect()->route('internships.show', $internship->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Internship $internship)
	{
		$this->authorize('destroy', $internship);
		$internship->delete();

		return redirect()->route('internships.index')->with('message', 'Deleted successfully.');
	}
}
