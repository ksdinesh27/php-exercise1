

function initClocks()
{
    var refresh = 1000; // Refresh rate in milli seconds
    timeout = setTimeout('getTime();', refresh);
}

function getTime()
{
    refreshLocalTime();
    var get = new ajax("GET", "serverTime.php");
    get.onSuccess = function (responseText) {
        var responseArray = responseText.split(",");
        document.getElementById("sdate").innerHTML = responseArray[0];
        document.getElementById("stime").innerHTML = responseArray[1];
    };
    get.send();

    tt = initClocks();
}

function refreshLocalTime()
{
    var date = moment().format("DD/MM/YYYY");
    var time = moment().format("hh:mm:ss")
    document.getElementById("ldate").innerHTML = date;
    document.getElementById("ltime").innerHTML = time;
}

function insert_data()
{
    var date = moment().format("DD/MM/YYYY") + " " + moment().format("hh:mm:ss");
    var url = "log/insert?date=" + uriParam(date);
    var get = new ajax("GET", url);
    get.send();
}

function select_data()
{
    var date = '';
    var url = "log/show?date=" + uriParam(date);
    var get = new ajax("GET", url);
    get.onSuccess = function (responseText) {
        document.getElementById("content").innerHTML = responseText;

    };
    get.send();
}

