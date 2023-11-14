<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    amount
                </th>
                <th scope="col" class="px-6 py-3">
                    total amount
                </th>
                <th scope="col" class="px-6 py-3">
                tax percentage
                </th>
                <th scope="col" class="px-6 py-3">
                    tax amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        net amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        mail
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            action
                                            </th>
                                        
            </tr>
        </thead>
        <tbody>
            
            @foreach ($invoices as $invoice )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="">
                   {{$invoice->quantity}}
                </th>
                <td class="px-6 py-4">
                    {{$invoice->amount}}
                </td>
                <td class="px-6 py-4">
                    {{$invoice->total_amount}}
                </td>
                <td class="px-6 py-4">
                    {{$invoice->tax_percentage}}
                </td>
                <td scope="row" class="">
                    {{$invoice->tax_amount}}
                </th>
                <td class="px-6 py-4">
                    {{$invoice->net_amount}}
                </td>
                <td class="px-6 py-4">
                    {{$invoice->name}}
                </td>
                <td class="px-6 py-4">
                    {{$invoice->date}}
                </td>
                <td class="px-6 py-4">
                    <img src="{{asset('storage/'.$invoice->file)}}" alt="img" width="100" height="100">
                </td>
                <td class="px-6 py-4">
                    {{$invoice->email}}
                </td>

                <td class="px-6 py-4">
                    <form action="{{route('deleteinvoice',['id'=>$invoice->id])}}" class="delete-form" method="POST">
                        @method('delete')
                        @csrf
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</button>
                </form>
<!-- Modal toggle -->
<button data-modal-target="modal{{$invoice->id}}" data-modal-toggle="modal{{$invoice->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    edit
  </button>
  
  <!-- Main modal -->
  <div id="modal{{$invoice->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                 

                <form action="{{route('updateinvoice',['id'=>$invoice->id])}}" id="editform" class="edit-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">quantity</label>
                      <input type="text" value="{{$invoice->quantity}}"  id="quantity" name="quantity" class=" update bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                    </div>
                    <div class="mb-6">
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">amount</label>
                      <input type="text" id="amount" name="amount"  class=" update bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">total amount</label>
                        <input type="text"  name="total_amount" id="totalAmount"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   readonly>
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tax percentage</label>
                        <input type="text"  name="tax_percentage" id="taxPercentage"  class="update bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tax amount</label>
                        <input type="text"  name="tax_amount" id="taxAmount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  readonly>
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">net amount</label>
                        <input type="text"  name="net_amount" id="netAmount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  readonly>
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
                        <input type="text"  name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">date</label>
                        <input type="date"  name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">file</label>
                        <input type="file"  name="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                        <input type="text"  name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
                      </div>
                    </div>
                   
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </form>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                  <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
              </div>
          </div>
      </div>
  </div>
  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



                  
                    
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('js/editDelete.js')}}"></script>
    <script>
        
      const temp = document.querySelectorAll('.update');

function calculation()
{
  var amount = document.getElementById('amount').value;
  var quantity = document.getElementById('quantity').value;
  var totalAmount = amount * quantity;
  document.getElementById('totalAmount').value = totalAmount;
  var taxPercentage = document.getElementById('taxPercentage').value;
  var taxAmount = (totalAmount * taxPercentage)/100;
  document.getElementById('taxAmount').value = taxAmount;
  var netAmount = totalAmount +taxAmount; 
  document.getElementById('netAmount').value = netAmount;
}

temp.forEach(function (inputelement) {
  inputelement.addEventListener('input', calculation)
})
    </script>

</x-app-layout>
 