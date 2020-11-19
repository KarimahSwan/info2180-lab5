window.onload = function() {
    var button = document.getElementById("lookup");
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