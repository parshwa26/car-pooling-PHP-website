<html>
<title>Driver rating</title>
<body>	
<?php 
	session_start();
if(isset($_SESSION['emailcommanusername']))
{	
	include_once("connection.php");
	include_once("toptemplate.php");
	include_once("hmenu.php");
	$pid=$_SESSION['reg_id'];	
	if(isset($_SESSION['did']))
	{
		$did=$_SESSION['did'];
	}
	else
	{
		$did=$_GET['driverid'];
		$_SESSION['did']=$did;
	}
	
		$_SESSION['driverid']=$did;
	//	echo $row['pid'];
		$sql1=mysql_query("select * from signup_details where reg_id=$did");
		$row1=mysql_fetch_array($sql1);
	//	echo $row1[1];
//echo "<h1>".$row1[1]."</h1>"; 


	?>
</body>
<head>

       		 <style type="text/css">

            #dv1, #dv0{
                width: 408px;
                border: 1px #ccc solid;
                padding: 15px;
                margin: auto;

            }
           
            /*downloaded from http://devzone.co.in*/
        </style>
       <style>

            /****** Rating Starts *****/
           @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            body{ margin: 20px; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating { 
                border: none;
                float: left;
            }

            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }

            .rating > label { 
                color: #ddd; 
                float: right; 
            }

            .rating > input:checked ~ label, 
            .rating:not(:checked) > label:hover,  
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover, 
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, 
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     
        </style>
        
	
                    <!-- Demo 2 start -->
       
    <!--                <script>
                        $(document).ready(function () {
                            $("#demo2 .stars").click(function () {
                                alert($(this).val());
                                $(this).attr("checked");
                            });
                        });
                    </script>-->
</head>
<body>
<p style="background-image:url(img/323a45-2880x1800.png)"><font color="#FFFFFF" size="+3">Rate And Comment About Driver </font></p><br>
<h1 style="color:#CC6600"><?php	
echo $row1[1]," ",$row1[2];
?></h1><br>			Ratings:-<br />
<form action="rating.php" method="post">
  		                 <fieldset id='demo2' class="rating">
                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4half" name="rating" value="4.5" />
                        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3half" name="rating" value="3.5" />
                        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2half" name="rating" value="2.5"  />
                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1half" name="rating" value="1.5" />
                        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input class="stars" type="radio" id="starhalf" name="rating" value="0.5" />
                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

                    </fieldset>
<br /><br />

Comment:<textarea name="taComment" cols="20" rows="5"></textarea>		<br /><br />
<?php
if(isset($_SESSION['error1']))
{
unset($_SESSION['error1']);
?>
<h3 style="color:#FF0000;">Please Rate or comment </h3>
 
<?php
} ?>
<br>
<br>
<input style="margin-top:-20px; margin-left:80px; margin-bottom:2px; " type="submit" value="submit" class="button-3" >
	</form>
                    <!-- Demo 2 end -->

                    <br><br><br>
</body></html>
<?php
}
else
	header("location:../index.html");
?>