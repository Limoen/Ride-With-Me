<?php
	include_once("logica.php");
	
?><!doctype html>
<html lang="en">
<head>
<?php include_once("includes/head.php");?>
	
	
</head>
<body>

	<header>

	</header>
	<div data-role="page">
		<div data-theme="a" data-role="header">
        <a data-role="button" data-rel="back" href="#page1" data-icon="arrow-l" data-iconpos="left" class="ui-btn-left">back</a>
        <a data-role="submit" href="#page1" data-icon="arrow-r" data-iconpos="right" class="ui-btn-right" name="btnSignup">Sign up</a>
        <h3>
            Create account
        </h3>
	</div>
	<!-- go to previous page -->

	<section id="signup">
		<h2>New to Ride with.me? <span>Sign Up</span></h2>
		<div id="feedback">
		<?php if(empty($feedback)) { ?>
		<h1></h1>
		<?php } else { ?>
		<h1><?php echo $feedback ?></h1>
		<?php } ?>
		</div>
		
		<form class="form-horizontal" id="account-form" action="searchRides.php" method="post" enctype="multipart/form-data" data-ajax="false">
            <input type="text" name="name" placeholder="Username" />
            <input type="text" name="surname" placeholder="Full Name" />
            <input name="phone" id="textinput2" placeholder="Phone" value="" type="tel">
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <textarea  name="bio" id="bio" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset" placeholder="About me"></textarea>
            <h2>Living information</h2>
            <div data-role="fieldcontain">
                
                <select id="selectmenu1" name="country">
                	<option>
                        Select Country
                    </option>
                    <option>
                        ------
                    </option>
                    <option value="Belgium">
                        Belgium
                    </option>
                    <option value="France">
                        France
                    </option>
                </select>
                 <br />
                 <br />
                <select id="selectmenu1" name="state">
                	<option>
                        Select State
                    </option>
                    <option>
                        ------
                    </option>
                    <option value="East Flanders">
                        East Flanders
                    </option>
                    <option value="West Flanders">
                        West Flanders
                    </option>
                    <option value="Flemish Brabant">
                        Flemish Brabant
                    </option>
                </select>
                <br />
                <br />
                <input type="text" placeholder="Zip code"/>
                
                <select id="selectmenu1" name="city">
                	<option>
                        Select City
                    </option>
                    <option>
                        -----------
                    </option>
                    <option value="Dendermonde">
                        Dendermonde
                    </option>
                    <option value="Baasrode">
                        Baasrode
                    </option>
                    <option value="Grimbergen">
                    	Grimbergen
                    </option>
                </select>
                <br />
                <br />
                <input type="text" name="street" placeholder="Street Name & Nr." />
                <input type="file" name="upload" id="upload"  />
                
                
                
                
             <div id="bug_image"  >
            <!--<?php
            if(isset($_POST['btnSignup']))
            {
                echo "<img src='uploads/".$newName."'/>";
                
            }
            else { ?>
                <img src="http://codiqa.com/static/images/v2/image.png" alt="image">
            <?php } ?>-->
            
                        </div>
            </div>
            
            
        
            <button type="submit" name="btnSignup" data-theme="b" >sign up for ridewith.me</button>
			
		</form>
	</section>
	</div>
	</div>
	</div>
</body>
</html>