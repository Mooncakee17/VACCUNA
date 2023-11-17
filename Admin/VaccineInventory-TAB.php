<?php include('../templates/Header.php'); ?>
<link rel="stylesheet" href="./css/style6.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

<body>
<div class="container1">
        <div class="column1">
          <?php include('../templates/Admin-Dash.php'); ?> <!------------call side bar template------------>
        </div>

        <div class="column">
            <div class="dashboard">
                <img src="./images/Vaccine inventory.png">
            <div class="dashboard-text">
                    
                <h1>VACCINE INVENTORY</h1>
               
            </div>
            </div>
            <div class="table2">
            <div class="table2_section">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>VACCINE</th>
                            <th>STOCKS</th>
                            <th>ADMINISTERED VACCINE</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>BCG</td>
                            <td>200</td>
                            <td>72</td>
                            <td>Protects against Tuberculosis</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="1" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="BCG" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="72" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Tuberculosis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hep B</td>
                            <td>200</td>
                            <td>50</td>
                            <td>Protects against Hepatitis B</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>DTaP</td>
                            <td>300</td>
                            <td>60</td>
                            <td>Protects against Diphtheria, Tetanus, Pertussis</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>HiB</td>
                            <td>150</td>
                            <td>64</td>
                            <td>Protects against HiB desease</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>IPV</td>
                            <td>320</td>
                            <td>82</td>
                            <td>Protects against Poliovirus</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>PCV</td>
                            <td>370</td>
                            <td>63</td>
                            <td>Protects against Pneumonia and Meningitis</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>RV</td>
                            <td>185</td>
                            <td>87</td>
                            <td>Protects against Rotavirus</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Influenza</td>
                            <td>320</td>
                            <td>56</td>
                            <td>Protects against Influenza Virus</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>MMR</td>
                            <td>200</td>
                            <td>45</td>
                            <td>Protects against Measles, Mumps, and Rubella</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>MenACWY, MenB</td>
                            <td>430</td>
                            <td>45</td>
                            <td>Protects against Meningococcal Disease</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Vericelia</td>
                            <td>330</td>
                            <td>54</td>
                            <td>Protects against Chickenpox</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Hep A</td>
                            <td>410</td>
                            <td>50</td>
                            <td>Protects against Hep A</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>HPV</td>
                            <td>342</td>
                            <td>63</td>
                            <td>Protects against Human Papilliomavirus</td>
                            <td>
                                <button onclick="openModal('edit')"><i class="fas fa-edit"></i></button>
                                <button onclick="openModal('trash')"><i class="fas fa-trash"></i></button>

                                <div id="editModal" class="modal">
                                    <div class="editModal2-content">
                                        <form action="#" method="POST">
                                            <div class="user-details">
                                                <div class="input-box">
                                                    <span class="details">ID</span>
                                                    <input type="text" name="vaccine_id" placeholder="Vaccine ID" value="2" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Vaccine</span>
                                                    <input type="text" name="vaccine_name" placeholder="Vaccine type" value="Hep B" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Stocks</span>
                                                    <input type="text" name="vaccine_stock" placeholder="Total vaccine stocks" value="200" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Administered Vaccine</span>
                                                    <input type="text" name="vaccine_administered" placeholder="Total of administered vaccine" value="50" required>
                                                </div>
                                                <div class="input-box">
                                                    <span class="details">Description</span>
                                                    <input type="text" name="vaccine_description" placeholder="Description of vaccine" value="Protects against Hepatitis" required>
                                                </div>
                                            </div>
                                            <button onclick="closeModal('edit')">Close</button>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                  </div>

                                <div id="trashModal" class="modal">
                                    <div class="trashModal-content">
                                      <h2>This action cannot be undone. Are you sure you want to delete this record?</h2>
                                      
                                      <button onclick="deleteRecord('trash')">Delete</button>
                                      <button onclick="closeModal('trash')">Close</button>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

    <script src="./js/index.js"></script>
    <script src="./js/Vaccine Inventory.js"></script>

</body>
</html>
<!--merge -->