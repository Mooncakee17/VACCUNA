

<?php include('../templates/Header.php'); ?>
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
            <div class="table3">
            <div class="table3_section">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CHILD NAME</th>
                            <th>AGE</th>
                            <th>GENDER</th>
                            <th>BIRTHDATE</th>
                            <th>PARENT/GUARDIAN</th>
                            <th>CONTACT NUMBER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Marijo Pedian</td>
                            <td>1month</td>
                            <td>Female</td>
                            <td>01/10/24</td>
                            <td>Mae Pedian</td>
                            <td>09453845638</td>
                            <td>
                                <button onclick="openModal('eye')"><i class="fas fa-eye"></i></button>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>

                                <div id="eyeModal" class="modal">
                                    <div class="eyeModal-content">
                                          <div class="header">
                                              <h2>DAN XAVIER A. COLOMA</h2>
                                          </div>
                                          <div class="title">
                                              <h2>PERSONAL INFORMATION</h2>
                                          </div>
                                          <p><span class="label">Age</span> 2</p>
                                          <p><span class="label">Gender</span> Male</p>
                                          <p><span class="label">Birth Date</span> November 24, 2022</p>
                                          <p><span class="label">Birth Place</span> St Luke's Medical Center</p>
                                          <p><span class="label">Address</span> Santa Mesa, Manila</p>
                                          <p><span class="label">Mother's Name</span> Mary Rose A. Coloma</p>
                                          <p><span class="label">Father's Name</span> Mark G. Coloma</p>
                                          <p><span class="label">Contact Number</span> 09132567445</p>
                                          <div class="title">
                                              <h2>VACCINE INFORMATION</h2>
                                          </div>
                                          <p><span class="label">POLIO DOSE 1</span> YES</p>
                                          <p><span class="label">POLIO DOSE 2</span> NO</p>
                                          <button onclick="closeModal('eye')">Close</button>
                                    </div>
                                </div>

                                <div id="editModal" class="modal">
                                    <div class="editModal3-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="record_id" placeholder="Record ID" value="1" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Child's Name</span>
                                                    <input type="text" name="child's_name" placeholder="Name of the child" value="Marijo Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Age</span>
                                                    <input type="text" name="child's_age" placeholder="Age of the child" value="1 month" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Gender</span>
                                                    <input type="text" name="child's_gender" placeholder="Gender of the child" value="Female" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Birthdate</span>
                                                    <input type="text" name="child's_birthdate" placeholder="Birthdate of the child" value="01/10/24" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Parent/Guardian</span>
                                                    <input type="text" name="child's_parent/guardian" placeholder="Parent/Guardian of the child" value="Mae Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Contact Number</span>
                                                    <input type="text" name="contact_number" placeholder="Contact number" value="09453845638" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Yves Conanan</td>
                            <td>2months</td>
                            <td>Male</td>
                            <td>03/25/24</td>
                            <td>Julie Conanan</td>
                            <td>09123435786</td>
                            <td>
                                <button onclick="openModal('eye')"><i class="fas fa-eye"></i></button>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>

                                <div id="eyeModal" class="modal">
                                    <div class="eyeModal-content">
                                          <div class="header">
                                              <h2>DAN XAVIER A. COLOMA</h2>
                                          </div>
                                          <div class="title">
                                              <h2>PERSONAL INFORMATION</h2>
                                          </div>
                                          <p><span class="label">Age</span> 2</p>
                                          <p><span class="label">Gender</span> Male</p>
                                          <p><span class="label">Birth Date</span> November 24, 2022</p>
                                          <p><span class="label">Birth Place</span> St Luke's Medical Center</p>
                                          <p><span class="label">Address</span> Santa Mesa, Manila</p>
                                          <p><span class="label">Mother's Name</span> Mary Rose A. Coloma</p>
                                          <p><span class="label">Father's Name</span> Mark G. Coloma</p>
                                          <p><span class="label">Contact Number</span> 09132567445</p>
                                          <div class="title">
                                              <h2>VACCINE INFORMATION</h2>
                                          </div>
                                          <p><span class="label">POLIO DOSE 1</span> YES</p>
                                          <p><span class="label">POLIO DOSE 2</span> NO</p>
                                          <button onclick="closeModal('eye')">Close</button>
                                    </div>
                                </div>

                                <div id="editModal" class="modal">
                                    <div class="editModal3-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="record_id" placeholder="Record ID" value="1" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Child's Name</span>
                                                    <input type="text" name="child's_name" placeholder="Name of the child" value="Marijo Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Age</span>
                                                    <input type="text" name="child's_age" placeholder="Age of the child" value="1 month" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Gender</span>
                                                    <input type="text" name="child's_gender" placeholder="Gender of the child" value="Female" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Birthdate</span>
                                                    <input type="text" name="child's_birthdate" placeholder="Birthdate of the child" value="01/10/24" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Parent/Guardian</span>
                                                    <input type="text" name="child's_parent/guardian" placeholder="Parent/Guardian of the child" value="Mae Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Contact Number</span>
                                                    <input type="text" name="contact_number" placeholder="Contact number" value="09453845638" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Xavier Coloma</td>
                            <td>1month</td>
                            <td>Male</td>
                            <td>01/23/24</td>
                            <td>John Coloma</td>
                            <td>09452834285</td>
                            <td>
                                <button onclick="openModal('eye')"><i class="fas fa-eye"></i></button>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>

                                <div id="eyeModal" class="modal">
                                    <div class="eyeModal-content">
                                          <div class="header">
                                              <h2>DAN XAVIER A. COLOMA</h2>
                                          </div>
                                          <div class="title">
                                              <h2>PERSONAL INFORMATION</h2>
                                          </div>
                                          <p><span class="label">Age</span> 2</p>
                                          <p><span class="label">Gender</span> Male</p>
                                          <p><span class="label">Birth Date</span> November 24, 2022</p>
                                          <p><span class="label">Birth Place</span> St Luke's Medical Center</p>
                                          <p><span class="label">Address</span> Santa Mesa, Manila</p>
                                          <p><span class="label">Mother's Name</span> Mary Rose A. Coloma</p>
                                          <p><span class="label">Father's Name</span> Mark G. Coloma</p>
                                          <p><span class="label">Contact Number</span> 09132567445</p>
                                          <div class="title">
                                              <h2>VACCINE INFORMATION</h2>
                                          </div>
                                          <p><span class="label">POLIO DOSE 1</span> YES</p>
                                          <p><span class="label">POLIO DOSE 2</span> NO</p>
                                          <button onclick="closeModal('eye')">Close</button>
                                    </div>
                                </div>

                                <div id="editModal" class="modal">
                                    <div class="editModal3-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="record_id" placeholder="Record ID" value="1" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Child's Name</span>
                                                    <input type="text" name="child's_name" placeholder="Name of the child" value="Marijo Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Age</span>
                                                    <input type="text" name="child's_age" placeholder="Age of the child" value="1 month" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Gender</span>
                                                    <input type="text" name="child's_gender" placeholder="Gender of the child" value="Female" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Birthdate</span>
                                                    <input type="text" name="child's_birthdate" placeholder="Birthdate of the child" value="01/10/24" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Parent/Guardian</span>
                                                    <input type="text" name="child's_parent/guardian" placeholder="Parent/Guardian of the child" value="Mae Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Contact Number</span>
                                                    <input type="text" name="contact_number" placeholder="Contact number" value="09453845638" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Harold Talagtag</td>
                            <td>2months</td>
                            <td>Male</td>
                            <td>03/14/24</td>
                            <td>Mark Talagtag</td>
                            <td>09482537223</td>
                            <td>
                                <button onclick="openModal('eye')"><i class="fas fa-eye"></i></button>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>

                                <div id="eyeModal" class="modal">
                                    <div class="eyeModal-content">
                                          <div class="header">
                                              <h2>DAN XAVIER A. COLOMA</h2>
                                          </div>
                                          <div class="title">
                                              <h2>PERSONAL INFORMATION</h2>
                                          </div>
                                          <p><span class="label">Age</span> 2</p>
                                          <p><span class="label">Gender</span> Male</p>
                                          <p><span class="label">Birth Date</span> November 24, 2022</p>
                                          <p><span class="label">Birth Place</span> St Luke's Medical Center</p>
                                          <p><span class="label">Address</span> Santa Mesa, Manila</p>
                                          <p><span class="label">Mother's Name</span> Mary Rose A. Coloma</p>
                                          <p><span class="label">Father's Name</span> Mark G. Coloma</p>
                                          <p><span class="label">Contact Number</span> 09132567445</p>
                                          <div class="title">
                                              <h2>VACCINE INFORMATION</h2>
                                          </div>
                                          <p><span class="label">POLIO DOSE 1</span> YES</p>
                                          <p><span class="label">POLIO DOSE 2</span> NO</p>
                                          <button onclick="closeModal('eye')">Close</button>
                                    </div>
                                </div>

                                <div id="editModal" class="modal">
                                    <div class="editModal3-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="record_id" placeholder="Record ID" value="1" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Child's Name</span>
                                                    <input type="text" name="child's_name" placeholder="Name of the child" value="Marijo Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Age</span>
                                                    <input type="text" name="child's_age" placeholder="Age of the child" value="1 month" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Gender</span>
                                                    <input type="text" name="child's_gender" placeholder="Gender of the child" value="Female" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Birthdate</span>
                                                    <input type="text" name="child's_birthdate" placeholder="Birthdate of the child" value="01/10/24" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Parent/Guardian</span>
                                                    <input type="text" name="child's_parent/guardian" placeholder="Parent/Guardian of the child" value="Mae Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Contact Number</span>
                                                    <input type="text" name="contact_number" placeholder="Contact number" value="09453845638" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Min Yoongi</td>
                            <td>1year</td>
                            <td>Male</td>
                            <td>10/16/23</td>
                            <td>Mina Yoongi</td>
                            <td>09784536214</td>
                            <td>
                                <button onclick="openModal('eye')"><i class="fas fa-eye"></i></button>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>

                                <div id="eyeModal" class="modal">
                                    <div class="eyeModal-content">
                                          <div class="header">
                                              <h2>DAN XAVIER A. COLOMA</h2>
                                          </div>
                                          <div class="title">
                                              <h2>PERSONAL INFORMATION</h2>
                                          </div>
                                          <p><span class="label">Age</span> 2</p>
                                          <p><span class="label">Gender</span> Male</p>
                                          <p><span class="label">Birth Date</span> November 24, 2022</p>
                                          <p><span class="label">Birth Place</span> St Luke's Medical Center</p>
                                          <p><span class="label">Address</span> Santa Mesa, Manila</p>
                                          <p><span class="label">Mother's Name</span> Mary Rose A. Coloma</p>
                                          <p><span class="label">Father's Name</span> Mark G. Coloma</p>
                                          <p><span class="label">Contact Number</span> 09132567445</p>
                                          <div class="title">
                                              <h2>VACCINE INFORMATION</h2>
                                          </div>
                                          <p><span class="label">POLIO DOSE 1</span> YES</p>
                                          <p><span class="label">POLIO DOSE 2</span> NO</p>
                                          <button onclick="closeModal('eye')">Close</button>
                                    </div>
                                </div>

                                <div id="editModal" class="modal">
                                    <div class="editModal3-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="record_id" placeholder="Record ID" value="1" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Child's Name</span>
                                                    <input type="text" name="child's_name" placeholder="Name of the child" value="Marijo Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Age</span>
                                                    <input type="text" name="child's_age" placeholder="Age of the child" value="1 month" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Gender</span>
                                                    <input type="text" name="child's_gender" placeholder="Gender of the child" value="Female" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Birthdate</span>
                                                    <input type="text" name="child's_birthdate" placeholder="Birthdate of the child" value="01/10/24" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Parent/Guardian</span>
                                                    <input type="text" name="child's_parent/guardian" placeholder="Parent/Guardian of the child" value="Mae Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Contact Number</span>
                                                    <input type="text" name="contact_number" placeholder="Contact number" value="09453845638" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Taylor Swift</td>
                            <td>2years</td>
                            <td>Female</td>
                            <td>11/05/24</td>
                            <td>Sofia Taylor</td>
                            <td>09452239485</td>
                            <td>
                                <button onclick="openModal('eye')"><i class="fas fa-eye"></i></button>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>

                                <div id="eyeModal" class="modal">
                                    <div class="eyeModal-content">
                                          <div class="header">
                                              <h2>DAN XAVIER A. COLOMA</h2>
                                          </div>
                                          <div class="title">
                                              <h2>PERSONAL INFORMATION</h2>
                                          </div>
                                          <p><span class="label">Age</span> 2</p>
                                          <p><span class="label">Gender</span> Male</p>
                                          <p><span class="label">Birth Date</span> November 24, 2022</p>
                                          <p><span class="label">Birth Place</span> St Luke's Medical Center</p>
                                          <p><span class="label">Address</span> Santa Mesa, Manila</p>
                                          <p><span class="label">Mother's Name</span> Mary Rose A. Coloma</p>
                                          <p><span class="label">Father's Name</span> Mark G. Coloma</p>
                                          <p><span class="label">Contact Number</span> 09132567445</p>
                                          <div class="title">
                                              <h2>VACCINE INFORMATION</h2>
                                          </div>
                                          <p><span class="label">POLIO DOSE 1</span> YES</p>
                                          <p><span class="label">POLIO DOSE 2</span> NO</p>
                                          <button onclick="closeModal('eye')">Close</button>
                                    </div>
                                </div>

                                <div id="editModal" class="modal">
                                    <div class="editModal3-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="record_id" placeholder="Record ID" value="1" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Child's Name</span>
                                                    <input type="text" name="child's_name" placeholder="Name of the child" value="Marijo Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Age</span>
                                                    <input type="text" name="child's_age" placeholder="Age of the child" value="1 month" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Gender</span>
                                                    <input type="text" name="child's_gender" placeholder="Gender of the child" value="Female" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Birthdate</span>
                                                    <input type="text" name="child's_birthdate" placeholder="Birthdate of the child" value="01/10/24" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Parent/Guardian</span>
                                                    <input type="text" name="child's_parent/guardian" placeholder="Parent/Guardian of the child" value="Mae Pedian" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Contact Number</span>
                                                    <input type="text" name="contact_number" placeholder="Contact number" value="09453845638" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
</div>

    <script src="./js/index.js"></script>
    <script src="./js/Immunization Record.js"></script>

</body>
</html>