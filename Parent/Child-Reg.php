

<?php include('../templates/Header.php'); // --- andito yung session code ---

//------------------Eto backend pag yung 'here' button yung pipindutin------------//

if (isset($_POST['submit'])) {

    $fname = $conn->real_escape_string($_POST['Child_fname']);
    $lname = $conn->real_escape_string($_POST['Child_lname']);
    $mdname = $conn->real_escape_string($_POST['Childmname']);
    $bday = $conn->real_escape_string($_POST['Child_bdate']);
    $mothername = $conn->real_escape_string($_POST['Child_fthrname']);
    $fathername = $conn->real_escape_string($_POST['Child_mthrname']);

    // Assuming you have already defined $user_id
    $sql = "INSERT INTO `childtable`(`userid`, `child_firstname`, `child_lastname`, `child_middlename`, `birthdate`, `mothername`, `fathername`) 
            VALUES ('$user_id', '$fname', '$lname', '$mdname', '$bday', '$mothername', '$fathername')";

    if ($conn->query($sql) === TRUE) {
        $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");
        if ($cid_query) {
            $row = $cid_query->fetch_assoc();
            $cid = $row['cid'];

            // Assuming you have already defined $user_id
            $sql = "INSERT INTO `vac_bcg_table`(`cid`) VALUES ('$cid');
                    INSERT INTO `vac_hepa_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_hepB_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_dtop_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_hib_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_ipv_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_influenza_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_measles_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_rota_table`(`cid`) VALUES ('$cid')
                    INSERT INTO `vac_polio_table`(`cid`) VALUES ('$cid')";

            if ($conn->multi_query($sql) === TRUE) {
                $message[] = 'Registered Successfully!';
            } else {
                $message[] = 'Registration failed!';
            }
        }
    } else {
        $message[] = 'Registration failed!';
    }
}


