<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    


                    <form action="{{route('calinvoice')}}" method="post" enctype="multipart/form-data" id="addinvoice">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">quantity</label>
                          <input type="text"  id="quantity" name="quantity" class=" update bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  >
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
                       
                        <button type="submit" id="submitbtn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
      //add oninput=calculation() to input boxes

      //   function calculation(){
      //   var amount = document.getElementById('amount').value;
      //   var quantity = document.getElementById('quantity').value;
      //   var totalAmount = amount * quantity;
      //   document.getElementById('totalAmount').value = totalAmount;
      //   var taxPercentage = document.getElementById('taxPercentage').value;
      //   var taxAmount = (totalAmount * taxPercentage)/100;
      //   document.getElementById('taxAmount').value = taxAmount;
      //   var netAmount = totalAmount +taxAmount; 
      //   document.getElementById('netAmount').value = netAmount;
      // }


      // second method using eventlistener
      
      // const amountinput = document.getElementById('amount');
      // const quantityinput = document.getElementById('quantity');
      // const taxPercentage = document.getElementById('taxPercentage');

      // amountinput.addEventListener('input',function(){
      //   var amount = document.getElementById('amount').value;
      //   var quantity = document.getElementById('quantity').value;
      //   var totalAmount = amount * quantity;
      //   document.getElementById('totalAmount').value = totalAmount;
      //   var taxPercentage = document.getElementById('taxPercentage').value;
      //   var taxAmount = (totalAmount * taxPercentage)/100;
      //   document.getElementById('taxAmount').value = taxAmount;
      //   var netAmount = totalAmount +taxAmount; 
      //   document.getElementById('netAmount').value = netAmount;
      // })
      // quantityinput.addEventListener('input',function(){
      //   var amount = document.getElementById('amount').value;
      //   var quantity = document.getElementById('quantity').value;
      //   var totalAmount = amount * quantity;
      //   document.getElementById('totalAmount').value = totalAmount;
      //   var taxPercentage = document.getElementById('taxPercentage').value;
      //   var taxAmount = (totalAmount * taxPercentage)/100;
      //   document.getElementById('taxAmount').value = taxAmount;
      //   var netAmount = totalAmount +taxAmount; 
      //   document.getElementById('netAmount').value = netAmount;
      // })

     

      //3rd method
      
      //   function calculation(){
      //   var amount = document.getElementById('amount').value;
      //   var quantity = document.getElementById('quantity').value;
      //   var totalAmount = amount * quantity;
      //   document.getElementById('totalAmount').value = totalAmount;
      //   var taxPercentage = document.getElementById('taxPercentage').value;
      //   var taxAmount = (totalAmount * taxPercentage)/100;
      //   document.getElementById('taxAmount').value = taxAmount;
      //   var netAmount = totalAmount +taxAmount; 
      //   document.getElementById('netAmount').value = netAmount;
      // }
      // const amountinput = document.getElementById('amount');
      // const quantityinput = document.getElementById('quantity');
      // const taxPercentage = document.getElementById('taxPercentage');

      // amountinput.addEventListener('input',calculation)
      // quantityinput.addEventListener('input',calculation)
      // taxPercentage.addEventListener('input',calculation)



      //4th method

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
 