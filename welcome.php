<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/log_style.css">

    </head>

    <body onload=getTime();>        

        <div class="mainDiv"> <h1 align='center'>My Web Application</h1> </div>
        <br>
        <div class="leftDiv">
            <a class="button" href="welcome.php">Home</a>
            <a class="button" href="logging.php">Log</a>

        </div>
        <table align='center'>
            <tr>
                <th><b>Local Machine</b></th>
                <th><b>Server Machine</b></th>
            </tr>
            <tr>
                <td><span id = 'ltime'></span></td>
                <td><span id = 'stime'></span></td>
            </tr>
            <tr>
                <td><span id = 'ldate'></span></td>
                <td><span id = 'sdate'></span></td>
            </tr>
        </table>
        <br><br>
        <div align="center"><button align="center" onclick="insert_data()">Click me</button></div><br><br>


        <script src="lib/moment.min.js"></script>
        <script src="js/aliases.js"></script>
        <script src="js/ajax.js"></script>
        <script src="js/timeFunctions.js"></script>
    </body>
</html>
