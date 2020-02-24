<?php
/*$_POST["Passenger_name"]
$_POST["age"]
$_POST["gender"]
$_POST["berth"]*/
include "connect.php";
			$sql="select * from traindetails";
			$result = $conn->query($sql);
			
			$sql1="select * from traindetails where coach='s1'";
			$res1 = $conn->query($sql1);
			$s1=$res1->num_rows;
			
			$sql2="select * from traindetails where coach='s2'";
			$res2 = $conn->query($sql2);
			$s2=$res2->num_rows;
			
			$sql3="select * from traindetails where coach='s3'";
			$res3 = $conn->query($sql3);
			$s3=$res3->num_rows;
			
			$sql4="select * from traindetails where coach='s4'";
			$res4 = $conn->query($sql4);
			$s4=$res4->num_rows;
			$coach="";
			if ($result->num_rows == 0) {	
				if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
				$sql = "insert into traindetails(user_name,user_gender,user_age,user_berth,child_name,child_gender,child_age,coach,status) values('".$_POST["Passenger_name"]."','".$_POST["gender"]."','".$_POST["age"]."','Lower','".$_POST["cname"]."','".$_POST["cgender"]."','".$_POST["cage"]."','s1','success')";
				}else if($_POST["age"]>=60){
					$sql = "insert into traindetails(user_name,user_gender,user_age,user_berth,coach,status) values('".$_POST["Passenger_name"]."','".$_POST["gender"]."','".$_POST["age"]."','Lower','s1','success')";
				}else{
					$sql = "insert into traindetails(user_name,user_gender,user_age,user_berth,coach,status) values('".$_POST["Passenger_name"]."','".$_POST["gender"]."','".$_POST["age"]."','Middle','s1','success')";
				}
					if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
					} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
			}
			}else{
				$qs="select * from traindetails";
				$ra = $conn->query($qs);
				$availability=$ra->num_rows;
				
				$qsw="select * from traindetails WHERE user_berth='Side'";
				$raz = $conn->query($qsw);
				$rAc=$raz->num_rows;
				
				$WA="select * from traindetails WHERE status='Waiting'";
				$raw = $conn->query($WA);
				$wt=$raw->num_rows;
				
				/////////////////////////////////////////s1 coach /////////////////////////////////
				if($s1<6){
					$status = "success";
					$us1="select * from traindetails where user_berth='Upper' and coach='s1'";
					$rus1 = $conn->query($us1);
					$upper1=$rus1->num_rows;
					
					$ms1="select * from traindetails where user_berth='Middle' and coach='s1'";
					$rms1 = $conn->query($ms1);
					$middle1=$rms1->num_rows;
					
					$ls1="select * from traindetails where user_berth='Lower' and coach='s1'";
					$rls1 = $conn->query($ls1);
					$lower1=$rls1->num_rows;
					
					$mens1="select * from traindetails where user_gender='Male' and coach='s1'";
					$rmens1 = $conn->query($mens1);
					$mens1=$rmens1->num_rows;
					
					if($_POST["gender"]=="Male" && $_POST["age"]<60){
						if($middle1<2){
							$berth="Middle";
						}else if($upper1<2){
							$berth="Upper";
						}else{
							$berth="Lower";
						}
						$coach="s1";
					}else if($_POST["gender"]=="Male" && $_POST["age"]>=60){
						if($lower1<2){
							$berth="Lower";
						}else if($middle1<2){
							$berth="Middle";
						}else{
							$berth="Upper";
						}
						$coach="s1";
					}else if($mens1<5){
						if($_POST["gender"]=="Female" && $_POST["age"]<60){
							if($middle1<2){
								$berth="Middle";
							}else if($upper1<2){
								$berth="Upper";
							}else{
								$berth="Lower";
							}
						}else if($_POST["gender"]=="Female" && $_POST["age"]>=60){
							if($lower1<2){
								$berth="Lower";
							}else if($middle1<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}else if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
							if($lower1<2){
								$berth="Lower";
							}else if($middle1<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}
						$coach="s1";
					}else{
						$coach="s2";
						$us2="select * from traindetails where user_berth='Upper' and coach='s2'";
						$rus2 = $conn->query($us2);
						$upper2=$rus2->num_rows;
						
						$ms2="select * from traindetails where user_berth='Middle' and coach='s2'";
						$rms2 = $conn->query($ms2);
						$middle2=$rms2->num_rows;
						
						$ls2="select * from traindetails where user_berth='Lower' and coach='s2'";
						$rls2 = $conn->query($ls2);
						$lower2=$rls2->num_rows;
						
						if($_POST["gender"]=="Female" && $_POST["age"]<60){
							if($middle2<2){
								$berth="Middle";
							}else if($upper2<2){
								$berth="Upper";
							}else{
								$berth="Lower";
							}
						}else if($_POST["gender"]=="Female" && $_POST["age"]>=60){
							if($lower2<2){
								$berth="Lower";
							}else if($middle2<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}else if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
							if($lower2<2){
								$berth="Lower";
							}else if($middle2<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}
					}
				}
				/////////////////////////////////////////////////s1 closed////////////////////////////////////
				
				
				/////////////////////////////////////////////////s2 coach////////////////////////////////////
				else if($s2<6){
					$status = "success";
					$us2="select * from traindetails where user_berth='Upper' and coach='s2'";
					$rus2 = $conn->query($us2);
					$upper2=$rus2->num_rows;
					
					$ms2="select * from traindetails where user_berth='Middle' and coach='s2'";
					$rms2 = $conn->query($ms2);
					$middle2=$rms2->num_rows;
					
					$ls2="select * from traindetails where user_berth='Lower' and coach='s2'";
					$rls2 = $conn->query($ls2);
					$lower2=$rls2->num_rows;
					
					$mens2="select * from traindetails where user_gender='Male' and coach='s2'";
					$rmens2 = $conn->query($mens2);
					$mens2=$rmens2->num_rows;
					
					echo $men2;
					if($_POST["gender"]=="Male" && $_POST["age"]<60){
						if($middle2<2){
							$berth="Middle";
						}else if($upper2<2){
							$berth="Upper";
						}else{
							$berth="Lower";
						}
						$coach="s2";
					}else if($_POST["gender"]=="Male" && $_POST["age"]>=60){
						if($lower2<2){
							$berth="Lower";
						}else if($middle2<2){
							$berth="Middle";
						}else{
							$berth="Upper";
						}
						$coach="s2";
					}else if($mens2<5){
						if($_POST["gender"]=="Female" && $_POST["age"]<60){
							if($middle2<2){
								$berth="Middle";
							}else if($upper2<2){
								$berth="Upper";
							}else{
								$berth="Lower";
							}
						}else if($_POST["gender"]=="Female" && $_POST["age"]>=60){
							if($lower2<2){
								$berth="Lower";
							}else if($middle2<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}else if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
							if($lower2<2){
								$berth="Lower";
							}else if($middle2<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}
						$coach="s2";
					}else{
						$coach="s3";
						$us3="select * from traindetails where user_berth='Upper' and coach='s3'";
						$rus3 = $conn->query($us3);
						$upper3=$rus3->num_rows;
						
						$ms3="select * from traindetails where user_berth='Middle' and coach='s3'";
						$rms3 = $conn->query($ms3);
						$middle3=$rms3->num_rows;
						
						$ls3="select * from traindetails where user_berth='Lower' and coach='s3'";
						$rls3 = $conn->query($ls3);
						$lower3=$rls3->num_rows;
						
						if($_POST["gender"]=="Female" && $_POST["age"]<60){
							if($middle3<2){
								$berth="Middle";
							}else if($upper3<2){
								$berth="Upper";
							}else{
								$berth="Lower";
							}
						}else if($_POST["gender"]=="Female" && $_POST["age"]>=60){
							if($lower3<2){
								$berth="Lower";
							}else if($middle3<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}else if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
							if($lower3<2){
								$berth="Lower";
							}else if($middle3<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}
					}
				}
				////////////////////////////////////////////////s2 closed////////////////////////
				
				/////////////////////////////////////////////////s3 coach////////////////////////////////////
				else if($s3<6){
					$status = "success";
					$us3="select * from traindetails where user_berth='Upper' and coach='s3'";
					$rus3 = $conn->query($us3);
					$upper3=$rus3->num_rows;
					
					$ms3="select * from traindetails where user_berth='Middle' and coach='s3'";
					$rms3 = $conn->query($ms3);
					$middle3=$rms3->num_rows;
					
					$ls3="select * from traindetails where user_berth='Lower' and coach='s3'";
					$rls3 = $conn->query($ls3);
					$lower3=$rls3->num_rows;
					
					$mens3="select * from traindetails where user_gender='Male' and coach='s3'";
					$rmens3 = $conn->query($mens3);
					$mens3=$rmens3->num_rows;
					
					if($_POST["gender"]=="Male" && $_POST["age"]<60){
						if($middle3<2){
							$berth="Middle";
						}else if($upper3<2){
							$berth="Upper";
						}else{
							$berth="Lower";
						}
						$coach="s3";
					}else if($_POST["gender"]=="Male" && $_POST["age"]>=60){
						if($lower3<2){
							$berth="Lower";
						}else if($middle3<2){
							$berth="Middle";
						}else{
							$berth="Upper";
						}
						$coach="s3";
					}else if($mens3<5){
						if($_POST["gender"]=="Female" && $_POST["age"]<60){
							if($middle3<2){
								$berth="Middle";
							}else if($upper3<2){
								$berth="Upper";
							}else{
								$berth="Lower";
							}
						}else if($_POST["gender"]=="Female" && $_POST["age"]>=60){
							if($lower3<2){
								$berth="Lower";
							}else if($middle3<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}else if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
							if($lower3<2){
								$berth="Lower";
							}else if($middle3<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}
						$coach="s3";
					}else{
						$coach="s4";
						$us4="select * from traindetails where user_berth='Upper' and coach='s4'";
						$rus4 = $conn->query($us4);
						$upper4=$rus4->num_rows;
						
						$ms4="select * from traindetails where user_berth='Middle' and coach='s4'";
						$rms4 = $conn->query($ms4);
						$middle4=$rms4->num_rows;
						
						$ls4="select * from traindetails where user_berth='Lower' and coach='s4'";
						$rls4 = $conn->query($ls4);
						$lower4=$rls4->num_rows;
						
						if($_POST["gender"]=="Female" && $_POST["age"]<60){
							if($middle4<2){
								$berth="Middle";
							}else if($upper4<2){
								$berth="Upper";
							}else{
								$berth="Lower";
							}
						}else if($_POST["gender"]=="Female" && $_POST["age"]>=60){
							if($lower4<2){
								$berth="Lower";
							}else if($middle4<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}else if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
							if($lower4<2){
								$berth="Lower";
							}else if($middle4<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}
					}
				}
				////////////////////////////////////////////////s3 closed////////////////////////
				
				/////////////////////////////////////////////////s4 coach////////////////////////////////////
				else if($s4<6){
					$status = "success";
					$us4="select * from traindetails where user_berth='Upper' and coach='s4'";
					$rus4 = $conn->query($us4);
					$upper4=$rus4->num_rows;
					
					$ms4="select * from traindetails where user_berth='Middle' and coach='s4'";
					$rms4 = $conn->query($ms4);
					$middle4=$rms4->num_rows;
					
					$ls4="select * from traindetails where user_berth='Lower' and coach='s4'";
					$rls4 = $conn->query($ls4);
					$lower4=$rls4->num_rows;
					
					$mens4="select * from traindetails where user_gender='Male' and coach='s4'";
					$rmens4 = $conn->query($mens3);
					$mens4=$rmens4->num_rows;
					
					echo $men4;
					if($_POST["gender"]=="Male" && $_POST["age"]<60){
						if($middle4<2){
							$berth="Middle";
						}else if($upper4<2){
							$berth="Upper";
						}else{
							$berth="Lower";
						}
						$coach="s4";
					}else if($_POST["gender"]=="Male" && $_POST["age"]>=60){
						if($lower4<2){
							$berth="Lower";
						}else if($middle4<2){
							$berth="Middle";
						}else{
							$berth="Upper";
						}
						$coach="s4";
					}else if($mens4<5){
						if($_POST["gender"]=="Female" && $_POST["age"]<60){
							if($middle4<2){
								$berth="Middle";
							}else if($upper4<2){
								$berth="Upper";
							}else{
								$berth="Lower";
							}
						}else if($_POST["gender"]=="Female" && $_POST["age"]>=60){
							if($lower4<2){
								$berth="Lower";
							}else if($middle4<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}else if($_POST["gender"]=="Female-with-child" && $_POST["cage"]<=5){
							if($lower4<2){
								$berth="Lower";
							}else if($middle4<2){
								$berth="Middle";
							}else{
								$berth="Upper";
							}
						}
						$coach="s4";
					}else{
						$cs1="select * from traindetails where user_gender!='Male' and coach='s1'";
						$crs1 = $conn->query($cs1);
						$avs1=$crs1->num_rows;
						
						$cs2="select * from traindetails where user_gender!='Male' and coach='s2'";
						$crs2 = $conn->query($cs2);
						$avs2=$crs2->num_rows;
						
						$cs3="select * from traindetails where user_gender!='Male' and coach='s3'";
						$crs3 = $conn->query($cs3);
						$avs3=$crs3->num_rows;
						
						$cs4="select * from traindetails where user_gender!='Male' and coach='s4'";
						$crs4 = $conn->query($cs4);
						$avs4=$crs4->num_rows;
						
						if($avs1!=0){
							$coach="s1";
							$ch="select * from traindetails where user_gender='Male' and coach='s1'";
							$chq = $conn->query($ch);
							/*while($chq->fetch_row()){
								UPDATE traindetails SET coach='s4' WHERE s.no=$resu['s.no'];
								break;
							}*/
						}else if($avs2!=0){
							$coach="s2";
							$ch="select * from traindetails where user_gender='Male' and coach='s2'";
							$chq = $conn->query($ch);
							/*while($chq->fetch_row()){
								UPDATE traindetails SET coach='s4' WHERE s.no=$resu['s.no'];
								break;
							}*/
						}else if($avs3!=0){
							$coach="s3";
							$ch="select * from traindetails where user_gender='Male' and coach='s3'";
							$chq = $conn->query($ch);
							/*while($chq->fetch_row()){
								UPDATE traindetails SET coach='s4' WHERE s.no=$resu['s.no'];
								break;
							}*/
						}else if($avs4!=0){
							$coach="s4";
							$ch="select * from traindetails where user_gender='Male' and coach='s4'";
							$chq = $conn->query($ch);
							/*while($chq->fetch_row()){
								UPDATE traindetails SET coach='s4' WHERE s.no=$resu['s.no'];
								break;
							}*/
						}
					}
				}
					/////////////////////////////////////// s4 closed ///////////////////////////
					
					//////////////////////////////////////RAC STARTED //////////////////////////
				else if($availability>=24 && $rAc<8){
					$ras1="select * from traindetails where user_berth='Side' and coach='s1'";
					$ss1 = $conn->query($ras1);
					$racs1=$ss1->num_rows;
					
					$ras2="select * from traindetails where user_berth='Side' and coach='s2'";
					$ss2 = $conn->query($ras2);
					$racs2=$ss2->num_rows;
					
					$ras3="select * from traindetails where user_berth='Side' and coach='s3'";
					$ss3 = $conn->query($ras3);
					$racs3=$ss3->num_rows;
					
					$ras4="select * from traindetails where user_berth='Side' and coach='s4'";
					$ss3 = $conn->query($ras4);
					$racs4=$ss3->num_rows;
					
					if($racs1<2){
						$coach="s1";
						$status="success";
						$berth="Side";	
					}else if($racs2<2){
						$coach="s2";
						$status="success";
						$berth="Side";	
					}else if($racs3<2){
						$coach="s3";
						$status="success";
						$berth="Side";	
					}else if($racs4<2){
						$coach="s4";
						$status="success";
						$berth="Side";	
					}else {
						$coach="";
						$status="Waiting";
						$berth="";	
					}
						
				}else{
					$wq="select * from traindetails where user_berth='Waiting'";
					$chq = $conn->query($wq);
					$wait = $chq->num_rows;
					if($wait<5){
					$status="Waiting";
					}
					$coach="";
					$berth="";
				}
					
					if($_POST["gender"]=="Female-with-child"){
						$sql = "insert into traindetails(user_name,user_gender,user_age,user_berth,child_name,child_gender,child_age,coach,status) values('".$_POST["Passenger_name"]."','".$_POST["gender"]."','".$_POST["age"]."','".$berth."','".$_POST["cname"]."','".$_POST["cgender"]."','".$_POST["cage"]."','".$coach."','".$status."')";
						}else{
							$sql = "insert into traindetails(user_name,user_gender,user_age,user_berth,coach,status) values('".$_POST["Passenger_name"]."','".$_POST["gender"]."','".$_POST["age"]."','".$berth."','".$coach."','".$status."')";
						}
							if ($conn->query($sql) === TRUE) {
							echo "";
							} else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
				
			}
			echo "<script>window.location.href='result.php'</script>";
?>