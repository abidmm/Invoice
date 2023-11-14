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
                    
{{Auth::user()->role_id}}

   
                    
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
 