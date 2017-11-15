function validateSignup(){
    $("#process-label").css("display","none");
    var uname = $("#su-inp-username").val(), email = $("#su-inp-email").val(), pwd = $("#su-inp-pwd").val(), cnfpwd = $("#su-inp-cnfpwd").val();
    
    var validname=false, validemail=false, validpwd=false, validcnfpwd=false;
    
    //name
    validname = uname!="";

    //email
    var patt = new RegExp("^[a-z][a-z0-9\.\-\_\+]{2,20}@(gmail|yahoo|outlook|hotmail|mail).(com|in|org|xyz|co)$");
    var res = patt.test(email);
    document.getElementById("su-email").className = res ? "icon ticker" : "icon into";
    validemail = res;
    
    //pwd
    var patt = new RegExp("[A-Za-z0-9\@\#\-\_\+\=\*]{6,15}");
    var res = patt.test(pwd);
    document.getElementById("su-pwd").className = res ? "icon ticker" : "icon into";
    validpwd = res;
    
    //cnfpwd
    if(res) {
       document.getElementById("su-cnfpwd").className = pwd==cnfpwd ? "icon ticker" : "icon into";
        validcnfpwd = pwd==cnfpwd;
    }
    else
        document.getElementById("su-cnfpwd").className = "icon into";
    
    $("#su-err-username").css("display", validname ? "none" : "block");
    $("#su-err-email").css("display", validemail ? "none" : "block");
    $("#su-err-pwd").css("display", validpwd ? "none" : "block");
    $("#su-err-cnfpwd").css("display", validpwd && pwd==cnfpwd ? "none" : "block");

    if ( validname && validemail && validpwd && validcnfpwd ) {
        $("#process-label").css({"display":"block", "color": "#3F51B5"}).html("Please wait. Processing signup...");
        $.ajax({
            type: "post",
            url: "signup.php",
            data: {"name":uname, "email":email, "pwd": pwd},
            statusCode: {
                500: function() {
                    $("#process-label").css("color", "tomato").html("Internal Server Error Occurred!");
                },
                404: function() {
                    $("#process-label").css("color", "tomato").html("Page Not Found!");
                }
            },
            success: function(res) {
                if(res=="1") {
                    $('#process-label').css("color", "#558B2F").html("Signup Success. Please login to continue.");
                }
                else {
                    $("#process-label").css("color", "tomato").html(res);
                }
            },
            error: function(err) {
                $("$process-label").css("color", "tomato").html("Some error occurred. Please try after sometimes.");
            }
        });
        //window.setTimeout(function(){ $("#process-label").css("display", "none"); }, 7000);
    }
}

function validateLogin() {
    console.log("check");
    $("#li-process-label").css("display","none");
    
    var email=$("#li-inp-email").val(), pwd=$("#li-inp-pwd").val();
    var validemail=false, validpwd=false;
    
    //email
    var patt = new RegExp("^[a-z][a-z0-9\.\-\_\+]{2,20}@(gmail|yahoo|outlook|hotmail|mail).(com|in|org|xyz|co)$");
    validemail = patt.test(email);
    
    //pwd
    var patt = new RegExp("[A-Za-z0-9\@\#\-\_\+\=\*]{6,15}");
    validpwd = patt.test(pwd);
    
    if(validemail && validpwd) {
        $("#li-process-label").css({"display":"block", "color":"#3F51B5"}).html("Authenticating.. Please wait");
        $.ajax({
           type: "post",
           url: "login.php",
           data: {"email":email, "pwd":pwd},
           statusCode: {
               500: function(){ $("#li-process-label").css("color", "tomato").html("Internal Server Error. Try after sometime."); }
           },
           success: function(res) {
               if(res=="1" || res=="0") {
                   window.location.href = "dashboard.php";
               } else {
                   $("#li-process-label").css("color","tomato").html(res);
               }
           },
           error: function(res) {
               
           }
        });
    } else {
        $("#li-process-label").css({"display":"block", "color":"tomato"}).html("Invalid Credentials.");
    }
}