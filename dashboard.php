<?php
    error_reporting(0);
    session_start();
    if( !isset($_SESSION["id"]) || empty($_SESSION["id"]) ) header("Location: index.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Capstone Work</title>
        <link rel="stylesheet" href="css/dashboard.css" >
        <style>
            ul {
                padding-left: 0px;
            }
            li {
                list-style: none;
                padding-bottom: 0.5em;
            }
            li:first-child {
                font-family: arial;
                font-weight: bold;
                font-size: larger;
                color: #E65100;
            }
            li>a {
                color: #795548; 
                text-decoration: none;
                font-family: georgia;
                font-weight: bold;
                font-size: small;
            }
            .block {
                display: inline-block;
                margin-right: 0.7em;
            }
            .button {
                background-color: #4CAF50;
                border: none;
                border-radius: 6px;
                color: white;
                padding: 6px 24px;
                text-align: center;
                text-decoration: none;
                /*display: inline-block;*/
                font-size: 14px;
            }
            img {
                width: 30px;
                height: 30px;
            }
        </style>
    </head>
    <body>
        <ul>
            <li>Welcome <?php echo $_SESSION["name"]; ?> !</li>
            <li><a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></li>
        </ul>
        
        <table cellspacing="3">
            <tr>
                <td><h3>Recorded Data</h3></td>
                <td><input type="button" class="button" onclick="update()" value="Update"></td>
                <td id="loading" style="display: none; padding: 15px"><img src="images/loading.gif" alt="loading..."></img></td>
                <td><h5>Last updated at 06:19:05 PM</h5></td>
            </tr>
        </table>
        
        <table class="responstable">
          <tr>
            <th>ID</th>
            <th>Day Dream</th>
            <th>Time</th>
          </tr>
          
          <tr>
            <td>1</td>
            <td>Steve</td>
            <td>01:22:11 PM</td>
          </tr>
        </table>
        <script type="text/javascript" src="js/custom.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>