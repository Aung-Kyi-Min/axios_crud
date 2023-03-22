<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>StudentsAjax</title>
</head>

<!-- bootstrap cdn css link -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


<body class=" bg-dark">


<!-- AddStudentModal -->
<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <ul id="saveform_errlist"></ul>
        <form action="" name="myform">
            
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name">
            <span id="nameError"></span>
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="email">
            <span id="emailError"></span>
        </div>
        <div class="form-group mb-3">
            <label for="">Course</label>
            <input type="text" class="form-control" name="course" id="course">
            <span id="courseError"></span>
        </div>
        <div class="form-group mb-3">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" id="address">
            <span id="addressError"></span>
        </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_student">Add </button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end AddStudentModal -->

<!-- EditStudentModal -->
<div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <ul id="updateform_errlist"></ul>
        <form action="" name="myform">

        <input type="hidden"  name="editStud_id" id="editStud_id">
            
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="edit_name">
            <span id="nameError"></span>
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="edit_email">
            <span id="emailError"></span>
        </div>
        <div class="form-group mb-3">
            <label for="">Course</label>
            <input type="text" class="form-control" name="course" id="edit_course">
            <span id="courseError"></span>
        </div>
        <div class="form-group mb-3">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" id="edit_address">
            <span id="addressError"></span>
        </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_student">Update </button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end EditStudentModal -->

<!-- DeleteStudentModal -->
<div class="modal fade" id="DeleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Student </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <ul id="deleteform_errlist"></ul>
        <form action="" name="myform">

        <input type="hidden"  name="deleteStud_id" id="deleteStud_id">
        <h5 class="text-danger bold">Are You Sure Want To Delete This Data ???</h5>


      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_studentBtn">Delete </button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end DeleteStudentModal -->

<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
        
        <div id="successMsg"></div>
        <!-- <span id="successMsg"></span> -->
        
            <div class="card">
                <span id="saveform_errlist"></span>
                
                <div class="card-header">
                
                    <h4>
                        Student Data
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddStudentModal" class="btn btn-primary float-end btn-sm">Add Student</a>
                    </h4>
                </div>
                <div class="cart-body">
                <table class="table table-bordered text-center">
            <thead class="text-center bg-primary text-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-center text-dark" id="tablebody">


            </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
</div>
    


<!-- bootstrap cdn js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-bootstrap jquery js cdn link -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" integrity="sha512-/HL24m2nmyI2+ccX+dSHphAHqLw60Oj5sK8jf59VWtFWZi9vx7jzoxbZmcBeeTeCUc7z1mTs3LfyXGuBU32t+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 -->




