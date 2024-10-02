<?php

  namespace App\Http\Controllers;

  use App\Models\BudgetDetail;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;

  class BudgetController extends Controller
  {

    public function createBudget(Request $request){
      /**
       * Validate form
       */
      $request->validate([
        'name' => 'required|unique:budget_details,name',
      ],[
        'name.required' => 'Se requiere el nombre del presupuesto',
        'name.unique'   => 'El nombre del presupuesto ya existe',
      ]);

      // Usar dd() para ver los datos del formulario
      //dd($request->all());

      // Iniciar transacción
      try{
        DB::transaction(function() use ($request){
          // Guardar detalles del presupuesto
          BudgetDetail::create([
            'user_id'            => Auth::id(),
            'name'               => $request->name,
            'currency'           => $request->currency,
            'currency_placement' => $request->currency_placement,
            'number_format'      => $request->number_format,
            'date_format'        => $request->date_format,
          ]);
        });

        // Respuesta de éxito para AJAX
        return response()->json(['success' => true]);

      } catch(\Exception $e){
        // Manejo de errores para AJAX
        return response()->json(['success' => false,'message' => 'Error al crear el presupuesto: '.$e->getMessage()],500);
      }

    } // End Method

    public function editBudget(Request $request){

      $user   = Auth::user();
      $budget = $user->budgetDetails()->first();

      $data = [
        'user'   => $user,
        'budget' => $budget,
      ];

      // Devuelve la vista de edición con los datos del presupuesto
      return view('modal-edit-budget',$data);

    } //End Method
    function updateBudget(Request $request){


    } //End Method


  }