//------------------Eto backend pag yung 'Register' button yung pipindutin------------//

 elseif(isset($_POST['submit2'])){
    $fname = $_POST['Child_fname'];
    $lname = $_POST['Child_lname'];
    $fname = $_POST['Child_fname'];
    $mdname = $_POST['Childmname'];
    $bday = $_POST['Child_bdate'];
    $mothername = $_POST['Child_fthrname'];
    $fathername = $_POST['Child_mthrname'];

    $sql = "INSERT INTO `childtable`(`userid`, `child_firstname`, `child_lastname`, `child_middlename`, `birthdate`, `mothername`, `fathername`) 
    VALUES ('$user_id','$fname','$lname','$mdname','$bday','$mothername','$fathername')";
    
     $conn->query($sql) or die ($conn->error);
     if ($sql) {
        $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");

          // ----- BCG TABLE QUERY -------//
          if ($cid_query) {
            $row = $cid_query->fetch_assoc();
            $cid = $row['cid'];  
            $bcg = $_POST['BCG'];

            if ($bcg == 0) {
                $sql = "INSERT INTO `vac_bcg_table`(`cid`, `dose1`) VALUES ('$cid', '$bcg')";
                $result = $conn->query($sql);
            } else { 
                $bcg_dose1_date = $_POST['BCG-dose1-date'];

                if(!empty($bcg_dose1_date)){
                    $sql = "INSERT INTO `vac_bcg_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$bcg', '$bcg_dose1_date')";
                    
                }
                else{
                    $sql = "INSERT INTO `vac_bcg_table`(`cid`, `dose1`) VALUES ('$cid', '$bcg')";
                }
                $result = $conn->query($sql);
            }

            $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");
            if ($cid_query) {
                $row = $cid_query->fetch_assoc();
                $cid = $row['cid'];
            
                $HEPB1 = $_POST['HepB-dose1'];
                $HEPB2 = $_POST['HepB-dose2'];
                $HEPB3 = $_POST['HepB-dose3'];
                $HEPB4 = $_POST['HepB-dose4'];
              
            
                if ($HEPB1 == 0) {
                    $sql1 = "INSERT INTO `vac_hepb_table`(`cid`, `dose1`) VALUES ('$cid', '$HEPB1')";
                    $conn->query($sql1);
                } else {
                    $HEPB_dose1_date = $_POST['HepB-dose1-date'];
                    if (!empty($HEPB_dose1_date)) {
                        $sql1 = "INSERT INTO `vac_hepb_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$HEPB1', '$HEPB_dose1_date')";
                    } else {
                        $sql1  = "INSERT INTO `vac_hepb_table`(`cid`, `dose1`) VALUES ('$cid', '$HEPB1')";
                    }
                    $conn->query($sql1);
                }
               

                if ($HEPB2 == 0) {
                    $sql2 = "UPDATE `vac_hepb_table` SET `dose2` = '$HEPB2' WHERE `cid` = '$cid'";
                    $conn->query($sql2);
                } else {
                    $HEPB_dose2_date = $_POST['HepB-dose2-date'];
                    if (!empty($HEPB_dose2_date)) {
                        $sql2 = "UPDATE vac_hepb_table SET `dose2` = '$HEPB2', `dose2_date` = '$HEPB_dose2_date' WHERE cid = '$cid'";
                    } else {
                        $sql2 = "UPDATE `vac_hepb_table` SET `dose2` = '$HEPB2' WHERE `cid` = '$cid'";
                    }
                    $conn->query($sql2);
                }

                if ($HEPB3 == 0) {
                    $sql3 = "UPDATE `vac_hepb_table` SET `dose3` = '$HEPB3' WHERE `cid` = '$cid'";
                    $conn->query($sql3);
                } else {
                    $HEPB_dose3_date = $_POST['HepB-dose3-date'];
                    if (!empty($HEPB_dose3_date)) {
                        $sql3 = "UPDATE vac_hepb_table SET `dose3` = '$HEPB3', `dose3_date` = '$HEPB_dose3_date' WHERE cid = '$cid'";
                    } else {
                        $sql3 = "UPDATE `vac_hepb_table` SET `dose3` = '$HEPB3' WHERE `cid` = '$cid'";
                    }
                    $conn->query($sql3);
                }

                if ($HEPB4 == 0) {
                    $sql4 = "UPDATE `vac_hepb_table` SET `dose4` = '$HEPB4' WHERE `cid` = '$cid'";
                    $conn->query($sql4);
                } else {
                    $HEPB_dose4_date = $_POST['HepB-dose4-date'];
                    if (!empty($HEPB_dose4_date)) {
                        $sql4 = "UPDATE vac_hepb_table SET `dose4` = '$HEPB4', `dose4_date` = '$HEPB_dose4_date' WHERE cid = '$cid'";
                    } else {
                        $sql4 = "UPDATE `vac_hepb_table` SET `dose4` = '$HEPB4' WHERE `cid` = '$cid'";
                    }
                    $conn->query($sql4);
                }
                
                
        
            }

            $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");
            if ($cid_query) {
                $row = $cid_query->fetch_assoc();
                $cid = $row['cid'];
            
                $DTAP1 = $_POST['DTaP-dose1'];
                $DTAP2 = $_POST['DTaP-dose2'];
                $DTAP3 = $_POST['DTaP-dose3'];
             
                if ($DTAP1 == 0) {
                    $dtop1 = "INSERT INTO `vac_dtop_table`(`cid`, `dose1`) VALUES ('$cid', '$DTAP1')";
                    $conn->query($dtop1);
                } else {
                    $DTAP_dose1_date = $_POST['DTaP-dose1-date'];
                    if (!empty($DTAP_dose1_date)) {
                        $dtop1 = "INSERT INTO `vac_dtop_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$DTAP1', '$DTAP_dose1_date')";
                    } else {
                        $dtop1  = "INSERT INTO `vac_dtop_table`(`cid`, `dose1`) VALUES ('$cid', '$DTAP1')";
                    }
                    $conn->query($dtop1);
                }
               

                if ($DTAP2 == 0) {
                    $dtop2 = "UPDATE `vac_dtop_table` SET `dose2` = '$DTAP2' WHERE `cid` = '$cid'";
                    $conn->query($dtop2);
                } else {
                    $DTAP_dose2_date = $_POST['DTaP-dose2-date'];
                    if (!empty($DTAP_dose2_date)) {
                        $dtop2 = "UPDATE `vac_dtop_table` SET `dose2` = '$DTAP2', `dose2_date` = '$DTAP_dose2_date' WHERE cid = '$cid'";
                    } else {
                        $dtop2 = "UPDATE `vac_dtop_table` SET `dose2` = '$DTAP2' WHERE `cid` = '$cid'";
                    }
                    $conn->query($dtop2);
                }

                if ($DTAP3 == 0) {
                    $dtop3 = "UPDATE `vac_dtop_table` SET `dose3` = '$DTAP3' WHERE `cid` = '$cid'";
                    $conn->query($dtop3);
                } else {

                    $DTAP_dose3_date = $_POST['DTaP-dose3-date'];

                    if (!empty($DTAP_dose3_date)) {
                        $dtop3 = "UPDATE vac_dtop_table SET `dose3` = '$DTAP3', `dose3_date` = '$DTAP_dose3_date' WHERE cid = '$cid'";
                    } else {
                        $dtop3 = "UPDATE `vac_dtop_table` SET `dose3` = '$DTAP3' WHERE `cid` = '$cid'";
                    }
                    $conn->query($dtop3);
                }
            }
            
            $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");
            if ($cid_query) {
                $row = $cid_query->fetch_assoc();
                $cid = $row['cid'];
            
                $HIB1 = $_POST['Hib-dose1'];
                $HIB2 = $_POST['Hib-dose2'];
                $HIB3 = $_POST['Hib-dose3'];
             
                if ($HIB1 == 0) {
                    $hb1 = "INSERT INTO `vac_hib_table`(`cid`, `dose1`) VALUES ('$cid', '$HIB1')";
                    $conn->query($hb1);
                } else {
                    $HIB_dose1_date = $_POST['Hib-dose1-date'];
                    if (!empty($HIB_dose1_date)) {
                        $hb1 = "INSERT INTO `vac_hib_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$HIB1', '$HIB_dose1_date')";
                    } else {
                        $hb1  = "INSERT INTO `vac_hib_table`(`cid`, `dose1`) VALUES ('$cid', '$HIB1')";
                    }
                    $conn->query($hb1);
                }
               

                if ($HIB2 == 0) {
                    $hb2 = "UPDATE `vac_hib_table` SET `dose2` = '$HIB2' WHERE `cid` = '$cid'";
                    $conn->query($hb2);
                } else {
                    $HIB_dose2_date = $_POST['Hib-dose2-date'];
                    if (!empty($HIB_dose2_date)) {
                        $hb2 = "UPDATE `vac_hib_table` SET `dose2` = '$HIB2', `dose2_date` = '$HIB_dose2_date' WHERE cid = '$cid'";
                    } else {
                        $hb2 = "UPDATE `vac_hib_table` SET `dose2` = '$HIB2' WHERE `cid` = '$cid'";
                    }
                    $conn->query($hb2);
                }

                if ($HIB3 == 0) {
                    $hb3 = "UPDATE `vac_hib_table` SET `dose3` = '$HIB3' WHERE `cid` = '$cid'";
                    $conn->query($hb3);
                } else {

                    $HIB_dose3_date = $_POST['Hib-dose3-date'];

                    if (!empty($HIB_dose3_date)) {
                        $hb3 = "UPDATE vac_hib_table SET `dose3` = '$HIB3', `dose3_date` = '$HIB_dose3_date' WHERE cid = '$cid'";
                    } else {
                        $hb3 = "UPDATE `vac_hib_table` SET `dose3` = '$HIB3' WHERE `cid` = '$cid'";
                    }
                    $conn->query($hb3);
                }
            }

            $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");
            if ($cid_query) {
                $row = $cid_query->fetch_assoc();
                $cid = $row['cid'];
            
                $IPV1 = $_POST['iPV-dose1'];
                $IPV2 = $_POST['iPV-dose2'];
                $IPV3 = $_POST['iPV-dose3'];
             
                if ($IPV1 == 0) {
                    $ip1 = "INSERT INTO `vac_polio_table`(`cid`, `dose1`) VALUES ('$cid', '$IPV1')";
                    $conn->query($ip1);
                } else {
                    $IPV_dose1_date = $_POST['iPV-dose1-date'];
                    if (!empty($IPV_dose1_date)) {
                        $ip1 = "INSERT INTO `vac_polio_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$IPV1', '$IPV_dose1_date')";
                    } else {
                        $ip1  = "INSERT INTO `vac_polio_table`(`cid`, `dose1`) VALUES ('$cid', '$IPV1')";
                    }
                    $conn->query($ip1);
                }
               

                if ($IPV2 == 0) {
                    $ip2 = "UPDATE `vac_ipv_table` SET `dose2` = '$IPV2' WHERE `cid` = '$cid'";
                    $conn->query($ip2);
                } else {
                    $IPV_dose2_date = $_POST['iPV-dose2-date'];
                    if (!empty($IPV_dose2_date)) {
                        $ip2 = "UPDATE `vac_polio_table` SET `dose2` = '$IPV2', `dose2_date` = '$IPV_dose2_date' WHERE cid = '$cid'";
                    } else {
                        $ip2 = "UPDATE `vac_polio_table` SET `dose2` = '$IPV2' WHERE `cid` = '$cid'";
                    }
                    $conn->query($ip2);
                }

                if ($IPV3 == 0) {
                    $ip3 = "UPDATE `vac_ipv_table` SET `dose3` = '$IPV3' WHERE `cid` = '$cid'";
                    $conn->query($ip3);
                } else {

                    $IPV_dose3_date = $_POST['iPV-dose3-date'];

                    if (!empty($IPV_dose3_date)) {
                        $ip3 = "UPDATE vac_polio_table SET `dose3` = '$IPV3', `dose3_date` = '$IPV_dose3_date' WHERE cid = '$cid'";
                    } else {
                        $ip3 = "UPDATE `vac_polio_table` SET `dose3` = '$IPV3' WHERE `cid` = '$cid'";
                    }
                    $conn->query($ip3);
                }
            }

            $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");
            if ($cid_query) {
                $row = $cid_query->fetch_assoc();
                $cid = $row['cid'];
            
                $PCV1 = $_POST['PCV-dose1'];
                $PCV2 = $_POST['PCV-dose2'];
                $PCV3 = $_POST['PCV-dose3'];
             
                if ($PCV1 == 0) {
                    $pv1 = "INSERT INTO `vac_pcv_table`(`cid`, `dose1`) VALUES ('$cid', '$PCV1')";
                    $conn->query($pv1);
                } else {
                    $PCV_dose1_date = $_POST['PCV-dose1-date'];
                    if (!empty($PCV_dose1_date)) {
                        $pv1 = "INSERT INTO `vac_pcv_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$PCV1', '$PCV_dose1_date')";
                    } else {
                        $pv1  = "INSERT INTO `vac_pcv_table`(`cid`, `dose1`) VALUES ('$cid', '$PCV1')";
                    }
                    $conn->query($pv1);
                }
               

                if ($PCV2 == 0) {
                    $pv2 = "UPDATE `vac_pcv_table` SET `dose2` = '$PCV2' WHERE `cid` = '$cid'";
                    $conn->query($pv2);
                } else {
                    $PCV_dose2_date = $_POST['PCV-dose2-date'];
                    if (!empty($PCV_dose2_date)) {
                        $pv2 = "UPDATE `vac_ipv_table` SET `dose2` = '$PCV2', `dose2_date` = '$PCV_dose2_date' WHERE cid = '$cid'";
                    } else {
                        $pv2 = "UPDATE `vac_ipv_table` SET `dose2` = '$PCV2' WHERE `cid` = '$cid'";
                    }
                    $conn->query($pv2);
                }

                if ($PCV3 == 0) {
                    $pv3 = "UPDATE `vac_pcv_table` SET `dose3` = '$PCV3' WHERE `cid` = '$cid'";
                    $conn->query($pv3);
                } else {

                    $PCV_dose3_date = $_POST['PCV-dose3-date'];

                    if (!empty($PCV_dose3_date)) {
                        $pv3 = "UPDATE vac_pcv_table SET `dose3` = '$PCV3', `dose3_date` = '$PCV_dose3_date' WHERE cid = '$cid'";
                    } else {
                        $pv3 = "UPDATE `vac_pcv_table` SET `dose3` = '$PCV3' WHERE `cid` = '$cid'";
                    }
                    $conn->query($pv3);
                }
            }


            $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname'");
            if ($cid_query) {
                $row = $cid_query->fetch_assoc();
                $cid = $row['cid'];
            
                $RTAV1 = $_POST['Rota-dose1'];
                $RTAV2 = $_POST['Rota-dose2'];
                $RTAV3 = $_POST['Rota-dose3'];
             
                if ($RTAV1 == 0) {
                    $rtv1 = "INSERT INTO `vac_rota_table`(`cid`, `dose1`) VALUES ('$cid', '$RTAV1')";
                    $conn->query($rtv1);
                } else {
                    $RTAV_dose1_date = $_POST['Rota-dose1-date'];
                    if (!empty($RTAV_dose1_date)) {
                        $rtv1 = "INSERT INTO `vac_rota_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$RTAV1', '$RTAV_dose1_date')";
                    } else {
                        $rtv1  = "INSERT INTO `vac_rota_table`(`cid`, `dose1`) VALUES ('$cid', '$RTAV1')";
                    }
                    $conn->query($rtv1);
                }
               

                if ($RTAV2 == 0) {
                    $rtv2 = "UPDATE `vac_rota_table` SET `dose2` = '$RTAV2' WHERE `cid` = '$cid'";
                    $conn->query($rtv2);
                } else {
                    $RTAV_dose2_date = $_POST['Rota-dose2-date'];
                    if (!empty($RTAV_dose2_date)) {
                        $rtv2 = "UPDATE `vac_rota_table` SET `dose2` = '$RTAV2', `dose2_date` = '$RTAV_dose2_date' WHERE cid = '$cid'";
                    } else {
                        $rtv2 = "UPDATE `vac_rota_table` SET `dose2` = '$RTAV2' WHERE `cid` = '$cid'";
                    }
                    $conn->query($rtv2);
                }

                if ($RTAV3 == 0) {
                    $rtv3 = "UPDATE `vac_rota_table` SET `dose3` = '$RTAV3' WHERE `cid` = '$cid'";
                    $conn->query($rtv3);
                } else {

                    $RTAV_dose3_date = $_POST['Rota-dose3-date'];

                    if (!empty($RTAV_dose3_date)) {
                        $rtv3 = "UPDATE vac_rota_table SET `dose3` = '$RTAV3', `dose3_date` = '$RTAV_dose3_date' WHERE cid = '$cid'";
                    } else {
                        $rtv3 = "UPDATE `vac_rota_table` SET `dose3` = '$RTAV3' WHERE `cid` = '$cid'";
                    }
                    $conn->query($rtv3);
                }
            }
            
            $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname");
            if ($cid_query) {
            $row = $cid_query->fetch_assoc();
            $cid = $row['cid'];

            $MM1 = $_POST['MMR-dose1'];
            $MM2 = $_POST['MMR-dose2'];
            $MM3 = $_POST['MMR-dose3'];

            if ($MM1 == 0) {
                $mr1 = "INSERT INTO `vac_measles_table`(`cid`, `dose1`) VALUES ('$cid', '$MM1')";
                $conn->query($mr1);
            } else {
                $MMR_dose1_date = $_POST['MMR-dose1-date'];
                if (!empty($MMR_dose1_date)) {
                    $mr1 = "INSERT INTO `vac_measles_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$MM1', '$MMR_dose1_date')";
                } else {
                    $mr1 = "INSERT INTO `vac_measles_table`(`cid`, `dose1`) VALUES ('$cid', '$MM1')";
                }
                $conn->query($mr1);
            }

            if ($MM2 == 0) {
                $mr2 = "UPDATE `vac_measles_table` SET `dose2` = '$MM2' WHERE `cid` = '$cid'";
                $conn->query($mr2);
            } else {
                $MMR_dose2_date = $_POST['MMR-dose2-date'];
                if (!empty($MMR_dose2_date)) {
                    $mr2 = "UPDATE `vac_measles_table` SET `dose2` = '$MM2', `dose2_date` = '$MMR_dose2_date' WHERE cid = '$cid'";
                } else {
                    $mr2 = "UPDATE `vac_measles_table` SET `dose2` = '$MM2' WHERE `cid` = '$cid'";
                }
                $conn->query($mr2);
            }

            if ($MM3 == 0) {
                $mr3 = "UPDATE `vac_measles_table` SET `dose3` = '$MM3' WHERE `cid` = '$cid'";
                $conn->query($mr3);
            } else {
                $MMR_dose3_date = $_POST['MMR-dose3-date'];

                if (!empty($MMR_dose3_date)) {
                    $mr3 = "UPDATE vac_measles_table SET `dose3` = '$MM3', `dose3_date` = '$MMR_dose3_date' WHERE cid = '$cid'";
                } else {
                    $mr3 = "UPDATE `vac_measles_table` SET `dose3` = '$MM3' WHERE `cid` = '$cid'";
                }
                $conn->query($mr3);
            }
        }

        $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname");
        if ($cid_query) {
            $row = $cid_query->fetch_assoc();
            $cid = $row['cid'];

            $FLU1 = $_POST['flu-dose1'];
            $FLU2 = $_POST['flu-dose2'];
            $FLU3 = $_POST['flu-dose3'];

            if ($FLU1 == 0) {
                $fl1 = "INSERT INTO `vac_influenza_table`(`cid`, `dose1`) VALUES ('$cid', '$FLU1')";
                $conn->query($fl1);
            } else {
                $FLU_dose1_date = $_POST['flu-dose1-date'];
                if (!empty($FLU_dose1_date)) {
                    $fl1 = "INSERT INTO `vac_influenza_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$FLU1', '$FLU_dose1_date')";
                } else {
                    $fl1 = "INSERT INTO `vac_influenza_table`(`cid`, `dose1`) VALUES ('$cid', '$FLU1')";
                }
                $conn->query($fl1);
            }

            if ($FLU2 == 0) {
                $fl2 = "UPDATE `vac_influenza_table` SET `dose2` = '$FLU2' WHERE `cid` = '$cid'";
                $conn->query($fl2);
            } else {
                $FLU_dose2_date = $_POST['flu-dose2-date'];
                if (!empty($FLU_dose2_date)) {
                    $fl2 = "UPDATE `vac_influenza_table` SET `dose2` = '$FLU2', `dose2_date` = '$FLU_dose2_date' WHERE cid = '$cid'";
                } else {
                    $fl2 = "UPDATE `vac_influenza_table` SET `dose2` = '$FLU2' WHERE `cid` = '$cid'";
                }
                $conn->query($fl2);
            }

            if ($FLU3 == 0) {
                $fl3 = "UPDATE `vac_influenza_table` SET `dose3` = '$FLU3' WHERE `cid` = '$cid'";
                $conn->query($fl3);
            } else {
                $FLU_dose3_date = $_POST['flu-dose3-date'];
                if (!empty($FLU_dose3_date)) {
                    $fl3 = "UPDATE `vac_influenza_table` SET `dose3` = '$FLU3', `dose3_date` = '$FLU_dose3_date' WHERE cid = '$cid'";
                } else {
                    $fl3 = "UPDATE `vac_influenza_table` SET `dose3` = '$FLU3' WHERE `cid` = '$cid'";
                }
                $conn->query($fl3);
            }
        }

        $cid_query = $conn->query("SELECT cid FROM `childtable` WHERE child_firstname = '$fname' AND child_lastname = '$lname");
        if ($cid_query) {
            $row = $cid_query->fetch_assoc();
            $cid = $row['cid'];

            $HEPA1 = $_POST['HepA-dose1'];
            $HEPA2 = $_POST['HepA-dose2'];
            $HEPA3 = $_POST['HepA-dose3'];

            if ($HEPA1 == 0) {
                $hep1 = "INSERT INTO `vac_hepa_table`(`cid`, `dose1`) VALUES ('$cid', '$HEPA1')";
                $conn->query($hep1);
            } else {
                $HEPA_dose1_date = $_POST['HepA-dose1-date'];
                if (!empty($HEPA_dose1_date)) {
                    $hep1 = "INSERT INTO `vac_hepa_table`(`cid`, `dose1`, `dose1_date`) VALUES ('$cid', '$HEPA1', '$HEPA_dose1_date')";
                } else {
                    $hep1 = "INSERT INTO `vac_hepa_table`(`cid`, `dose1`) VALUES ('$cid', '$HEPA1')";
                }
                $conn->query($hep1);
            }

            if ($HEPA2 == 0) {
                $hep2 = "UPDATE `vac_hepa_table` SET `dose2` = '$HEPA2' WHERE `cid` = '$cid'";
                $conn->query($hep2);
            } else {
                $HEPA_dose2_date = $_POST['HepA-dose2-date'];
                if (!empty($HEPA_dose2_date)) {
                    $hep2 = "UPDATE `vac_hepa_table` SET `dose2` = '$HEPA2', `dose2_date` = '$HEPA_dose2_date' WHERE `cid` = '$cid'";
                } else {
                    $hep2 = "UPDATE `vac_hepa_table` SET `dose2` = '$HEPA2' WHERE `cid` = '$cid'";
                }
                $conn->query($hep2);
            }

            if ($HEPA3 == 0) {
                $hep3 = "UPDATE `vac_hepa_table` SET `dose3` = '$HEPA3' WHERE `cid` = '$cid'";
                $conn->query($hep3);
            } else {
                $HEPA_dose3_date = $_POST['HepA-dose3-date'];

                if (!empty($HEPA_dose3_date)) {
                    $hep3 = "UPDATE `vac_hepa_table` SET `dose3` = '$HEPA3', `dose3_date` = '$HEPA_dose3_date' WHERE `cid` = '$cid'";
                } else {
                    $hep3 = "UPDATE `vac_hepa_table` SET `dose3` = '$HEPA3' WHERE `cid` = '$cid'";
                }
                $conn->query($hep3);
            }
        }

            

            $message[] = 'Registered Successfully!'; 
     }else{
        $message[] = 'registration failed!';
     }
 }
 }
