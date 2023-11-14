<div class="container w-50 px-5" id="more_details_container" style="position:fixed; left:480px; top:0px; display:none;">
        <input type="hidden" id="cid-hidden" name="cid-hidden"/ >
        <?php 
            //get the data of children
            $select = mysqli_query($conn, "SELECT * FROM childtable a
                LEFT JOIN usertable b ON b.userid = a.userid WHERE a.cid = '$cid'") or die('query failed');
            $child_data = mysqli_fetch_all($select, MYSQLI_ASSOC);  
            foreach($child_data as $info){
                $cid = $info['cid'];
                $age = $info['child_age'];
                $guardian_id = $info['userid'];
                $birthdate = $info['birthdate'];
                $contact = $info['phonenumber'];
                $fathername = $info['fathername'];
                $mothername = $info['mothername'];
                $user_email = $info['user_email'];
                $child_fullname = $info['child_firstname']." ".$info['child_lastname'];
                $child_fname = $info['child_firstname'];
                $child_lname = $info['child_lastname'];
                $child_mname = $info['child_middlename'];
            }

        ?>

        <?php 
            //get child vaccine record
            $select1 = mysqli_query($conn, "SELECT      
            CASE
            WHEN a.status = 2 THEN 'YES'
            WHEN a.status = 0 THEN 'NO'
            WHEN a.status = 1 THEN 'NO'
            END AS vaccine_status,
            a.vac_name
            FROM child_vaccine_status a WHERE a.cid = '$cid'") or die('query failed');
            $vaccine_record = mysqli_fetch_all($select1, MYSQLI_ASSOC);  
        ?>

        <div class="card" >
            <div class="card-body bg-white" >
                <div class="detail_container w-100">
                   <div class="content" style="overflow-x: scroll; height:500px;">
                    <div class="header">
                        <h2><?php echo $child_fullname; ?></h2>
                    </div>
                    <div class="title">
                        <h2>PERSONAL INFORMATION</h2>
                    </div>
                    <p><span class="label">Age</span> <?php echo $age; ?></p>
                    <p><span class="label">Birth Date</span> <?php echo $birthdate; ?></p>
                    <p><span class="label">Mother's Name</span> <?php echo $mothername; ?></p>
                    <p><span class="label">Father's Name</span> <?php echo $fathername; ?></p>
                    <p><span class="label">Contact Number</span> <?php echo $contact; ?></p>
                    <div class="title">
                        <h2>VACCINE INFORMATION</h2>
                    </div>
                    <?php 
                    foreach($vaccine_record as $info){
                        $vac_name = $info['vac_name'];
                        $vaccine_status = $info['vaccine_status'];
                    ?>
                        <p><span class="label"><?php echo $vac_name; ?></span> <?php echo $vaccine_status; ?></p>
                    <?php } ?>
                    <button class="button close-button" id="close">Close</button>
                </div>  
                </div>
            </div>
        </div>
    </div> 






<!--Set Appointment-->
<div class="modal fade" id="update_details" >
    <div class="modal-dialog" role="docoment">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row p-5 text-center header">
                            <h4 class="fs-violet">Information Details <?php echo $value['cid']; ?></h4>
                    </div>
            <form action="../Parent_appointment/update_child_information.php" method="post">
                    <input type="hidden" id="url_type" name="url_type" / >
                    <input type="hidden" value="<?php echo $guardian_id; ?>" id="userid" / >
                    <input type="hidden" value="<?php echo $cid; ?>" id="cid" name="cid" / >
                     <div class="row">
                        <div class="col-lg-4">
                            Firstname
                            <input type="text" id="child_fname" name="child_fname" class="form-control" value="<?php echo $child_fname; ?>" >
                        </div>
                        <div class="col-lg-4">
                            Lastname
                            <input type="text" id="child_lname" name="child_lname" class="form-control" value="<?php echo $child_lname; ?>" >
                        </div>
                          <div class="col-lg-4">
                            Middlename
                            <input type="text" id="child_mname" name="child_mname" class="form-control" value="<?php echo $child_mname; ?>" >
                        </div>                      
                    </div> 

                     <div class="row mt-3">
                        <div class="col-lg-4">
                            Age
                            <input type="text" id="child_age" name="child_age" class="form-control" value="<?php echo $age; ?>" >
                        </div>
                        <div class="col-lg-4">
                            Email
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" > 
                        </div>
                         <div class="col-lg-4">
                            Phone Number
                            <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $contact; ?>" > 
                        </div>                       
                    </div> 


                     <div class="row mt-3">
                        <div class="col-lg-6">
                            Mother's Name
                            <input type="text" id="mother_name" name="mother_name" class="form-control" value="<?php echo $mothername;?>" placeholder="Mother's Name">
                        </div>
                        <div class="col-lg-6">
                            Father's Name
                            <input type="text" id="father_name" name="father_name" class="form-control" value="<?php echo $fathername;?>" placeholder="Father's Name">
                        </div>
                    </div> 


                     <div class="row mt-3">
                        <div class="col-lg-12">
                            birthdate
                             <input type="date" id="update_bday" value="<?php echo $birthdate;?>" name="bday" class="form-control" >
                        </div>
                    </div>




                    <div class="row mt-5">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-auto text-end">
                         <button type="submit" id="submit_update" class="btn btn-md rounded-5 border text-white" style="background-color:violet;">Update Details</button>
                        </div>  

                        <div class="col-sm-auto text-end">
                            <button type="button" id="cancel_update" class="btn btn-md ps-5 pe-5 rounded-5 border text-white" style="background-color:violet;">Cancel</button>
                        </div>  


                    </div>


                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!--End Appointment-->

<!-- Include Bootstrap JavaScript and Popper.js from a CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    // JavaScript to open the modal
    document.getElementById('update_modal').addEventListener('click', function() {
        // Get the current URL
        var currentURL = window.location.href;
        // Split the URL by "/"
        var parts = currentURL.split("/");
        // Get the last part of the URL
        var lastPart = parts[parts.length - 2];      
        $("#url_type").val(lastPart);
        $('#update_details').modal('show');
    });  


    document.getElementById('cancel_update').addEventListener('click', function() {
        $('#update_details').modal('hide');
    });  

</script>



