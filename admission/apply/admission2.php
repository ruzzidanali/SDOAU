<?php
session_start();
error_reporting(1);
include('../connect.php');

$txtmatricID = $_SESSION["txtmatricID"];
$txticno = $_SESSION["txticno"];
$txtfullname = $_SESSION["txtfullname"];
$txtphone = $_SESSION["txtphone"];

//update scratch card status
$sqli = "UPDATE scratchcard SET status='1' WHERE serial='" . $_SESSION['serial'] . "'";
if (mysqli_query($conn, $sqli)) {
}

$current_date = date('Y-m-d');

if (isset($_POST["btnsubmit"])) {

  //Get application ID
  function applicationID()
  {
    $string = (uniqid(rand(), true));
    return substr($string, 0, 5);
  }

  $applicationID = "ADM/" . date("Y") . "/" . applicationID();

  $txtmatricID = mysqli_real_escape_string($conn, $_POST['txtmatricID']);
  $fullname = mysqli_real_escape_string($conn, $_POST['txtmatricID']);
  $sex = mysqli_real_escape_string($conn, $_POST['cmdsex']);
  $phone = mysqli_real_escape_string($conn, $_POST['txtphone']);
  $email = mysqli_real_escape_string($conn, $_POST['txtemail']);
  $lga = mysqli_real_escape_string($conn, $_POST['txtlga']);
  $state = mysqli_real_escape_string($conn, $_POST['txtstate']);
  $jambno = mysqli_real_escape_string($conn, $_POST['txtjambno']);
  $jambscore = mysqli_real_escape_string($conn, $_POST['txtjambscore']);
  $faculty = mysqli_real_escape_string($conn, $_POST['txtfaculty']);
  $dept = mysqli_real_escape_string($conn, $_POST['txtdept']);
  $exam = mysqli_real_escape_string($conn, $_POST['txtexam']);

  $photo = 'upload/default.jpg';
  $credential = 'upload/Result-Report-card-software.png';

  $status = '0';

  //check if jamb number already exists
  $sql_u = "SELECT * FROM admission WHERE jamb_number='$jambno'";
  $res_u = mysqli_query($conn, $sql_u);
  if (mysqli_num_rows($res_u) > 0) {
    $msg_error = "Jamb number already exists";
  } else {
    //check if email already exists
    $sql_u = "SELECT * FROM admission WHERE email='$email'";
    $res_u = mysqli_query($conn, $sql_u);
    if (mysqli_num_rows($res_u) > 0) {
      $msg_error = "Email already exists";
    } else {
      $sql = "INSERT INTO admission (fullname,sex,phone,email,lga,state,jamb_number,jamb_score,faculty,dept,ssce_details,ssce,status,photo,date_admission,applicationID) VALUES ('$fullname','$sex','$phone','$email','$lga','$state','$jambno','$jambscore','$faculty','$dept','$exam','$credential','$status','$photo','$current_date','$applicationID')";

      if ($conn->query($sql) === TRUE) {
        $_SESSION['email'] = $email;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['ApplicationID'] = $applicationID;

        header("Location: upload.php");
      } else {
?>
        <script>
          alert('Problem Occurred, Try Again');
        </script>
<?php
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Borang Permohonan | SDOAU</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="well">
          <form id="applicationForm" class="form-horizontal contact-form" action="" method="post" name="f">
            <fieldset>
              <!-- Step 1: Personal Information -->
              <div class="form-step">
                <h4>Step 1: Personal Information</h4>
                <div class="form-group">
                  <label class="col-lg-12 control-label" for="pass1">Matric ID:</label>
                  <div class="col-lg-12">
                    <input type="text" id="pass1" class="form-control" name="txtmatricID" value="<?php echo $txtmatricID; ?>" required="" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-12 control-label" for="pass1">IC No:</label>
                  <div class="col-lg-12">
                    <input type="text" id="pass1" class="form-control" name="txticno" value="<?php echo $txticno; ?>" required="" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-12 control-label" for="pass1">Fullname:</label>
                  <div class="col-lg-12">
                    <input type="text" id="pass1" class="form-control" name="txtfullname" value="<?php echo $txtfullname; ?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-12 control-label" for="pass1">Gender:</label>
                  <div class="col-lg-12">
                    <select name="cmdsex" id="gender" class="form-control" required="">
                      <option value="">--Select Gender--</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-12 control-label" for="pass1">Phone:</label>
                  <div class="col-lg-12">
                    <input type="text" id="pass1" class="form-control" name="txtphone" value="<?php echo $txtphone; ?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-12 control-label" for="uemail">Email:</label>
                  <div class="col-lg-12">
                    <input type="email" name="txtemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php if (isset($_POST['txtemail'])) ?><?php echo $_POST['txtemail']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-12 control-label" for="pass1">Address:</label>
                  <div class="col-lg-12">
                    <input type="text" id="pass1" class="form-control" name="txtaddress" value="" required="">
                  </div>

                  <label class="col-lg-12 control-label" for="pass1">City:</label>
                  <div class="col-lg-12">
                    <input type="text" id="pass1" class="form-control" name="txtcity" value="" required="">
                  </div>

                  <label class="col-lg-12 control-label" for="pass1">State:</label>
                  <div class="col-lg-12">
                    <select id="state" name="state" required>
                      <option value="">Select a state</option>
                      <option value="Johor">Johor</option>
                      <option value="Kedah">Kedah</option>
                      <option value="Kelantan">Kelantan</option>
                      <option value="Malacca">Malacca</option>
                      <option value="Negeri Sembilan">Negeri Sembilan</option>
                      <option value="Pahang">Pahang</option>
                      <option value="Penang">Penang</option>
                      <option value="Perak">Perak</option>
                      <option value="Perlis">Perlis</option>
                      <option value="Sabah">Sabah</option>
                      <option value="Sarawak">Sarawak</option>
                      <option value="Selangor">Selangor</option>
                      <option value="Terengganu">Terengganu</option>
                      <option value="Federal Territory of Kuala Lumpur">Federal Territory of Kuala Lumpur</option>
                      <option value="Federal Territory of Labuan">Federal Territory of Labuan</option>
                      <option value="Federal Territory of Putrajaya">Federal Territory of Putrajaya</option>
                    </select>
                  </div>

                  <label class="col-lg-12 control-label" for="pass1">Poscode:</label>
                  <div class="col-lg-12">
                    <input type="text" id="pass1" class="form-control" name="txtposkod" value="" required="">
                  </div>
                </div>


              </div>

              <!-- Step 2: Parents Information -->
              <div class="form-step">
                <h4>Step 2: Parents Information</h4>
                <div class="form-group">
                  <!-- Parents Information fields -->
                </div>
              </div>

              <!-- Step 3: Academic Information -->
              <div class="form-step">
                <h4>Step 3: Academic Information</h4>
                <div class="form-group">
                  <!-- Academic Information fields -->
                </div>
              </div>

              <!-- Step 4: Programme Section -->
              <div class="form-step">
                <h4>Step 4: Programme Section</h4>
                <div class="form-group">
                  <!-- Programme Section fields -->
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <!-- Previous and Next buttons -->
                  <button class="btn btn-default" type="button" id="prevBtn">Previous</button>
                  <button class="btn btn-primary" type="button" id="nextBtn">Next</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <!-- Submit button -->
                  <button class="btn btn-primary" type="submit" name="btnsubmit" id="submitBtn">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var currentStep = 0;
      var formSteps = $('.form-step');

      // Hide all form steps except the first one
      formSteps.slice(1).hide();

      $('#prevBtn').click(function() {
        // Show previous form step
        formSteps.eq(currentStep).hide();
        formSteps.eq(currentStep - 1).show();
        currentStep--;
      });

      $('#nextBtn').click(function() {
        // Validate current form step before proceeding to the next step
        if (validateStep(currentStep)) {
          formSteps.eq(currentStep).hide();
          formSteps.eq(currentStep + 1).show();
          currentStep++;
        }
      });

      // Validate the form inputs in the specified step
      function validateStep(step) {
        var isValid = true;

        if (step === 0) {
          // Validation for the first step
          // Example: Check if required fields are filled
          if ($('#txtmatricID').val() === '') {
            isValid = false;
            // Show error message or highlight the field
            // Example: $('#matricIDError').text('Matric ID is required');
          }
          // Add more validation logic for other fields in step 0 if needed
        } else if (step === 1) {
          // Validation for the second step
          // Example: Check if required fields are filled
          if ($('#txtphone').val() === '') {
            isValid = false;
            // Show error message or highlight the field
            // Example: $('#phoneError').text('Phone is required');
          }
          // Add more validation logic for other fields in step 1 if needed
        }

        return isValid;
      }

      // Form submission
      $('#submitBtn').click(function() {
        // Validate the final step before submitting the form
        if (validateStep(currentStep)) {
          $('#applicationForm').submit();
        }
      });
    });
  </script>

</body>

</html>