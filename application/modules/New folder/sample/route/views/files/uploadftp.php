<!--<form method="post" enctype="multipart/form-data" action="http://192.168.254.106/rmn/index.php/uploadftp">
    <label>Choose File</label>
    <input type="file" name="file" />
    <input type="submit" name="submit" value="Upload">
</form>-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Sample FTP</title>
</head>
<body>
<form action="uploadfile.php" method="post" enctype="multipart/form-data"> 
<label>Set FileName:</label><input type="text" name=".fn" id="_fn" value=""><br />
<label>File:</label><input type="file" value="" name=".f" id="_f" /><br />
<input type="submit" value="upload" />	
</form>
    
    
    
    
</br>
<form action="http://192.168.254.111/rmn/index.php/playlist/playlist/test_up" method="post" enctype="multipart/form-data">
<input type="file" name="myfile[]" id="myfile" multiple>
<input type="submit" name="submit" id="submit" value="submit"/>

</br>
<form method="post" action="http://192.168.254.111/rmn/index.php/submit" enctype="multipart/form-data">
    <input type="file" name="userfile[]" id="userfile"  multiple="" accept="image/*">
        <input type="submit" name="submit" id="submit" value="submit"/>
</form>

</br>

<form method="post" action="http://192.168.254.111/rmn/index.php/playlist/playlist/do_upload" enctype="multipart/form-data">
    <input type="file" multiple name="images[]" size="20" />
        <input type="submit" name="submit" id="submit" value="submit"/>
</form>

</body>
</html>
