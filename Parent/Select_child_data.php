

<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
rel="stylesheet">
<link rel="stylesheet" href="./css/style4.css">
<link rel="stylesheet" href="./css/style1.css">

<?php include('../include/include.php'); ?>
<?php include('../templates/Header.php'); ?>
<?php include('../Parent_appointment/fetch_vaccination.php'); ?>
<?php include('../Parent_appointment/child_list.php'); ?>
<body>
    <div class="dash-container">
        <div  class="dash-container1">
             <!--------------------------------Start OF SIDE BAR-------------------------------->
         <?php include('../templates/Select-Child-Dash.php'); ?>
         <!--------------------------------END OF SIDE BAR-------------------------------->
        </div>
       
         <main>
            <div class="dashboard1">
            <img src="./images/Childs Data.png"> 
            <div class="dashboard-text">
                <h1>CHILD'S DATA</h1>
            </div>

            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <select class="form-select" id="select_child">
                        <option disalbed>-- Select Child --</option>
                        <?php foreach($child_list as $value){?>
                            <option value="<?php echo $value['cid']; ?>"><?php echo $value['child_firstname']." ".$value['child_lastname']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-lg-8"></div>
            </div>



            <script>
            $(document).ready(function(){
                $("#select_child").on("change",function(){
                    var cid = $(this).val();
                   
                    $.ajax({
                        url:'../Parent_appointment/selected_child.php',
                        type:'POST',
                        data:{
                            cid: cid
                        },
                        success:function(result){
                            console.log(result);
                            window.location.href= "../Parent/Select_child_data.php"
                        }   
                    });
                });
            });
            </script>




            <div class="container-fluid mt-5 border-0 main_cntainer">
                <div class="card border-0" style="margin-left: 90px;">
                    <!--Start of child info.-->
                    <div class="info-line">
                      <div class="info-block">
                        <p><span class="label">Last name: </span><?php echo $child_lname; ?></p>
                      </div>
                      <div class="info-block">
                        <p><span class="label">First name: </span><?php echo $child_fname; ?></p>
                      </div>
                      <div class="info-block">
                        <p><span class="label">Middle name: </span> <?php echo $child_mname; ?></p>
                      </div>
                    </div>
                    <div class="info-line">
                      <div class="info-block">
                        <p><span class="label">Address: </span> Santa Mesa, Manila</p>
                      </div>
                      <div class="info-block">
                        <p><span class="label">Age: </span> <?php echo $child_age; ?></p>
                      </div>
                      <div class="info-block">
                        <p><span class="label">Birth Date: </span> <?php echo $birthdate; ?></p>
                      </div>
                    </div>

                    <div class="center-container">
                            <button class="button open-button" id="more_details-<?php echo $cid; ?>">View Child's Data</button>
                    </div>
            </div>
                    <!--Table Data Start-->
                    <div class="row mt-5" style="padding-left:250px;" >
                        <div class="col-lg-8">
                            <!--Start table-->
                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form action="../Parent_appointment/generate_vaccination_card.php" method="POST"  target="_blank">
                                            <input type="hidden" name="cid_pdf" id="cid_pdf" value="<?php echo $cid; ?>"/>
                                            <button type="submit" style="margin-bottom: 15px;" class="btn btn-md btn-primary" >Generate Vaccination Card</button>
                                            </form>
                                        </div>
                                    </div>
                                     <table class="table "  >
                                        <thead class="bg-info p-3 fs-5 text-center text-white text-uppercase">
                                            <tr>
                                                <th scope="col" class="w-25"><text>Vaccine Name</text></th>
                                                <th scope="col" class="w-25"><text>Dose no.</text></th>
                                                <th scope="col" class="w-25"><text>Status</text></th>
                                                <th scope="col" class="w-25"><text>Action</text></th>
                                            </tr>
                                        </thead>
                                        <tbody class="p-3 fs-5 text-white text-center">
                                        <?php
                                            /* ----------------------------------- */
                                            foreach($vaccine_list as $value){
                                        ?>

                                            <tr>
                                                <td scope="col" class="w-25">
                                                    <text class="text-dark"><?php echo $value['vac_name'];?></text>
                                                </td>
                                                <td scope="col" class="w-25">
                                                     <text class="text-dark"><?php echo $value['dosage_status'];?></text>
                                                </td>
                                                <td scope="col" class="w-25">
                                                    <?php if($value['status'] == 0){?>
                                                    <text></text>
                                                    <?php } ?>

                                                    <?php if($value['status'] == 1 || $value['status'] == 2 ){?>
                                                    <i class='fa fa-check fs-3 text-success'></i>
                                                    <?php } ?>   

                                                </td>
                                                <td scope="col" class="w-25">
                                                    <?php if($value['status'] == 1){?>
                                                        <text>Waiting for approval</text>
                                                    <?php } else if ($value['recommended_age'] == 'No' || $value['recommended_age'] == ''){ ?> 
                                                        <text>Not Available</text>   <!--dito niyo iedit if gusto niyo iba yung remarks pag hindi pa recommended yung vaccine. -->      
                                                    <?php }else {?>
                                                    <button type="button" <?php echo $value['status_display'] ; ?>  id="open_appointment_form-<?php echo $value['vac_name']; ?>" class="btn btn-md text-white btn-info p-2">Set Appointment</button>
                                                    <?php }?>
                                                </td>
                                            </tr>


                                            <!--Set Appointment-->
                                            <div class="modal fade" id="set_appointment" >
                                                <div class="modal-dialog" role="docoment">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row1">
                                                                        <h4 class="fs-violet">APPOINTMENT FORM</h4>
                                                                </div>
                                                                <input type="hidden" value="<?php echo $userid; ?>" id="userid" / >
                                                                <input type="hidden" value="<?php echo $value['cid']; ?>" id="cid" / >
                                                                 <div class="row mt-2">
                                                                    <div class="col-lg-6">
                                                                        Name
                                                                        <input type="text" id="child_name" class="form-control" value="<?php echo $child_fullname; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        Contact Number
                                                                        <input type="text" id="contact" class="form-control" value="<?php echo $contact; ?>" readonly>
                                                                    </div>
                                                                </div> 

                                                                 <div class="row mt-3">
                                                                    <div class="col-lg-6">
                                                                        Age
                                                                        <input type="text" id="child_age" class="form-control" value="<?php echo $child_age; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" id="email" class="form-control" value="<?php echo $email; ?>" readonly> 
                                                                    </div>
                                                                </div> 


                                                                 <div class="row mt-3">
                                                                    <div class="col-lg-6">
                                                                        Guardian Name
                                                                        <input type="text" id="mother_name" class="form-control" value="<?php echo $mothername;?>" placeholder="Mother's Name">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        Appointment Date
                                                                        <input type="date" id="appointment_date" class="form-control" >
                                                                    </div>
                                                                </div> 


                                                                 <div class="row mt-3">
                                                                    <div class="col-lg-6">
                                                                        Appointment Time
                                                                        <input type="time" id="appointment_time" class="form-control" >
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        Vaccine Name
                                                                         <input type="text" id="vaccine_administer" class="form-control" readonly>
                                                                    </div>
                                                                </div>


                                                                 <div class="row mt-3">
                                                                    <div class="col-lg-12">
                                                                        <input type="hidden" id="dose" class="form-control">
                                                                         <input type="text" id="dose_display" class="form-control" readonly>
                                                                    </div>
                                                                </div>




                                                                <div class="row mt-5">
                                                                    <div class="col-sm-3"></div>
                                                                    <div class="col-sm-auto text-end">
                                                                     <button type="button" id="submit_appointment" class="btn btn-md rounded-5 border">Submit Appointment</button>
                                                                    </div>  

                                                                    <div class="col-sm-auto text-end">
                                                                        <button type="button" id="cancel_appointment" class="btn btn-md rounded-5 border">Cancel</button>
                                                                    </div>  


                                                                </div>






                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Appointment-->

                                            <!-- Include Bootstrap JavaScript and Popper.js from a CDN -->
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                            <script type="text/javascript">

                                                 // JavaScript to open the modal
                                                document.getElementById('open_appointment_form-<?php echo $value['vac_name']; ?>').addEventListener('click', function() {
                                                    
                                                    var vac_name = this.id; 
                                                    var vac_name = vac_name.split('-')[1];
                                                    //console.log(vac_name);

                                                    
                                                    const dose1 = ['BCG', 'HepB1', 'DTaP1', 'HiB1', 'IPV1', 'PCV1', 'Rotavirus1','MMR','Influenza','HepA1'];

                                                    const dose2 = ['HepB2', 'DTaP2', 'HiB2', 'IPV2', 'PCV2', 'Rotavirus2','HepA2']; 
                                                    const dose3 = ['HepB3', 'DTaP3', 'IPV3'];
                                                    if (dose1.includes(vac_name)) {
                                                       $("#vaccine_administer").val(vac_name);
                                                       $("#dose_display").val("1st Dose");
                                                       $("#dose").val(1);
                                                    } 
                                                    else if (dose2.includes(vac_name)) {
                                                       $("#vaccine_administer").val(vac_name);
                                                       $("#dose_display").val("2nd Dose");
                                                       $("#dose").val(2);
                                                    }
                                                    else if (dose3.includes(vac_name)) {
                                                       $("#vaccine_administer").val(vac_name);
                                                       $("#dose_display").val("3rd Dose");
                                                       $("#dose").val(3);
                                                    } else {
                                                      console.log(`${vac_name} does not exist in the array.`);
                                                    }





                                                    $('#set_appointment').modal('show');
                                                });  


                                                document.getElementById('cancel_appointment').addEventListener('click', function() {
                                                    $("#vaccine_administer").val('');
                                                    $('#set_appointment').modal('hide');
                                                });  


                                            </script>
                                        <?php } ?>   
                                        </tbody>                                
                                    </table>                                    
                             
                            <!--End table-->   
                            <!--More Details-->
                            <?php include('../include/more_child_info.php'); ?>
                            <!--More Details End-->
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <!--Table Data END-->
                </div>
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

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the element by its ID
        var more_detail_btn = document.getElementById("more_details-<?php echo $cid; ?>");
        var more_details_container = document.getElementById("more_details_container");
        var cid_hidden = document.getElementById("cid-hidden");
        var close = document.getElementById("close");
        more_detail_btn.onclick = function() {
            // Extract the value from the element's ID
            var id = more_detail_btn.id; 
            var cid = id.split('-')[1];
            //Set the hiddenid of child to textbox will use for where statement in fetching data
            cid_hidden.value = cid;
            //display block the container
            more_details_container.style.display = "block";
        };


        close.onclick = function() {
            cid_hidden.value = "";
            more_details_container.style.display = "none";
        };
    });

    $(document).ready(function(){
        $("#download_pdf").click(function(){
            var cid = <?php echo $cid; ?>;
            $.ajax({
                url:"../Parent_appointment/generate_vaccination_card.php",
                type:"POST",
                data:{
                    cid:cid,
                },
                success:function(result){
                    console.log(result);
                        // Create a Blob and trigger the download
                        var blob = new Blob([result]);
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "vaccination_card.pdf";
                        link.click();
                }
            });
        });
    });


    </script>
    <script src="./js/index.js"></script>
</body>
</html>