<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\Support\Facades\DB;
  use App\Models\Budget;
  use App\Models\User;

  class BudgetController extends Controller
  {

    public function CreateBudget(Request $request){
      /**
       * Validate form
       */
      $request->validate([
        'name' => 'required|unique:budget_details,name',
      ],[
        'name.required' => 'Se requiere el nombre del presupuesto',
        'name.unique'   => 'El nombre del presupuesto ya existe',
      ]);

      // Iniciar transacción
      try{
        DB::transaction(function() use ($request){
          // Guardar detalles del presupuesto
          Budget::create([
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

    } //End Method

   /* public function editBudget(Request $request){

      $user   = Auth::user();
      $budget = $user->getBudget()->first();

      $data = [
        'user'   => $user,
        'budget' => $budget,
      ];

      // Devuelve la vista de edición con los datos del presupuesto
      return view('front.modals.modal-edit-budget',$data);

    } */ //End Method

    public function updateBudget(Request $request){

      dd('Click en Update...');
     /* $request->validate([
        'name' => 'required|unique:budget_details,name',
      ],[
        'name.required' => 'Se requiere el nombre del presupuesto',
        'name.unique'   => 'El nombre del presupuesto ya existe',
      ]);*/

    } //End Method


  }
