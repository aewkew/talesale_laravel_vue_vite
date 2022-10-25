<?php

namespace App\Http\Controllers;
use App\Models\company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function companies(){
        $company = company::all();
        return response()->json(
            [
             'companies' => $company,
             'message' => 'Customer',
             'code' => 200
        ]
    );
    }    

    public function addCompanies(Request $request)
    {    
        try{
            $company=new company();
            $company->company_name          = $request->company_name;
            $company->company_phone         = $request->company_phone;
            $company->company_address       = $request->company_address;
            $company->save();

            $success = true;
            $message = "Add Product successfully";
    

        }catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }
        $response = [
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);

    }

    public function getCompanies($id){  
        $company=company::find($id);
        return response()->json($company);
       
    }
    
    public function deleteCompany($id) {
        $company=company::find($id);
        if($company->delete()){
             return response()->json([ 
               'message' => 'Product Delete SuccesFully',
                'code' => 200
           ]);
        }else {
           return response()->json([
               'message'=> 'Product with id:$id does not exits'
           ]);
        }
   }

   public function updateCompany($id, Request $request){
    $company= company::where('id', $id)->first();
    $company->company_name          = $request->company_name;
    $company->company_phone         = $request->company_phone;
    $company->company_address       = $request->company_address;
    $company->save();
    return response()->json([
       'message' => 'product Update Success ',
       'code' => 200
   ]);
}
}
