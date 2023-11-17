
<?php 
include('../templates/Header.php'); 
if(isset($_GET['cid'])){
  $cid = mysqli_real_escape_string($conn, $_GET['cid']);
  $record =  "SELECT * FROM `childtable` WHERE cid = $cid";
  $record_run = mysqli_query($conn, $record);
  $row = mysqli_fetch_all($record_run);
   
  print_r($row);
}

   
 
?>
<link rel="stylesheet" href="./css/style5.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

<body>
<div class="container1">
        <div class="column1">
          <?php include('../templates/Admin-Dash.php'); ?> <!------------call side bar template------------>
        </div>

        <div class="column">
            <div class="dashboard">
                <img src="./images/Immunization Record.png">
            <div class="dashboard-text">
                    
                <h1>IMMUNIZATION RECORDS</h1>
               
            </div>
            </div>
           
           <div id="Report-Details">
              <div class="ReportDetails-content">
                    <div class="header">
                        <h2>DAN XAVIER A. COLOMA</h2>
                        <img src="./images/Baby Profile.png" alt="">
                    </div>
                    <button id="editButton" onclick="enableEdit()">Edit</button>
                    <button id="saveButton" onclick="saveChanges()" style="display: none;">Save</button>
                    <div class="title">
                        <h2>PERSONAL INFORMATION</h2>
                    </div>
                    <div class="editable-info">
                      <p><span class="label">Age</span> <span id="age" contenteditable="false">2</span></p>
                      <p><span class="label">Gender</span> <span id="gender" contenteditable="false">Male</span></p>
                      <p><span class="label">Birth Date</span> <span id="birthDate" contenteditable="false">November 24, 2022</span></p>
                      <p><span class="label">Birth Place</span> <span id="birthPlace" contenteditable="false">St Luke's Medical Center</span></p>
                      <p><span class="label">Address</span> <span id="address" contenteditable="false">Santa Mesa, Manila</span></p>
                      <p><span class="label">Mother's Name</span> <span id="mother'sName" contenteditable="false">Mary Rose A. Coloma</span></p>
                      <p><span class="label">Father's Name</span> <span id="father'sName" contenteditable="false">Mark G. Coloma</span></p>
                      <p><span class="label">Contact Number</span> <span id="contactNumber" contenteditable="false">09132567445</span></p>
                    </div>
                    <button id="editVaccineButton" onclick="enableVaccineEdit()">Edit</button>
                    <button id="saveVaccineButton" onclick="saveVaccineChanges()" style="display: none;">Save</button>
                    <div class="title">
                        <h2>VACCINE INFORMATION</h2>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>BCG Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>HepB Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>HepB Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>HepB Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr><tr>
                                      <td>HepB Dose 4</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>DTaP Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>DTaP Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>DTaP Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>DTaP Booster 1</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>DTaP Booster 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Hib Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>Hib Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Hib Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Hib Booster</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>iPV Dose1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>iPV Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>iPV Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>iPV Booster 1</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>iPV Booster 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>PCV Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>PCV Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>PCV Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>PCV Dose 4</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Rotavirus Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>Rotavirus Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Rotavirus Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>MMR Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>MMR Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Influenza Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>Influenza Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Influenza Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>Influenza Dose 4</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <div class="modal-table">
                      <div class="modal-table_section">
                          <table>
                              <thead>
                                  <tr>
                                      <th>VACCINE</th>
                                      <th>STATUS</th>
                                      <th>DATE</th>
                                      <th>ADMINISTRATOR</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>HepA Dose 1</td>
                                      <td>YES</td>
                                      <td>02/03/23</td>
                                      <td>Dr. Marijo Pedian</td>
                                  </tr>
                                  <tr>
                                      <td>HepA Dose 2</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td>HepA Dose 3</td>
                                      <td>NO</td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                    </div>
                    <button onclick="closeModal('eye')">Close</button>
              </div>
          </div>                 
</div>
</div>
</div>
           
<script>
    function enableEdit() {
        var editableFields = document.querySelectorAll('.editable-info span');
        editableFields.forEach(function (field) {
            if (field.classList.contains('label')) {
                // Exclude labels from being editable
                return;
            }
            field.setAttribute('contenteditable', 'true');
            field.classList.add('editable');
        });
        document.getElementById('editButton').style.display = 'none';
        document.getElementById('saveButton').style.display = 'inline-block';
    }

    function saveChanges() {
        var editableFields = document.querySelectorAll('.editable-info span');
        editableFields.forEach(function (field) {
            field.setAttribute('contenteditable', 'false');
            field.classList.remove('editable');
        });
        document.getElementById('editButton').style.display = 'inline-block';
        document.getElementById('saveButton').style.display = 'none';
    }
</script>

<script>
    function enableVaccineEdit() {
        var editableFields = document.querySelectorAll('.modal-table tbody td');
        editableFields.forEach(function (field) {
            field.setAttribute('contenteditable', 'true');
            field.classList.add('editable');
        });
        document.getElementById('editVaccineButton').style.display = 'none';
        document.getElementById('saveVaccineButton').style.display = 'inline-block';
    }

    function saveVaccineChanges() {
        var editableFields = document.querySelectorAll('.modal-table tbody td');
        editableFields.forEach(function (field) {
            field.setAttribute('contenteditable', 'false');
            field.classList.remove('editable');
        });
        document.getElementById('editVaccineButton').style.display = 'inline-block';
        document.getElementById('saveVaccineButton').style.display = 'none';
    }
</script>                   
  
    
   

</body>
</html>