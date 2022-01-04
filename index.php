<?php include "conn.php";?>
<html>
  <head>
    <title>Datatable</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Modals -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this record?
            <input type="hidden" class="form-control" id="deleteId">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="dataModalLabel">Add New Record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="addForm">
              <input type="hidden" id="editId">
              <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="studentName" placeholder="Enter Name">
                <span style="color:red;display:none;" id="nameError">Name is required field</span>
              </div>
              <div class="form-group">
                <label for="mobile" class="col-form-label">Mobile Number:</label>
                <input type="text" class="form-control" id="studentMobile" placeholder="Enter Mobile Number">
                <span style="color:red;display:none;" id="mobileError">Mobile is required field</span>
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="studentEmail" placeholder="Enter Email">
                <span style="color:red;display:none;" id="emailError">Email is required field</span>
              </div>
              <div class="form-group">
                <label for="enroll" class="col-form-label">Enrollment Number:</label>
                <input type="text" class="form-control" id="studentEnroll" placeholder="Enter Enrollment Number">
                <span style="color:red;display:none;" id="enrollError">Enrollment Number is required field</span>
              </div>
              <div class="form-group">
                <label for="address" class="col-form-label">Address:</label>
                <input type="text" class="form-control" id="studentAddress" placeholder="Enter Address">
                <span style="color:red;display:none;" id="addressError">Address is required field</span>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" value="submit" class="btn btn-primary" id="confirmData">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Modals -->
    <div class="row">
      <div class="col-md-10 offset-md-1 mt-3">
        <table id="table_id" class="table table-striped">
          <div class="d-flex flex-row-reverse">
            <button class="btn btn-success mb-2 p-2" data-toggle="modal" data-target="#dataModal"><span class="fa fa-plus"></span> Add new record</button>
          </div>
          <thead>
            <tr>
              <?php $studentQuery = $con->query("SELECT * FROM student");
              $studentInfo=$studentQuery->fetch_fields();
              foreach($studentInfo as $val){
                if($val->name=="id"){?>
                  <th scope="col">#</th>
                <?php }else{?>
              <th scope="col"><?=$val->name?></th>
              <?php }}?>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $studentQuery = $con->query("SELECT * FROM student");
            $dynamicId=1;
            while($studentData=$studentQuery->fetch_array()){?>
            <tr>
              <td><?=$dynamicId?></td>
              <td><?=$studentData['name']?></td>
              <td><?=$studentData['mobile']?></td>
              <td><?=$studentData['email']?></td>
              <td><?=$studentData['enroll']?></td>
              <td><?=$studentData['address']?></td>
              <td>
                <button class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#dataModal" data-id="<?=$studentData['id']?>" data-name="<?=$studentData['name']?>" data-mobile="<?=$studentData['mobile']?>" data-email="<?=$studentData['email']?>" data-enroll="<?=$studentData['enroll']?>" data-address="<?=$studentData['address']?>"><span class="fa fa-edit"></span></button>
                <button onclick="deleteData(this)" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?=$studentData['id']?>"><span class="fa fa-trash"></span></button>
              </td>
            </tr>
            <?php $dynamicId=$dynamicId+1;}?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
  <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    //datatable initialization code
    $(document).ready( function () {
      var dataSrc = [];

      $('#table_id').DataTable({
        'initComplete': function(){
         var api = this.api();

         // Populate a dataset for autocomplete functionality
         // using data from first, second and third columns
         api.cells('tr', [0, 1, 2]).every(function(){
            // Get cell data as plain text
            var data = $('<td>').html(this.data()).text();           
            if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
         });
         
         // Sort dataset alphabetically
         dataSrc.sort();
        
         // Initialize Typeahead plug-in
         $('.dataTables_filter input[type="search"]', api.table().container())
            .typeahead({
               source: dataSrc,
               afterSelect: function(value){
                  api.search(value).draw();
               }
            }
         );
      },
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'excel',
            'pdf',
            'print'
        ]
      });
    });
    //datatable initialization code
    //modal input set code
    $("#deleteModal").on("show.bs.modal", function(event){
      var button = $(event.relatedTarget);
      var recipient = button.data('id');
      var modal = $(this);
      modal.find('.modal-body input').val(recipient);
    });
    $("#dataModal").on("show.bs.modal", function(event){
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var name = button.data('name');
      var mobile = button.data('mobile');
      var email = button.data('email');
      var enroll = button.data('enroll');
      var address = button.data('address');
      var modal = $(this);
      modal.find('#editId').val(id);
      modal.find('#studentName').val(name);
      modal.find('#studentMobile').val(mobile);
      modal.find('#studentEmail').val(email);
      modal.find('#studentEnroll').val(enroll);
      modal.find('#studentAddress').val(address);
    });
    //modal input set code
    $("#confirmDelete").click(function(){
      $.ajax({
        url:"ajax.php",
        type:"post",
        data:{type:"delete",id:$("#deleteId").val()},
        success:function(resp){
          if(resp==1){
            $("#deleteModal").hide();
            Toast.fire({
                icon: 'success',
                title: 'Record Deleted'
            }).then(function(e){location.replace("");});
          }
          else{
            $("#deleteModal").hide();
            Toast.fire({
                icon: 'error',
                title: 'Something went wrong try again later!'
            }).then(function(e){location.replace("");});
          }
        },
        error:function(stat,mess){
          alert(stat.errorMessage);
        }
      });
    });
    $("#confirmData").click(function(e){
      var flag=0;
      if($("#studentName").val()=="") {$("#nameError").css("display","block");}
      else {$("#nameError").css("display","none");}
      if($("#studentMobile").val()=="") {$("#mobileError").css("display","block");}
      else {$("#mobileError").css("display","none");}
      if($("#studentEmail").val()=="") {$("#emailError").css("display","block");}
      else {$("#emailError").css("display","none");}
      if($("#studentEnroll").val()=="") {$("#enrollError").css("display","block");}
      else {$("#enrollError").css("display","none");}
      if($("#studentAddress").val()=="") {$("#addressError").css("display","block");}
      else {$("#addressError").css("display","none");}
      if($("#studentName").val()=="" || $("#studentMobile").val()=="" || $("#studentEmail").val()=="" || $("#studentEnroll").val()=="" || $("#studentAddress").val()=="")
        flag=0;
      else flag=1;
      if(flag==1){
        if($("#confirmData").val()=="submit"){
          $.ajax({
            url:"ajax.php",
            type:"post",
            data:{type:"add",name:$("#studentName").val(),mobile:$("#studentMobile").val(),email:$("#studentEmail").val(),enroll:$("#studentEnroll").val(),address:$("#studentAddress").val()},
            success:function(resp){
              if(resp==1){
                $("#dataModal").hide();
                Toast.fire({
                    icon: 'success',
                    title: 'Record Added'
                }).then(function(e){location.replace("");});
              }
              else{
                $("#dataModal").hide();
                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong try again later!'
                }).then(function(e){location.replace("");});
              }
            },
            error:function(stat,mess){
              alert(stat.errorMessage);
            }
          });
        }else{
          $.ajax({
            url:"ajax.php",
            type:"post",
            data:{type:"edit",id:$("#editId").val(),name:$("#studentName").val(),mobile:$("#studentMobile").val(),email:$("#studentEmail").val(),enroll:$("#studentEnroll").val(),address:$("#studentAddress").val()},
            success:function(resp){
              if(resp==1){
                $("#dataModal").hide();
                Toast.fire({
                    icon: 'success',
                    title: 'Record Edited'
                }).then(function(e){location.replace("");});
              }
              else{
                $("#dataModal").hide();
                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong try again later!'
                }).then(function(e){location.replace("");});
              }
            },
            error:function(stat,mess){
              alert(stat.errorMessage);
            }
          });
        }
      }
    });
    $("#editButton").click(function(e){
      $("#confirmData").val("edit");
    });
  </script>
</html>