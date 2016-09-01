<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

use Illuminate\Http\Requests;

use Redirect;

use Illuminate\Http\Request;

class PortfolioController extends Controller
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
	 * Muestra el listado de Portfolio.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('DogAdmin.Portfolio.index',['items' => Portfolio::all()]);
	}

	/**
	 * Muestra el formulario para crear un nuevo Portfolio.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('DogAdmin.Portfolio.add_edit');
	}

	/**
	 * Store a newly created Portfolio in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, Portfolio::$rules, Portfolio::$messages);

        $this->createEntry(Portfolio::class, $request->all());

        return Redirect::route('Portfolio.index');
	}

	/**
	 * Display the specified Portfolio.
	 *
	 * @param Portfolio $portfolio
	 * @return Response
	 */
	public function show(Portfolio $portfolio)
	{
		return view('Portfolio.show', ['item' => $portfolio]);
	}

	/**
	 * Show the form for editing the specified Portfolio.
	 *
	 * @param Portfolio $portfolio
     * @return Response
     */
    public function edit(Portfolio $portfolio)
	{
		return view('Portfolio.add_edit', ['item' => $portfolio]);
	}

	/**
	 * Update the specified Portfolio in storage.
	 *
	 * @param Portfolio  $portfolio
     * @param Request    $request
     * @return Response
     */
    public function update(Portfolio $portfolio, Request $request)
	{
		$this->validate($request, Portfolio::$rules, Portfolio::$messages);

        $this->updateEntry($portfolio, $request->all());

        return Redirect::route('Portfolio.index');
	}

	/**
	 * Remove the specified Portfolio from storage.
	 *
	 * @param Portfolio  $portfolio
     * @param Request    $request
	 * @return Response
	 */
	public function destroy(Portfolio $portfolio, Request $request)
	{
		$this->deleteEntry($portfolio, $request);

        return Redirect::route('Portfolio.index');
	}
}