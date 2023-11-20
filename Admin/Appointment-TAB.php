<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
rel="stylesheet">
<link rel="stylesheet" href="../Parent/css/style4.css">
<link rel="stylesheet" href="./css/appointment_tab.css">
<?php include('../include/include.php'); ?>
<?php include('../templates/Header.php'); ?>
<?php include('../Admin_appointment/admin_appointment_controller.php'); ?>

<body>
    <div class="dash-container">
      
        <!------------------------------Start OF SIDE BAR-------------------------------->
        <?php include('../include/admin_sidebar.php'); ?>
            <!--------------------------------END OF SIDE BAR-------------------------------->
     
   
        <main>
            <div class="dashboard">
                <img class="appt" src="./images/Appointment.png">
            <div class="dashboard-text">
                <h1 class="text-white">APPOINTMENT</h1>
            </div>
            <div class="search">
                    <input  type="text" name="search" id="search_data" value="" placeholder="Search ">
                    <button type="button" id="search_btn" style=""><i class="fa fa-search"></i></button>
                    <button onclick="location.reload()" style="">Refresh</button>  
                    
                    
            </div>
        <div class="table">
            <div class="table_section">                            
                    <!--Table Data Start-->
                    <div class="row" style="position:relative; left:80px;">
              
                            <!--Start table-->
                                     <table class="table border-3">
                                        <thead class="p-3 fs-7 text-center text-white text-uppercase">
                                            <tr>
                                                <th scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text>id</text>
                                                </th>
                                                <th scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text>child name</text>
                                                </th>
                                                <th scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text>parent</text>
                                                </th>
                                                <th scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text>contact number</text>
                                                </th>
                                                <th scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text>date</text>
                                                </th>
                                                <th scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text>time</text>
                                                </th>                                             
                                                <th scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text>action</text>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="p-3 fs-7 text-white text-center">
                                            <?php 
                                                foreach($appointmenttable as $info){
                                                    $appt_id = $info['appt_id'];
                                                    $parent_user_id = $info['userid'];
                                                    $cid = $info['cid'];
                                                    $vacid = $info['vacid'];
                                                    $appt_time = $info['appt_time'];
                                                    $appt_date = $info['appt_date'];
                                                    $dose = $info['dose'];
                                                    $child_name = $info['child_name'];
                                                    $guardian_name = $info['guardian_name'];
                                                    $contact_number = $info['contact_number'];
                                                    $age = $info['age'];
                                                    $email = $info['email'];                                                   
                                            ?>            
                                             <tr>
                                                <td scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text><?php echo $appt_id; ?></text>
                                                </td>
                                                <td scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text><?php echo $child_name; ?></text>
                                                </td>
                                                <td scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text><?php echo $guardian_name; ?></text>
                                                </td>
                                                <td scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text><?php echo $contact_number; ?></text>
                                                </td>
                                                <td scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text><?php echo $appt_date; ?></text>
                                                </td>
                                                <td scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <text><?php echo $appt_time; ?></text>
                                                </td>
                                                <td scope="col" class="col col-auto ps-2 pe-2 text-uppercase">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <a id="send_notif-<?php echo $appt_id; ?>"  style="cursor:pointer;">
                                                                <i class="fa fa-comment"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <a id="view_details-<?php echo $appt_id; ?>" style="cursor:pointer;">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4">
                                                             <a id="update_record-<?php echo $appt_id; ?>"  style="cursor:pointer;">
                                                                <i class="fa fa-edit"></i>
                                                             </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                            <!--Set Appointment-->
                                            <div class="modal fade" id="update_appointment" >
                                                <div class="modal-dialog" role="docoment">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row p-5 text-start header">
                                                                        <h4 class="fs-violet">Update</h4>
                                                                </div>
                                                                <br> <br>
                                                                <input type="hidden" value="" id="userid" / >
                                                                <input type="hidden" value="" id="cid" / >
                                                                <input type="hidden" value="" id="appt_id" / >
                                                                <input type="hidden" value="" id="vacid" / >
                                                                <input type="hidden" value="" id="dosage" / >
                                                                 <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <input type="text" id="child_name" class="form-control" value="" readonly>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" id="contact" class="form-control" value="" readonly>
                                                                    </div>
                                                                </div> 

                                                                 <div class="row mt-3">
                                                                    <div class="col-lg-6">
                                                                        <input type="text" id="child_age" class="form-control" value="" readonly>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" id="email" class="form-control" value="" readonly> 
                                                                    </div>
                                                                </div> 


                                                                 <div class="row mt-3">
                                                                    <div class="col-lg-6">
                                                                        <input type="text" id="mother_name" class="form-control" value="" placeholder="Mother's Name">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="date" id="appointment_date" class="form-control" >
                                                                    </div>
                                                                </div> 


                                                                 <div class="row mt-3">
                                                                    <div class="col-lg-6">
                                                                        <input type="time" id="appointment_time" class="form-control" >
                                                                    </div>
                                                                    <div class="col-lg-6" id="vaccine_name">
                                                                         <input type="text" id="vaccine_administer" class="form-control" readonly>
                                                                    </div>
                                                                </div>


                                                                 <div class="row mt-3" id="vaccine_dose">
                                                                    <div class="col-lg-12">
                                                                        <select id="dose" class="form-select">
                                                                            <option value="-1" disabled>-- Select --</option>
                                                                            <option value="1" disabled>1st Dose</option>
                                                                            <option value="2" disabled>2nd Dose</option>
                                                                            <option value="3" disabled>3rd Dose</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="row mt-3">
                                                                    <div class="col-lg-12">
                                                                         <input type="text" id="doctor" class="form-control" readonly>
                                                                    </div>
                                                                </div>


                                                                <div class="row mt-3">
                                                                    <div class="col-lg-12">
                                                                         <input type="text" id="for_reason" class="form-control" readonly>
                                                                    </div>
                                                                </div>





                                                                <div class="row mt-5">
                                                                    <div class="col-sm-3"></div>
                                                                    <div class="col-sm-auto text-end">
                                                                     <button type="button" id="update_appointment" onclick="update_appointment()" class="btn btn-md rounded-5 border text-white" style="background-color: violet;">Update</button>
                                                                    </div>  

                                                                    <div class="col-sm-auto text-end">
                                                                        <button type="button" id="back_update_appointment" class="btn btn-md ps-5 pe-5 rounded-5 border text-white" style="background-color: violet;">Cancel</button>
                                                                    </div>  


                                                                    <div class="col-sm-auto text-end">
                                                                        <button type="button" id="missed_appointment" onclick="missed_appointment()" class="btn btn-md ps-5 pe-5 rounded-5 border text-white" style="background-color: violet;">Missed</button>
                                                                    </div>  

                                                                

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Appointment-->
                                            
                                            <form action="../Admin_appointment/send_notification.php" method="POST">
                                                <div class="modal fade" id="notify_applicant">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12 text-center">
                                                                        <h4>Click Yes to send a notification</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-lg-12 text-center">
                                                                        <input type="hidden" name="notify_appt" id="notify_appt" />
                                                                        <button type="submit" id="send_notification" class="btn btn-md btn-primary">Send Notification</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            //get id of the active user;
                                            $userid = $_SESSION['user_id']; 
                                            ?>
                                            <!-- Include Bootstrap JavaScript and Popper.js from a CDN -->
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                            <script type="text/javascript">

                                            // JavaScript to open the modal
                                            document.getElementById('update_record-<?php echo $appt_id; ?>').addEventListener('click', function() {
                                                var appt_id = this.id; 
                                                appt_id = appt_id.split('-')[1];
                                                $.ajax({
                                                    url: '../Admin_appointment/individual_appointment.php',
                                                    type: 'POST',
                                                    data: { appt_id: appt_id },                                                
                                                    success: function(response) {
                                                         if(response.status == 'success'){
                                                            $("#userid").val(<?php echo $userid; ?>);
                                                            $("#appt_id").val(appt_id);
                                                            $("#vacid").val(response.vacid);
                                                            $("#cid").val(response.cid);
                                                            $("#child_name").val(response.child_name);
                                                            $("#contact").val(response.contact_number);
                                                            $("#child_age").val(response.age);
                                                            $("#email").val(response.email);
                                                            $("#mother_name").val(response.guardian_name);
                                                            $("#appointment_date").val(response.appt_date);
                                                            $("#appointment_time").val(response.appt_time);
                                                            $("#vaccine_administer").val(response.vac_name);
                                                            $("#dosage").val(response.dose);
                                                            $("#dose").val(response.dose);
                                                            $("#doctor").val(response.doctor);
                                                            $("#for_reason").val(response.for_reason);
                                                            if(response.for_reason == "Consultation"){
                                                                $("#vaccine_name").css("display","none");
                                                                $("#vaccine_dose").css("display","none");
                                                            }
                                                            $('#update_appointment').modal('show');
                                                         }
                                                    }
                                                });

                                            });
 


                                                document.getElementById('back_update_appointment').addEventListener('click', function() {
                                                    $("#appt_id").val('');
                                                    $('#update_appointment').modal('hide');
                                                });  


                                            </script>

                                            <script type="text/javascript">
                                            // JavaScript to open the modal
                                            document.getElementById('send_notif-<?php echo $appt_id; ?>').addEventListener('click', function() {
                                                var appt_id = this.id; 
                                                appt_id = appt_id.split('-')[1];
                                                $("#notify_appt").val(appt_id);
                                                $('#notify_applicant').modal('show');
                                                

                                            });
                                          
                                            </script>




                                            <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                // Get the element by its ID
                                                var view_details_btn = document.getElementById("view_details-<?php echo $appt_id; ?>");
                                                var more_details_container = document.getElementById("more_details_container");
                                                var cid_hidden = document.getElementById("cid-hidden");
                                                var close = document.getElementById("close");
                                                view_details_btn.onclick = function() {
                                                    // Extract the value from the element's ID

                                                    var id = view_details_btn.id; 
                                                    var appt_id = id.split('-')[1];
                                                    //using the appt_id get the cid of the appt

                                                    $.ajax({
                                                        url:'../Admin_appointment/individual_appointment.php',
                                                        type:'POST',
                                                        data:{ appt_id: appt_id },
                                                        success:function(response){
                                                                console.log($("#cid_hidden").val());
                                                                cid_hidden.value = response.cid;
                                                                more_details_container.style.display = "block";
                                                        }
                                                    });
                                                };


                                                close.onclick = function() {
                                                    cid_hidden.value = "";
                                                    more_details_container.style.display = "none";
                                                };
                                            });
                                            </script>
                                            <?php } ?>                           
                                        </tbody>                                
                                    </table>   
                            <!--End table-->   
                    </div>
                    <!--Table Data END-->
                    <!--More Details-->
                     <?php include('../include/more_child_info.php'); ?>   
                    <!--More Details End-->
                    </div>
            </div>
        </main>
        <!--------------------------------END OF MAIN-------------------------------->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>
        </div>

    </div>


    <script src="./js/index.js"></script>
    <script src="./js/appointmentpage.js?v="<?php echo date('YmdHis'); ?>></script>

</body>
</html>
