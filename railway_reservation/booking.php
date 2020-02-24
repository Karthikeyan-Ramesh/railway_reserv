<?php
include "header.php";
include "connect.php";
$qs="select * from traindetails";
				$ra = $conn->query($qs);
				$availability=$ra->num_rows;
				
				$qsw="select * from traindetails WHERE user_berth='Side'";
				$raz = $conn->query($qsw);
				$rAc=$raz->num_rows;
				
				$WA="select * from traindetails WHERE status='Waiting'";
				$raw = $conn->query($WA);
				$wt=$raw->num_rows;
?>
<div class="clearfix data">
    <div class="clearfix st">
    <?php if(24-$availability !=0){ ?>   <div class="status sucess">Avaliablity :<span><?php echo 24-$availability; ?></span></div><?php }else if(5-$wt !=0){ ?>
	<div class="status waiting-list">Waiting :<span><?php echo $wt; ?></span></div><?php }else if(8-$rAc !=0){ ?>
	<div class="status rac">RAC :<span><?php echo $availability; ?></span></div><?php } ?>
    </div>
    <form name="myform" method="post" action="control.php" enctype="multipart-form/data">
        <div class="form-group">
            <input type="text" name="Passenger_name" class="form-control" placeholder="Name of Passenger">
            <span color="red">*</span>
        </div> 
        <div class="form-group">
             <input type="number" name="age" class="form-control" placeholder="Passenger Age">
             <span color="red">*</span>
        </div>
        <div class="form-group">
            <select name="gender" id="gender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Female-with-child">Female with Children</option>
            </select><span color="red">*</span>
        </div>
        <div class="form-group">
            <input type="text" name="cname" class="form-control child-form" placeholder="Name of Child Passenger">
            <span color="red">*</span>
        </div> 
        <div class="form-group">
             <input type="number" name="cage" class="form-control child-form" placeholder="Child Passenger Age">
             <span color="red">*</span>
        </div>
        <div class="form-group">
            <select name="cgender" id="cgender" class="form-control child-form">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><span color="red">*</span>
        </div>
        <div class="form-group">
            <select name="berth" id="berth" class="form-control">
                <option value="Lower">Lower</option>
                <option value="Upper">Upper</option>
                <option value="Middle">Middle</option>
                <span color="red">*</span>
            </select>
        </div>
        <div class="form-group">
           <input type="submit" class="button btn" Value="Book">
        </div>
    </form>
</div>
<?php
include "footer.php";
?>