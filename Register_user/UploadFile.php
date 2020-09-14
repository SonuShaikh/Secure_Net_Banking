<?php
    $username = 'Sonu';
    @$file_name = $_FILES['file']['name'];
	@$file_type = $_FILES['file']['type'];
	@$file_size = $_FILES['file']['size'];
	@$file_tmp  = $_FILES['file']['tmp_name'];
	$extension  = strtolower(substr($file_name,strpos($file_name,'.')+1));
	if(isset($file_name)){
		if(!empty($file_name)){
			 if($extension =='png' || $extension =='jpeg' || $extension =='jpg' || $extension =='pdf'){
				if($file_size <= 10643212 ){
					
						$location = '../User_Data/';
						if(move_uploaded_file($file_tmp,$location.$file_name)){
							echo 'File Uploaded Successfuly';
						}else{
							echo 'Error Occure While Uploading File.';
						}
					
				}else{
					echo 'File Size More Than Enougth.'.$file_size;
				}
			}else{
				echo 'Only png or jpeg or jpg or pdf File are Allow.';
			}
		}else{
			echo 'Upload File Please';
		}
	}
?>
<form action="UploadFile.php" Method="POST" enctype="multipart/form-data">		      
			  <label class="head">Proof Of Identifiaction:</label> <br/>
			  <label>Any Goverment photo Id Card</label>
			  <input type="file" name="file" />
			  <input type="submit" value="upload"/><br/>
</form>