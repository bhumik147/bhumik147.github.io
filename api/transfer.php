<html>
<body>

  <?php


  // $ftp_server="192.168.0.106";
  $ftp_server=$_POST["ip"];
  $ftp_port="2121";
  $ftp_user_name="localhost";
  $ftp_user_pass="";
  $selected_file = $_FILES['file']['tmp_name'];
  $folder_name="GoVideo/Playlist1/";
  $remote_file = $folder_name.$_FILES['file']['name'];
  // set up basic connection
  $conn_id = ftp_connect($ftp_server,$ftp_port) or die("Couldn't connect to $ftp_server");

  // login with username and password
  $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("Couldn't login to $ftp_server");

  // upload a file
  if (ftp_put($conn_id, $remote_file, $selected_file, FTP_ASCII)) {
    echo "successfully uploaded $remote_file\n";
    exit;
  } else {
    echo "There was a problem while uploading $remote_file\n";
    exit;
  }
  // close the connection
  ftp_close($conn_id);
  ?>
</body>
</html>