<script>

    $(document).ready(function (){
        // alert('aa');

        // SHOW DATA
        fetchData();

        function fetchData(){
            $.ajax({
                type: "get",
                url:"/showStudents",
                dataType: "json",
                success: function(response){
                    console.log(response.students);

                    $('tbody').html("");
                    $.each(response.students, function(key , item){
                        $('tbody').append('<tr>'+
                            '<td class="idList">'+item.id+'</td>'+
                            '<td class="TitleList">'+item.name+'</td>'+
                            '<td class="DescList">'+item.email+'</td>'+
                            '<td class="DescList">'+item.course+'</td>'+
                            '<td class="DescList">'+item.address+'</td>'+
                            '<td class="btnList">'+
                                '<p>'+
                                    '<button type="submit" value="'+item.id+'" class="edit_student btn btn-success ml-1.5 " data-toggle="modal" data-target="#exampleModal" >Edit</button>'+
                                    '<button type="submit" value="'+item.id+'" class="delete_student btn btn-danger ml-1.5 " >Delete</button>'+
                                '</p>'+
                            '</td>'+
                        '</tr>');
                    })

                }

            });
        }

        // EDIT AND UPDATE

        // EDIT
        $(document).on('click','.edit_student', function(e){
            e.preventDefault();
            var stu_id = $(this).val();
            // console.log(stu_id);
            $('#EditStudentModal').modal('show');

            $.ajax({
                type: "get",
                url : "/edit_student/"+stu_id,
                dataType: "json",
                success: function(response){
                    console.log(response);
                    if(response.status == 404){
                        $('#successMsg').html("");
                        $('#successMsg').addClass('alert alert-danger');
                        $('#successMsg').text(response.message);
                    }else{
                        console.log(response.student.name);
                        $('#edit_name').val(response.student.name);
                        $('#edit_email').val(response.student.email);
                        $('#edit_course').val(response.student.course);
                        $('#edit_address').val(response.student.address);
                        $('#editStud_id').val(stu_id);
                    }
                }
            });
        });


        // UPDATE
        $(document).on('click','.update_student', function(e){
            e.preventDefault();

            $(this).text('Updating');

            var update_id = $('#editStud_id').val();
            var data = {
                'name' : $('#edit_name').val(),
                'email' : $('#edit_email').val(),
                'course' : $('#edit_course').val(),
                'address' : $('#edit_address').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type : "put",
                url : "/updateStudent/" + update_id ,
                data : data,
                dataType : "json",
                success : function(response){
                    console.log(response);
                    if(response.status == 400){
                        $('#updateform_errlist').html("");
                        $('#updateform_errlist').addClass('alert alert-danger ');
                        $.each(response.error, function(key , err_values){
                            $('#updateform_errlist').append('<li>'+err_values+'</li>');
                            $('.update_student').text('Updating');
                        });
                    }else if(response.status == 404){
                        $('#updateform_errlist').html("");
                        $('#successMsg').addClass('alert alert-danger');
                        $('#successMsg').text(response.message);
                        $('.update_student').text('Updating');
                    }else if(response.status == 200){
                        $('#updateform_errlist').html("");
                        $('#successMsg').html("");
                        $('#successMsg').addClass('alert alert-success');
                        $('#successMsg').text(response.message);

                        $('#EditStudentModal').modal('hide');
                        fetchData();
                        $('.update_student').text('Updating');
                    }

                }
            });
        });


        // DELETE

        $(document).on('click','.delete_student',function(e){
            e.preventDefault();
            $stud_id = $(this).val();
            // alert($stud_id);
            $('#deleteStud_id').val($stud_id);
            $('#DeleteStudentModal').modal('show');
        });

        $(document).on('click','.delete_studentBtn',function(e){
            e.preventDefault();
            var delete_id = $('#deleteStud_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type : "delete",
                url : "/delete_student/" + delete_id,
                success: function(response){
                    console.log(response);
                    $('#successMsg').html("");
                    $('#successMsg').addClass('alert alert-success');
                    $('#successMsg').text(response.message);
                    $('#DeleteStudentModal').modal('hide');
                    fetchData();
                }
            });

        });



        // Adding
        $(document).on('click','.add_student', function(e){
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var data ={
                'name': $('#name').val(),
                'email': $('#email').val(),
                'course': $('#course').val(),
                'address': $('#address').val(),

            }
            // console.log(data);

            // var myForm = document.forms['myform'];
            // var nameInput =  myForm['name'];
            // var emailInput = myForm['email'];
            // var courseInput = myForm['course'];
            // var addressInput = myForm['address'];

            $.ajax({
                type: "post",
                url:"/students",
                data: data,
                dataType: "json",
                success: function(res){
                    console.log(res);

                    // $nameError = document.getElementById('nameError');
                    // $emailError = document.getElementById('emailError');
                    // $courseError = document.getElementById('courseError');
                    // $addressError = document.getElementById('addressError');
                    // // console.log(response);
                    // // console.log(response.data.msg);
                    // if(response.data.msg == 'Created Successfully...'){
                    //     alertMsg(response.data.msg);
                    //     console.log(response.data);
                    //     myForm.reset();
                    //     dispayData(response.data.createjob);

                    //     $nameError.innerHTML = $emailError.innerHTML = $courseError.innerHTML = $addressError.innerHTML = '';
                    // }else{
                    //     console.log(response.data.msg.name);

                    // $nameError.innerHTML = nameInput.value =='' ? 
                    // '<i class="text-danger">'+response.data.msg.name+'</i>' : '';
                    // $emailError.innerHTML = emailInput.value == '' ?
                    // '<i class="text-danger">'+response.data.msg.email+'</i>' : '';
                    // $courseError.innerHTML = courseInput.value == '' ?
                    // '<i class="text-danger">'+response.data.msg.course+'</i>' : '';
                    // $addressError.innerHTML = addressInput.value == '' ?
                    // '<i class="text-danger">'+response.data.msg.address+'</i>' : '';

                    // }



                    if(res.status == 400){
                        $('#saveform_errlist').html("");
                        $('#saveform_errlist').addClass('alert alert-danger ');
                        $.each(res.error, function(key , err_values){
                            $('#saveform_errlist').append('<li>'+err_values+'</li>');
                        });
                    }else{
                        $('#saveform_errlist').html("");
                        $('#successMsg').addClass('alert alert-success');
                        // $('#successMsg').text(res.message);
                        alertMsg(res.message);
                        // $('#AddStudentModal').modal('hide');
                        // window.location=res.url;
                        // $('#AddStudentModal').find('input').val("");
                        fetchData();
                    }
                }
            });

        });



    });

    function alertMsg(msg){
        document.getElementById('successMsg').innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'+msg+'</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

    }

</script>

</body>
</html><?php /**PATH C:\xampp\laravel_ajax_jquery\StudentAjax\resources\views/students/index.blade.php ENDPATH**/ ?>