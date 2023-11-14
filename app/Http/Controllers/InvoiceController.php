<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Notifications\InvoiceNotification;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    //view invoice

    public function viewinvoice(){
        $invoice = Invoice::orderBy('id','desc')->get();
        
        return view('invoice',['invoices'=>$invoice]);
        
    }

//add invoice
    public function invoice(Request $request){
        $validator = Validator::make($request->all(),[
            'quantity'=>'required|integer',
            'amount'=>'required|numeric',
            'tax_percentage'=>'required|in:0,5,12,18,28',
            'name'=>'required|string',
            'date'=>'required|date',
            'file'=>'required|mimes:jpg,png,pdf,jpeg',
            'email'=>'required|email'
        ]);


        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'validation failed',
                'error'=>$validator->errors()->toJson()
            ]);
        }

        $totalAmount = $request->quantity * $request->amount;
        $taxAmount = ($totalAmount * $request->tax_percentage)/100;
        $netAmount = $totalAmount + $taxAmount;

        $filename = $request->file('file')->hashName();
        $filepath = 'uploads/' . $filename;
        $request->file('file')->storeAs('public/' . $filepath);

    


        $details = [
            'quantity'=> $request->quantity,
            'amount'=> $request->amount,
            'total_amount'=>$totalAmount,
            'tax_percentage'=>$request->tax_percentage,
            'tax_amount'=>$taxAmount,
            'net_amount'=>$netAmount,
            'name'=>$request->name,
            'date'=>$request->date,
            'file'=>$filepath,
            'email'=>$request->email,
        ];

        
        Invoice::create($details);
        
        // $to = $details['email'];    
        // Notification::route('mail',$to)->notify(new InvoiceNotification($details));



        return response()->json([
            'status'=>true,
            'message'=>'invoice added successfull'
        ]);
    }
//update invoice
    public function updateinvoice(Request $request,$id){
        try{
            $invoice = Invoice::findOrFail($id);
            $validator = Validator::make($request->all(),[
                'quantity'=>'nullable|integer',
            'amount'=>'nullable|numeric',
            'tax_percentage'=>'nullable|in:0,5,12,18,28',
            'name'=>'nullable|string',
            'date'=>'nullable|date',
            'file'=>'nullable|mimes:jpg,png,pdf,jpeg',
            'email'=>'nullable|email'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'validation failed',
                    'error'=>$validator->errors()
                ]);
            }

            $update = [];
            $update['amount'] = $invoice->amount;
            $update['quantity'] = $invoice->quantity;
            $update['tax_percentage'] = $invoice->tax_percentage;

            

            if($request->filled('amount') && $invoice->amount != $request->amount){
                $update['total_amount'] = $request->amount * $invoice->quantity;
                $update['tax_amount'] = ($update['total_amount'] * $invoice->tax_percentage)/100;
                $update['net_amount'] = $update['total_amount'] + $update['tax_amount'] ;
                $update['amount'] = $request->amount;
            }


            if($request->filled('quantity') && $invoice->quantity != $request->quantity){
                $update['total_amount'] = $update['amount'] * $request->quantity;
                $update['tax_amount'] = ($update['total_amount'] * $invoice->tax_percentage)/100;
                $update['net_amount'] = $update['total_amount'] + $update['tax_amount'] ;
                $update['quantity'] = $request->quantity;
            }
            
            if($request->filled('tax_percentage') && $invoice->tax_percentage != $request->tax_percentage){
                $update['total_amount'] = $update['amount'] * $update['quantity'];
                $update['tax_amount'] = ($update['total_amount'] * $request->tax_percentage)/100;
                $update['net_amount'] = $update['total_amount'] + $update['tax_amount'] ;
                $update['tax_percentage'] = $request->tax_percentage;
            }

          $temp = [
            'name',
            'date',
            'email',
          ];


          foreach($temp as $data){
            if($request->filled($data)){
                $update[$data] = $request->input($data);
            }
          }

          if($request->hasFile('file')){
            $imagename = $request->file('file')->hashName();
            $imagepath = 'uploads/'.$imagename;
            $request->file('file')->storeAs('public/'.$imagepath);

            $update['file'] = $imagepath;
          }

          $invoice->update($update);

          return response()->json([
            'status'=>true,
            'message'=>'update  successfull',
          ]);
        }

        catch(ModelNotFoundException $e){
            return response()->json([
                'status'=>false,
                'message'=>'invoice not found',
                'error'=> $e->getMessage()
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'internal server error',
                'error'=> $e->getMessage()
            ]);
        }
    }

    //delete
    public function delete($id){
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return response()->json([
            'status'=>true,
            'message'=>'deleted success',
        ]);
    }
}
