<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<head>
      <title>Welcome To Net Banking</title>
	  <link rel="stylesheet" href='main.css'/>
</head>
<body>
     <?php //include 'Head_Foot/header.php'; ?>
     <div id="menu">
	    <!-- <ul>
	      <li>Sirvices</li>
	      <li>State Bank Collect</li>
	      <li>Security Tips</li>
	      <li>Apply Statebank Account</li>
         </ul> -->
     </div>
	  <div id='personal_banking'>
	    <label><span style="color:blue"> Personal</span> Banking</label>   <br/>
		 <a href="LoginSystem/index.php"><button id='pl'>LOGIN</button></a>
		 
		<footer style="color:rgb(10,10,10)">
		  Secure net banking portal provides personal banking services that give yout complete control
		  over all your banking demands online.
		  
		</footer>
	  </div>
	  
	  <div id='corporate_banking'>
	    <label><span style="color:blue"> Corporate</span> Banking</label>   <br/>
		 <a href="Admin_Login/index.php"><button id='pl'>LOGIN</button></a>
		 <footer style="color:rgb(10,10,10)">
		  Corporate banking application provides features to administrator and manage non personal account online
		</footer>
	  </div>
	  
	  <div id='add'>
	     
	  </div>
	  <?php //include '/Head_Foot/footer.php'; ?>
</body>
</html>