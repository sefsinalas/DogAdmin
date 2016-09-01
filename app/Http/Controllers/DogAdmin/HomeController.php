<?php

namespace App\Http\Controllers;

use App\Models\Home;

use Illuminate\Http\Requests;

use Redirect;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Muestra el listado de Home.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('DogAdmin.Home.index',['items' => Home::all()]);
	}

	/**
	 * Muestra el formulario para crear un nuevo Home.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('DogAdmin.Home.add_edit');
	}

	/**
	 * Store a newly created Home in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, Home::$rules);

        Home::create($request->all());

        return Redirect::route('home');
	}

	/**
	 * Display the specified Home.
	 *
	 * @param Home $home
	 * @return Response
	 */
	public function show(Home $home)
	{
		return view('Home.show', ['item' => $home]);
	}

	/**
	 * Show the form for editing the specified Home.
	 *
	 * @param Home $home
     * @return Response
     */
    public function edit(Home $home)
	{
		return view('Home.add_edit', ['item' => $home]);
	}

	/**
	 * Update the specified Home in storage.
	 *
	 * @param Home  $home
     * @param Request    $request
     * @return Response
     */
    public function update(Home $home, Request $request)
	{
		$this->validate($request, Home::$rules, Home::$messages);

        $this->updateEntry($home, $request->all());

        return Redirect::route('Home.index');
	}

	/**
	 * Remove the specified Home from storage.
	 *
	 * @param Home  $home
     * @param Request    $request
	 * @return Response
	 */
	public function destroy(Home $home, Request $request)
	{
		$this->deleteEntry($home, $request);

        return Redirect::route('Home.index');
	}
}