<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* Style error messages to appear in red color */
        .has-error .help-block {
          color: red;
        }
        .form-group.has-error .form-control {
          box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.5); /* Red shadow for error */
        }

        .form-group.has-success .form-control {
          box-shadow: 0 0 0 0.2rem rgba(0, 255, 0, 0.5); /* Green shadow for success */
        }
    </style>
</head>


<body>
    <?php include('userheader.php'); ?>

    <?php 
    require_once('connection.php');

    if(isset($_POST["submit"]))
    {
        $vehicle_id=$_POST['vehicle_id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mno=$_POST['mno'];
        $address=$_POST['address'];
        $driverOption=$_POST['driverOption'];
        $did=$_POST["did"];
        $loc=$_POST["loc"];
        $pdate=$_POST["pdate"];
        $ddate=$_POST["ddate"];
        $ptime=$_POST["ptime"];
        $dtime=$_POST["dtime"];
        $duration=$_POST["duration"];
        $noadults=$_POST["noadults"];
        $nochildren=$_POST["nochildren"];
        $srequest=$_POST["srequest"];
        $amount=$_POST["price"];


        

    }

    ?>

    

<div class="container-fluid pt-5">
    <div class="container-fluid pb-2">
        <div class="container">
        <div class="formbody">
            <h2 class="mb-4">Payment</h2>
                <form action="bank.php" method="post" id="form1">
                    <div style="margin-bottom:50px; width: 400px; ">
                        <div class="form-group">
                            Name on Card
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            Card Number
                            <input type="text" class="form-control" name="number" required title="Enter 16 digit card number">
                        </div>      
                        <div class="form-group">
                            Expiration date
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="form-group">
                            CVV
                            <input type="text" class="form-control" name="cvv">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary py-2 px-4" value="Payment">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
  // session_start();
  $_SESSION['amount']=$amount;
  $_SESSION['email']=$email;

  $_SESSION['vehicle_id']=$vehicle_id;
  $_SESSION['fname']=$fname;
  $_SESSION['lname']=$lname;
  $_SESSION['mno']=$mno;
  $_SESSION['address']=$address;
  $_SESSION['driverOption']=$driverOption;
  $_SESSION['did']=$did;
  $_SESSION['loc']=$loc;
  $_SESSION['pdate']=$pdate;
  $_SESSION['ddate']=$ddate;
  $_SESSION['ptime']=$ptime;
  $_SESSION['dtime']=$dtime;
  $_SESSION['duration']=$duration;
  $_SESSION['noadults']=$noadults;
  $_SESSION['nochildren']=$nochildren;
  $_SESSION['srequest']=$srequest;
  // header('location:bank.php');
?>

<?php include('footer.php'); ?>



<script>
  
$(document).ready(function() {
  $('#form1').bootstrapValidator({
    fields: {
      name: {
        verbose: false,
        validators: {
          notEmpty: {
            message: 'The Name is required and can\'t be empty'
          },
          regexp: {
            regexp: /^[a-zA-Z ]+$/,
            message: 'The Name can only consist of alphabets'
          }
        }
      },
      number: {
        verbose: false,
        validators: {
          notEmpty: {
            message: 'The Card Number is required and can\'t be empty'
          },
          stringLength: {
            min: 16,
            max: 16,
            message: 'The Card Number must 16 characters long'
          },
          regexp: {
            regexp: /^[0-9 ]+$/,
            message: 'Enter a valid Card Number'
          }
        }
      },
      date: {
        verbose: false,
        validators: {
          notEmpty: {
            message: 'The Expire Date is required and can\'t be empty'
          }
        }
      },
      cvv: {
        verbose: false,
        validators: {
          notEmpty: {
            message: 'The cvv is required and can\'t be empty'
          },
          stringLength: {
            min: 3,
            max: 3,
            message: 'The cvv must 3 characters long'
          },
          regexp: {
            regexp: /^[0-9 ]+$/,
            message: 'Enter a valid cvv'
          }
        }
      }
    }
  });
});


</script>


</body>

</html>