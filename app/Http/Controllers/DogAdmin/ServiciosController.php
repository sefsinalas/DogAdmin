<?php

namespace App\Http\Controllers;

use App\Models\Servicios;

use Illuminate\Http\Requests;

use Redirect;

use Illuminate\Http\Request;

class ServiciosController extends Controller
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
	 * Muestra el listado de Servicios.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('DogAdmin.Servicios.index',['items' => Servicios::all()]);
	}

	/**
	 * Muestra el formulario para crear un nuevo Servicios.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('DogAdmin.Servicios.add_edit');
	}

	/**
	 * Store a newly created Servicios in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, Servicios::$rules, Servicios::$messages);

        $this->createEntry(Servicios::class, $request->all());

        return Redirect::route('Servicios.index');
	}

	/**
	 * Display the specified Servicios.
	 *
	 * @param Servicios $servicios
	 * @return Response
	 */
	public function show(Servicios $servicios)
	{
		return view('Servicios.show', ['item' => $servicios]);
	}

	/**
	 * Show the form for editing the specified Servicios.
	 *
	 * @param Servicios $servicios
     * @return Response
     */
    public function edit(Servicios $servicios)
	{
		return view('Servicios.add_edit', ['item' => $servicios]);
	}

	/**
	 * Update the specified Servicios in storage.
	 *
	 * @param Servicios  $servicios
     * @param Request    $request
     * @return Response
     */
    public function update(Servicios $servicios, Request $request)
	{
		$this->validate($request, Servicios::$rules, Servicios::$messages);

        $this->updateEntry($servicios, $request->all());

        return Redirect::route('Servicios.index');
	}

	/**
	 * Remove the specified Servicios from storage.
	 *
	 * @param Servicios  $servicios
     * @param Request    $request
	 * @return Response
	 */
	public function destroy(Servicios $servicios, Request $request)
	{
		$this->deleteEntry($servicios, $request);

        return Redirect::route('Servicios.index');
	}
}