?>



<link rel="stylesheet" href="./css/style3.css">
</head>


<body>
    <div class="container1">
    <div class="column1">
            
            <?php include('../templates/Parent-Dash.php'); ?> <!------------call side bar template------------>
          </div>
       
        <div class="column">
            <div class="dashboard">
                <img src="./images/Childs Registration.png">
            <div class="dashboard-text">
                <h1>Child Registration</h1>
            </div>
            </div>
            <div class="container">
            <form action="" method="post">
           
                <h2>REGISTER YOUR CHILD</h2>
                <?php
                  if(isset($message)){
                    foreach($message as $message){
                     echo "<script>
                             swal({
                             title: '$message',
                             html: '$message',
                             icon: 'success',
                             confirmButtonText: 'Okay'
            })
        </script>";
         }
      }
      ?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Child's First Name</span>
                        <input type="text" name="Child_fname" placeholder="Enter your child's first name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Last Name</span>
                        <input type="text" name="Child_lname" placeholder="Enter your child's last name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Middle Name</span>
                        <input type="text" name="Childmname" placeholder="Enter your child's middle name" required>
                    </div>
                    <div class="date">
                        <span class="details">Child's Birthdate</span>
                        <input type="date" name="Child_bdate" placeholder="Enter your child's birthdate" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Father's Name</span>
                        <input type="text" name="Child_fthrname" placeholder="Enter child's father's name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Child's Mother's Name</span>
                        <input type="text" name="Child_mthrname" placeholder="Enter child's mother's name" required>
                    </div>
                </div>


                        <!-----------------------------VACCINE QUESTION------------------------------->
                        <div class="question-box">
                            <p>NOTE: If your child has already received at least one (1) vaccine, please fill out the vaccine form below. 
                               This information will help us keep track of your child's vaccination status and 
                               ensure that they are up to date on all recommended vaccines.</p>

            
                             <h4>If your child has not yet received any vaccines, complete your Registration
                             <button type="submit" name="submit"class="btn1">HERE!</button> </h4>

                     <!-----------------------------BCG QUESTION------------------------------->


                     <div class="question-option">
                        <h3>Is your child BCG Vaccinated?</h3>
                        <h4>Dose 1:</h4>
                           <div class="question">
                             <input type="radio" value="0" name="BCG" >
                             <label >No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="BCG-dose1-check-yes" name="BCG" >
                            <label for="">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="BCG-dose1-date">
                        </div>
                    </div>            
                     <!-----------------------------END OF BCG QUESTION------------------------------->  
                     
                     
                     <!-----------------------------HEPB QUESTION------------------------------->
                   
                     <div class="question-option">
                    <h3>Is your child HepB Vaccinated?</h3>
                    <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="HepB-dose1-check-no" name="HepB-dose1" >
                            <label for="HepB-dose1-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="HepB-dose1-check-yes" name="HepB-dose1" >
                            <label for="HepB-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="HepB-dose1-date" >
                        </div>
                    
                    <h4>Dose 2</h4>
                    
                        <div class="question">
                            <input type="radio" value="0" id="HepB-dose2-check-no" name="HepB-dose2" />
                            <label for="HepB-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="HepB-dose2-check-yes" name="HepB-dose2" />
                            <label for="HepB-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="HepB-dose2-date">
                        </div>

                        <h4>Dose 3</h4>
                
                        <div class="question">
                            <input type="radio"  value="0" id="HepB-dose3-check-no" name="HepB-dose3" />
                            <label for="HepB-dose3-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="HepB-dose3-check-yes" name="HepB-dose3" />
                            <label for="HepB-dose3-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="HepB-dose3-date" >
                        </div>
                    

                    <h4>Dose 4</h4>
                    
                        <div class="question">
                            <input type="radio"  value="0" id="HepB-dose4-check-no" name="HepB-dose4" />
                            <label for="HepB-dose4-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="HepB-dose4-check-yes" name="HepB-dose4" />
                            <label for="HepB-dose4-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="HepB-dose4-date" >
                        </div>
                    
                   
                    </div>

                         <!-----------------------------END OF HEPB QUESTION------------------------------->

                          <!-----------------------------DTAP QUESTION------------------------------->
                          <div class="question-option">
                    <h3>Is your child DTaP Vaccinated?</h3>
                    <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="DTaP-dose1-check-no" name="DTaP-dose1" />
                            <label for="DTaP-dose1-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="DTaP-dose1-check-yes" name="DTaP-dose1" />
                            <label for="DTaP-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="DTaP-dose1-date">
                        </div>
                    
                    <h4>Dose 2</h4>
                  
                        <div class="question">
                            <input type="radio" value="0" id="DTaP-dose2-check-no" name="DTaP-dose2" />
                            <label for="DTaP-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="DTaP-dose2-check-yes" name="DTaP-dose2" />
                            <label for="DTaP-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="DTaP-dose2-date" >
                        </div>
                    
                    <h4>Dose 3</h4>
                    
                        <div class="question">
                            <input type="radio" value="0" id="DTaP-dose3-check-no" name="DTaP-dose3" />
                            <label for="DTaP-dose3-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="DTaP-dose3-check-yes" name="DTaP-dose3" />
                            <label for="DTaP-dose3-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="DTaP-dose3-date" >
                        </div>
                    
                    </div>

                          <!-----------------------------END OF DTAP QUESTION------------------------------->

                            <!---------------------------- HIB QUESTION------------------------------->
                            <div class="question-option">
                    <h3>Is your child Hib Vaccinated?</h3>
                    <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="Hib-dose1-check-no" name="Hib-dose1" />
                            <label for="Hib-dose1-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="Hib-dose1-check-yes" name="Hib-dose1" />
                            <label for="Hib-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="Hib-dose1-date">
                        </div>
                    
                    <h4>Dose 2</h4>
                        <div class="question">
                            <input type="radio" value="0" id="Hib-dose2-check-no" name="Hib-dose2" />
                            <label for="Hib-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="Hib-dose2-check-yes" name="Hib-dose2" />
                            <label for="Hib-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="Hib-dose2-date" >
                        </div>
                    
                    <h4>Dose 3</h4>
                        <div class="question">
                            <input type="radio" value="0" id="Hib-dose3-check-no" name="Hib-dose3" />
                            <label for="Hib-dose3-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="Hib-dose3-check-yes" name="Hib-dose3" />
                            <label for="Hib-dose3-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="Hib-dose3-date" >
                        </div>     
                    </div>

                          <!----------------------------EBD OF HIB QUESTION------------------------------->
                        <!---------------------------- IPV QUESTION------------------------------->

                    <div class="question-option">
                        <h3>Is your child iPV Vaccinated?</h3>
                        <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="iPV-dose1-check-no" name="iPV-dose1" />
                            <label for="iPV-dose1-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="iPV-dose1-check-yes" name="iPV-dose1" />
                            <label for="iPV-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="iPV-dose1-date">
                        </div>
                        <h4>Dose 2</h4>
                        <div class="question">
                            <input type="radio" value="0"id="iPV-dose2-check-no" name="iPV-dose2" />
                            <label for="iPV-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="iPV-dose2-check-yes" name="iPV-dose2" />
                            <label for="iPV-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="iPV-dose2-date">
                        </div>
                        <h4>Dose 3</h4>
                        <div class="question">
                            <input type="radio" value="0" id="iPV-dose3-check-no" name="iPV-dose3" />
                            <label for="iPV-dose3-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="iPV-dose3-check-yes" name "iPV-dose3" />
                            <label for="iPV-dose3-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="iPV-dose3-date">
                        </div>
                    </div>

                          <!---------------------------- END OF IPV QUESTION------------------------------->                          
                         
                          <!---------------------------- PCV QUESTION------------------------------->

                   
                            <div class="question-option">
                            <h3>Is your child PCV Vaccinated?</h3>
                            <h4>Dose 1</h4>
                            <div class="question">
                                <input type="radio" value="0" id="PCV-dose1-check-no" name="PCV-dose1" />
                                <label for="PCV-dose1-check-no">No</label>
                            </div>
                            <div class="question">
                                <input type="radio" value="1" id="PCV-dose1-check-yes" name="PCV-dose1" />
                                <label for="PCV-dose1-check-yes">Yes</label>
                            </div>
                            <div class="date">
                                <span class="details">If yes, input vaccination date</span>
                                <input type="date" name="PCV-dose1-date">
                            </div>
                            <h4>Dose 2</h4>
                            <div class="question">
                                <input type="radio" value="0" id="PCV-dose2-check-no" name="PCV-dose2" />
                                <label for="PCV-dose2-check-no">No</label>
                            </div>
                            <div class="question">
                                <input type="radio" value="1" id="PCV-dose2-check-yes" name="PCV-dose2" />
                                <label for="PCV-dose2-check-yes">Yes</label>
                            </div>
                            <div class="date">
                                <span class="details">If yes, input vaccination date</span>
                                <input type="date" name="PCV-dose2-date">
                            </div>
                            <h4>Dose 3</h4>
                            <div class="question">
                                <input type="radio" value="0" id="PCV-dose3-check-no" name="PCV-dose3" />
                                <label for="PCV-dose3-check-no">No</label>
                            </div>
                            <div class="question">
                                <input type="radio" value="1" id="PCV-dose3-check-yes" name="PCV-dose3" />
                                <label for="PCV-dose3-check-yes">Yes</label>
                            </div>
                            <div class="date">
                                <span class="details">If yes, input vaccination date</span>
                                <input type="date" name="PCV-dose3-date">
                            </div>
                            <h4>Dose 4</h4>
                            <div class="question">
                                <input type="radio" value="0" id="PCV-dose4-check-no" name="PCV-dose4" />
                                <label for="PCV-dose4-check-no">No</label>
                            </div>
                            <div class="question">
                                <input type="radio" value="1" id="PCV-dose4-check-yes" name="PCV-dose4" />
                                <label for="PCV-dose4-check-yes">Yes</label>
                            </div>
                            <div class="date">
                                <span class="details">If yes, input vaccination date</span>
                                <input type="date" name="PCV-dose4-date">
                            </div>
                        </div>


                          <!----------------------------END PCV QUESTION------------------------------->

                          
                          <!---------------------------- ROTAV QUESTION------------------------------->


                            <div class="question-option">                                
                        <h3>Is your child Rotavirus Vaccinated?</h3>
                        <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="Rota-dose1-check-no" name="Rota-dose1" />
                            <label for="Rota-dose1check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="Rota-dose1-check-yes" name="Rota-dose1" />
                            <label for="Rota-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="Rota-dose1-date">
                        </div>

                        <h4>Dose 2</h4>
                        <div class="question">
                            <input type="radio" value="0" id="Rota-dose2-check-no" name="Rota-dose2" />
                            <label for="Rota-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="Rota-dose2-check-yes" name="Rota-dose2" />
                            <label for="Rota-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="Rota-dose2-date">
                        </div>

                        <h4>Dose 3</h4>
                        <div class="question">
                            <input type="radio" value="0" id="Rota-dose3-check-no" name="Rota-dose3" />
                            <label for="Rota-dose3-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="Rota-dose3-check-yes" name="Rota-dose3" />
                            <label for="Rota-dose3-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="Rota-dose3-date">
                        </div>
                    </div>

                          <!---------------------------- END OF ROTAV QUESTION------------------------------->
                           <!---------------------------- MMR QUESTION------------------------------->

                        <div class="question-option">
                        <h3>Is your child MMR Vaccinated?</h3>
                        <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="MMR-dose1-check-no" name="MMR-dose1" />
                            <label for="MMR-dose1-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="MMR-dose1-check-yes" name="MMR-dose1" />
                            <label for="MMR-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="MMR-dose1-date">
                        </div>

                        <h4>Dose 2</h4>
                        <div class="question">
                            <input type="radio" value="0" id="MMR-dose2-check-no" name="MMR-dose2" />
                            <label for="MMR-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="MMR-dose2-check-yes" name="MMR-dose2" />
                            <label for="MMR-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="MMR-dose2-date">
                        </div>
                    </div>


                     <!----------------------------END OF MMR QUESTION------------------------------->

                     <!----------------------------INFLUENZA QUESTION------------------------------->

                    <div class="question-option">         
                        <h3>Is your child Influenza Vaccinated?</h3>
                        <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="flu-dose1-check-no" name="flu-dose1" />
                            <label for="flu-dose1-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="flu-dose1-check-yes" name="flu-dose1" />
                            <label for="flu-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="flu-dose1-date">
                        </div>
                        
                        <h4>Dose 2</h4>
                        <div class="question">
                            <input type="radio" value="0" id="flu-dose2-check-no" name="flu-dose2" />
                            <label for="flu-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="flu-dose2-check-yes" name "flu-dose2" />
                            <label for="flu-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="flu-dose2-date">
                        </div>
                        
                        <h4>Dose 3</h4>
                        <div class="question">
                            <input type="radio" value="0" id="flu-dose3-check-no" name="flu-dose3" />
                            <label for="flu-dose3-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="flu-dose3-check-yes" name="flu-dose3" />
                            <label for="flu-dose3-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="flu-dose3-date">
                        </div>
                    
                        <h4>Dose 4</h4>
                        <div class="question">
                            <input type="radio" value="0" id="flu-dose4-check-no" name="flu-dose4" />
                            <label for="flu-dose4-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="flu-dose4-check-yes" name="flu-dose4" />
                            <label for="flu-dose4-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="flu-dose4-date">
                        </div>
                    </div>

                     <!----------------------------END OF INFLUENZA QUESTION------------------------------->
                     <!----------------------------HEP A QUESTION------------------------------->

                        <div class="question-option">
                        <h3>Is your child HepA Vaccinated?</h3>
                        <h4>Dose 1</h4>
                        <div class="question">
                            <input type="radio" value="0" id="HepA-dose1-check-no" name="HepA-dose1" />
                            <label for="HepA-dose1-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="HepA-dose1-check-yes" name="HepA-dose1" />
                            <label for="HepA-dose1-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="HepA-dose1-date">
                        </div>
                        <h4>Dose 2</h4>
                        <div class="question">
                            <input type="radio" value="0"id="HepA-dose2-check-no" name="HepA-dose2" />
                            <label for="HepA-dose2-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="HepA-dose2-check-yes" name="HepA-dose2" />
                            <label for="HepA-dose2-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="HepA-dose2-date">
                        </div>
                        <h4>Dose 3</h4>
                        <div class="question">
                            <input type="radio" value="0" id="HepA-dose3-check-no" name="HepA-dose3" />
                            <label for="HepA-dose3-check-no">No</label>
                        </div>
                        <div class="question">
                            <input type="radio" value="1" id="HepA-dose3-check-yes" name="HepA-dose3" />
                            <label for="HepA-dose3-check-yes">Yes</label>
                        </div>
                        <div class="date">
                            <span class="details">If yes, input vaccination date</span>
                            <input type="date" name="HepA-dose3-date">
                        </div>
                    </div>


                        <!----------------------------HEP A QUESTION------------------------------->



                    <button type="submit" name="submit2" class="btn">REGISTER</button>



                   
                    
             
</form>
</body>
</html>