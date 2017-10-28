<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\address;
use App\Models\detailempadd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::all();
        return view('employeeRegister.listRegister',['employees' => $employees]);
    }


    public function create()
    {
        return view('employeeRegister.formRegister');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo $request['birthDate'];
        $validacion = Validator::make($request->all(), [
            'name'=> 'required|max:50',
            'email'=> 'unique:employee,email|required|email',
            'birthDate'=>'date_format:"Y-m-d"|required'
        ]);

        if($validacion->fails()){
            return back()->withInput()->withErrors($validacion);
        }

        DB::beginTransaction();
        try {
            $emp = new employee();
            $emp->name = $request['name'];
            $emp->email = $request['email'];
            $emp->birthDate = $request['birthDate'];

            $emp->save();

            foreach($request['address'] as $addr => $value) {
                $address = new address();
                $address->alias = $request['alias'][$addr];
                $address->address = $value;
                $address->save();

                $detail = new detailempadd();
                $detail->id_employee = $emp->id_employee;
                $detail->id_address = $address->id_address;
                $detail->save();
            }
            DB::commit();
        }catch(\Exception $ex) {
            return $ex;
            DB::rollback();
            Session::flash('message', 'El registro no puede ser completado,por favor revisa tus datos');
            return back()->withInput();
        }
        return redirect('registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
