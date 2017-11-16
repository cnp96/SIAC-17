function validateSignup(){
    
    var uname = $("#su-inp-username").val(), email = $("#su-inp-email").val(), pwd = $("#su-inp-pwd").val(), cnfpwd = $("#su-inp-cnfpwd").val();
    
    var validemail=false, validpwd=false, validcnfpwd=false;

    //email
    var patt = new RegExp("^[a-z][a-z0-9\.\-\_\+]{2,20}@(gmail|yahoo|outlook|hotmail).(com|in|org|xyz|co)$");
    var res = patt.test(email);
    document.getElementById("su-email").className = res==true ? "icon ticker" : "icon into";
    validemail = res;
    
    //pwd
    var patt = new RegExp("[A-Za-z0-9\@\#\-\_\+\=\*]{6,15}");
    var res = patt.test(pwd);
    document.getElementById("su-pwd").className = res==true ? "icon ticker" : "icon into";
    validpwd = res;
    
    //cnfpwd
    if(res) {
       document.getElementById("su-cnfpwd").className = pwd==cnfpwd ? "icon ticker" : "icon into";
        validcnfpwd = pwd==cnfpwd;
    }
    else
        document.getElementById("su-cnfpwd").className = "icon into";
    

    $("#su-err-email").css("display", validemail ? "none" : "block");
    $("#su-err-pwd").css("display", validpwd ? "none" : "block");
    $("#su-err-cnfpwd").css("display", validpwd && pwd==cnfpwd ? "none" : "block");

    if (validemail && validpwd && validcnfpwd) {
        $("#process-label").css({"display":"block", "color": "#3F51B5"}).html("Please wait. Processing signup...");
        $.ajax({
            type: "post",
            url: "signup.php",
            data: {"name":uname, "email":email, "pwd": pwd},
            statusCode: {
                500: function(){
                    $("#process-label").css("color", "tomato").html("Internal Server Error Occurred!");
                },
                404: function(){
                    $("#process-label").css("color", "tomato").html("Page Not Found!");
                }
            },
            success: function(res) {
                if(res=="1") {
                    $('#process-label').css("color", "#558B2F").html("Signup Success. Please login to continue");
                }
                else {
                    $("#process-label").css("color", "tomato").html(res);
                }
            },
            error: function(err) {
                $("$process-label").css("color", "tomato").html("Some error occurred. Please try after sometimes.");
            }
        });
        //window.setTimeout(function(){ $("#process-label").css("display", "none"); }, 2500);
    }
}

function validateLogin() {
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
               if(res==1 || res==0) {
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

function update() {
    $("#loading").css("display","inline-block");
    $.ajax({
       type: "get",
       url: "update.php",
       success: function(res) {
           res = jQuery.parseJSON(res);
           
            // Failsafe for no records
           console.log([res, typeof res]);
           if(res==-2) {
                console.log("No Records in DB.");
                res = 0;
                $("#recordcount").val("-2");
                $("#records tr:gt(0)").remove();
                st = "<tr><td colspan='2'>No Records Yet.</td></tr>";
                $("#records tr:first").after(st);
           }
           else if(res==0) {
                console.log("No Updates");
           }
           else if(res==-1){
               console.log("Server issues! Please Try after sometime.");
               alert("Server Issues! Try after sometime");
           }
           else {
                var st = "";
                for(var i in res){
                //   console.log(res[i]);
                //   st+="<tr><td>"+res[i].id+"</td>";
                   st+="<td>"+res[i].daydream+"</td>";
                   st+="<td>"+res[i].time+"</td></tr>";
                }
                if( $("#recordcount").val()=="-2" ) {
                    $("#records tr:eq(1)").remove();
                    $("#recordcount").val("1");
                }
                $("#records tr:first").after(st);
           }
           
           $("#updatecount").html(res.length || res);
           $("#loading").css("display","none");
           updateTime();
       },
       error: function(err) {
           $("#loading").css("display","none");
       }
    });
}

function updateTime() {
    var d = new Date();
    var time = "Last updated on " + d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear() + " at ";
    time += d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    $("#timestamp").html(time);
}

function logout() {
    window.location.href = "logout.php";
}