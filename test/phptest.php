<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>

            function gettest()
            {
                var date = 12;
                var time = 10;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function ()
                {

                    if (this.readyState === 4 && this.status === 200)
                    {
                        var responseArray = this.responseText.split(",");
                        document.getElementById("sdate").innerHTML = responseArray[0];
                        document.getElementById("stime").innerHTML = responseArray[1];
                    }

                };

                xmlhttp.open("GET", "testphp.php?date="+date+"&&time="+time, true);
                xmlhttp.send();


            }
        </script>
    </head>
    <body onload=gettest()>
        <p id="sdate"></p>
        <p id="stime"></p>
    </body>
</html>
