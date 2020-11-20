window.onload = function() {
    let button = document.getElementById("lookup");
    let button1 = document.getElementById("lookup1");
    button.addEventListener("click", function(e) {
        e.preventDefault();
        var country = document.getElementById("country").value;
        var httpRequest = new XMLHttpRequest();
        var url = "world.php?country=" + country;
        httpRequest.onreadystatechange = function() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var response = httpRequest.responseText;
                    console.log(response);
                    let inputmessage = document.getElementById("result");
                    inputmessage.innerHTML = response;
                } else {

                    alert('There was a problem with the request.');
                }
            }
        }
        httpRequest.open('GET', url, true);
        httpRequest.send();

    });

    button1.addEventListener("click", function(e) {
        e.preventDefault();
        var country = document.getElementById("country").value;
        var cities = document.getElementById("country").value;
        var httpRequest = new XMLHttpRequest();
        var url = "world.php" + "?country=" + country + "&context=cities";
        httpRequest.onreadystatechange = function() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var response = httpRequest.responseText;
                    console.log(response);
                    var inputmessage = document.getElementById("result");
                    inputmessage.innerHTML = response;
                } else {

                    alert('There was a problem with the request.');
                }
            }
        }
        httpRequest.open('GET', url, true);
        httpRequest.send();

    });

}