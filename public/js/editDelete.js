document.addEventListener('DOMContentLoaded', function (){
    // const editform = document.getElementById('editform')
    const editform = document.querySelectorAll('.edit-form')
    const deleteform = document.querySelectorAll('.delete-form')

    function something(event){
        event.preventDefault();
        const form = event.target;
        const values = new FormData(form);
        



        fetch(form.action , {
            method:'post',
            body: values,
            headers: {
                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            }
        })


        .then((res)=>res.json())
        .then((res)=>{
            if(res.status == true){
                alert(res.message)
                location.reload()
            }
            else{
                alert(res.message)
            }
        })
    }


    // editform.addEventListener('submit', function(event){
      
    // })

    editform.forEach((form)=>{
        form.addEventListener('submit' , something)
    })

    deleteform.forEach((data)=>{
        data.addEventListener('submit' , something)
    })

})