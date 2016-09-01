<?php

namespace App\Http\Controllers;

use App\Models\Contacto;

use Illuminate\Http\Requests;

use Redirect;

use Illuminate\Http\Request;

class ContactoController extends Controller
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
	 * Muestra el listado de Contacto.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('DogAdmin.Contacto.index',['items' => Contacto::all()]);
	}

	/**
	 * Muestra el formulario para crear un nuevo Contacto.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('DogAdmin.Contacto.add_edit');
	}

	/**
	 * Store a newly created Contacto in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, Contacto::$rules, Contacto::$messages);

        $this->createEntry(Contacto::class, $request->all());

        return Redirect::route('Contacto.index');
	}

	/**
	 * Display the specified Contacto.
	 *
	 * @param Contacto $contacto
	 * @return Response
	 */
	public function show(Contacto $contacto)
	{
		return view('Contacto.show', ['item' => $contacto]);
	}

	/**
	 * Show the form for editing the specified Contacto.
	 *
	 * @param Contacto $contacto
     * @return Response
     */
    public function edit(Contacto $contacto)
	{
		return view('Contacto.add_edit', ['item' => $contacto]);
	}

	/**
	 * Update the specified Contacto in storage.
	 *
	 * @param Contacto  $contacto
     * @param Request    $request
     * @return Response
     */
    public function update(Contacto $contacto, Request $request)
	{
		$this->validate($request, Contacto::$rules, Contacto::$messages);

        $this->updateEntry($contacto, $request->all());

        return Redirect::route('Contacto.index');
	}

	/**
	 * Remove the specified Contacto from storage.
	 *
	 * @param Contacto  $contacto
     * @param Request    $request
	 * @return Response
	 */
	public function destroy(Contacto $contacto, Request $request)
	{
		$this->deleteEntry($contacto, $request);

        return Redirect::route('Contacto.index');
	}
}