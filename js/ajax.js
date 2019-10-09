function ajax(method, url, payload, headers) {
    if (payload === undefined) {
        payload = null;
    }

    if (headers === undefined) {
        headers = {'Content-type': 'application/x-www-form-urlencoded'};
    }

    this.method = method;
    this.url = url;
    this.payload = payload;
    this.headers = headers;
    this.xmlHttp = new XMLHttpRequest();
}

ajax.prototype.send = function () {
    var ajaxObj = this;
    this.xmlHttp.open(this.method, this.url, true);
    for (name in this.headers) {
        this.xmlHttp.setRequestHeader(name, this.headers[name]);
    }
    this.xmlHttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (ajaxObj.onSuccess) {
                ajaxObj.onSuccess(this.responseText);
            }
        }
    }
    this.xmlHttp.send(this.payload);
}