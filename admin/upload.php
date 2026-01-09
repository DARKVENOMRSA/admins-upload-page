<?php
require "auth.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $vpn = $_POST['vpn'];
  $file = $_FILES['file'];

  $targetDir = "../storage/$vpn/";
  if (!is_dir($targetDir)) die("Invalid VPN");

  move_uploaded_file($file['tmp_name'], $targetDir . basename($file['name']));
  echo "Uploaded successfully<br><br>";
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Upload Config</h2>

<form method="post" enctype="multipart/form-data">
<select name="vpn">
<option value="ha">HA Tunnel</option>
<option value="httpcustom">HTTP Custom</option>
<option value="httpinjector">HTTP Injector</option>
<option value="sshcustom">SSH Custom</option>
<option value="opentunnel">Open Tunnel</option>
<option value="netmod">NetMod</option>
<option value="kpntunnelrev">KPN Tunnel Rev</option>
<option value="minapronet">Mina Pro Net</option>
<option value="linklayer">LinkLayer VPN</option>
<option value="tlstunnel">TLS Tunnel</option>
<option value="nvptunnel">NVP Tunnel</option>
</select><br><br>

<input type="file" name="file" required><br><br>
<button>Upload</button>
</form>
</body>
</html>
