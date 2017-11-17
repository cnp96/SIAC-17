<?php
    error_reporting(0);
    session_start();
    if( !isset($_SESSION["id"]) || empty($_SESSION["id"]) ) header("Location: index.php");
    else { 
        $_SESSION["callupdate"] = true; 
        unset($_SESSION["ts"]);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Capstone Work</title>
        <link rel="stylesheet" href="css/dashboard.css" >
        <link rel="stylesheet" href="css/bootstrap.min.css" >
    </head>
    <body>
    
        <!-- Button trigger modal -->
        <button type="button" id="launchModal" style="display: " class="btn btn-primary" data-toggle="modal" data-target="#addPhone">
          Launch demo modal
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="addPhone" tabindex="-1" role="dialog" aria-labelledby="addPhoneLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addPhoneLabel">Add Mobile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div>
                  <p>Add extra security to your account.</p>
                  <div>
                    <p style="display: inline-block"><b>Mobile : </b></p>
                    <input type="text" id="mobileNo" placeholder="1234567890" >
                    <button id="send" type="button" class="btn btn-warning">Send</button>
                    <div class="clear"></div>
                  </div>
                  <div id="otpresponse" style="display: none">
                    <p class="otplabel" id="otplabel">An OTP has been sent to you mobile.</p>
                    <p id="otp" style="display: inline-block"><b>OTP : </b></p><input type="text" id="otp-inp" placeholder="1234" >
                  </div>
                </div>             
              </div>
              <div class="modal-footer">
                <button type="button" style="display: none" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Verify Mobile</button>
              </div>
            </div>
          </div>
        </div>
        
        <ul>
            <li style="margin-top: 15px;">
                <h4 style="display: inline-block;">Welcome <?php echo $_SESSION["name"]; ?> !</h4>
                <input type="button" value="Logout" onclick="logout()" class="button logout-btn">
            </li>
            <li><a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></li>
        </ul>
        <table style="width: 100%" border="0" cellspacing="3">
            <tr>
                <td style="width: 15%"><h3>Recorded Data</h3></td>
                <td><input type="button" class="button" onclick="update()" value="Update"></td>
                <td id="loading" style="display: none;"><img src="images/loading.gif" alt="loading..."></img></td>
                <td><h6 id="timestamp">Last updated on dd/MM/yyyy at --:--:--</h6></td>
                <td><h6 class="updates"><span id="updatecount">--</span> new updates !</h6></td>
                <td>
                    <h6 style="display: inline-block">Set Refresh Interval : </h6>
                    <div class="styled-select blue semi-square" style="display: inline-block; vertical-align: middle;">
                      <select id="interval" onchange="setUpdateInterval()">
                        <option selected="selected" value="manual">Manual</option>
                        <option value="5">5 Sec(Optimal)</option>
                        <option value="1">1 Sec(Extremely fast)</option>
                        <option value="3">3 Sec(Fast connection)</option>
                        <option value="10">10 Sec(Slow Connection)</option>
                      </select>
                    </div>
                </td>
            </tr>
        </table>
        <input type="hidden" id="recordcount" value="-1">
        <table class="responstable" id="records">
          <tr>
            <th>Day Dream</th>
            <th>Time</th>
          </tr>
        </table>
        
        <script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
		<?php
            if( !isset($_SESSION["ts"]) || (isset($_SESSION["callupdate"]) && $_SESSION["callupdate"]==true) ) {
                if( $_SESSION["callupdate"] ) $_SESSION["callupdate"]=false;
                echo '<script type="text/javascript">$(document).ready(function(){ update(); });</script>';
            }
        ?>

    </body>
</html>