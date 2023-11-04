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
        <div class="card">
            <div class="card-body bg-white">
                <div class="detail_container w-100">
                     <!--Header of Content-->
                         <div class="row">
                            <div class="col-sm-7 text-start">
                                <h4 class="text-uppercase position-relative top-50 fw-bolder"><?php echo $child_fullname ; ?></h4>
                            </div>
                            <div class="col-sm-4 p-0 m-0" style="height:120px; background:url('./images/Childs Data.png') no-repeat; object-fit: contain;"></div>
                            <div class="col-sm-1"></div>
                        </div>                                              
                         <div class="row mt-5">
                            <div class="col-sm-12 text-end">
                                <a class="fs-1x text-decoration-none fw-bold text-uppercase" style="cursor:pointer;" id="update_modal">Edit</a>
                            </div>
                        </div>                                            
                        <div class="row">
                            <div class="col-sm-12 px-2 p-2 bg-violet">
                                <text class="fs-5 fw-bold text-uppercase">Personal Information</text>
                            </div>
                        </div>
                    <!--End Header of Content-->                                           
                    <!--Start row-->
                        <div class="row mt-2">
                            <div class="col-sm-2"><text class="fs-7 fw-bold">Age</text></div>
                            <div class="col-sm-10 text-end"><text class="fs-7 fw-bold"><?php echo $age ; ?></text></div>  
                        </div>
                    <!--End row-->
                    <!--Start row-->
                        <div class="row">
                            <div class="col-sm-2"><text class="fs-7 fw-bold">Gender</text></div>
                            <div class="col-sm-10 text-end"><text class="fs-7 fw-bold">wala sa db</text></div>  
                        </div>
                    <!--End row-->
                    <!--Start row-->
                        <div class="row">
                            <div class="col-sm-2"><text class="fs-7 fw-bold">Birthdate</text></div>
                            <div class="col-sm-10 text-end"><text class="fs-7 fw-bold"><?php echo $birthdate ; ?></text></div>  
                        </div>
                    <!--End row-->
                    <!--Start row-->
                        <div class="row">
                            <div class="col-sm-2"><text class="fs-7 fw-bold">Birthplace</text></div>
                            <div class="col-sm-10 text-end"><text class="fs-7 fw-bold">wala sa table</text></div>  
                        </div>
                    <!--End row-->
                    <!--Start row-->
                        <div class="row">
                            <div class="col-sm-2"><text class="fs-7 fw-bold">Address</text></div>
                            <div class="col-sm-10 text-end"><text class="fs-7 fw-bold">wala sa table</text></div>  
                        </div>
                    <!--End row--> 
                    <!--Start row-->
                        <div class="row">
                            <div class="col-sm-4"><text class="fs-7 fw-bold">Mother's Name</text></div>
                            <div class="col-sm-8 text-end"><text class="fs-7 fw-bold"><?php echo $mothername ;?></text></div>  
                        </div>
                    <!--End row-->
                    <!--Start row-->
                        <div class="row">
                            <div class="col-sm-4"><text class="fs-7 fw-bold">Father's Name</text></div>
                            <div class="col-sm-8 text-end"><text class="fs-7 fw-bold"><?php echo $fathername ;?></text></div>  
                        </div>
                    <!--End row--> 
                    <!--Start row Note contact ng nasa usertable yung nandito-->
                        <div class="row">
                            <div class="col-sm-4"><text class="fs-7 fw-bold">Contact Number</text></div>
                            <div class="col-sm-8 text-end"><text class="fs-7 fw-bold"><?php echo $contact; ?></text></div>  
                        </div>
                    <!--End row-->
                    <!--Start row Note contact ng nasa usertable yung nandito-->
                        <div class="row">
                            <div class="col-sm-4"><text class="fs-7 fw-bold">Emergency Contact</text></div>
                            <div class="col-sm-8 text-end"><text class="fs-7 fw-bold"><?php echo $contact; ?></text></div>  
                        </div>
                    <!--End row-->
                    <!--Start row-->
                        <div class="row">
                            <div class="col-sm-2"><text class="fs-7 fw-bold">Email</text></div>
                            <div class="col-sm-10 text-end"><text class="fs-7 fw-bold"><?php echo $user_email; ?></text></div>  
                        </div>
                    <!--End row-->     


                    <!--Start row Close-->
                        <div class="row mt-5">
                            <div class="col-sm-12 text-end">
                                <button type="button" id="close" class="btn btn-lg ps-5 pe-5 rounded-5 border" style="background-color:violet;">Back</button>
                            </div>  
                        </div>
                    <!--End row Close-->     


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



