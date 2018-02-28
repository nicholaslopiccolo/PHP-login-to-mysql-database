function PostData() {

    var usr = document.getElementsByName("username")[0].value;
    var pwd = document.getElementsByName("password")[0].value;

    if (usr !== '' && pwd !== '') post(usr, pwd);
    else alert("uno o piu' campi vuoti");
}

function post(usr, pwd) {
    // 1. Istanziazione della richiesta (semplificata)

    var xhr;

    xhr = new XMLHttpRequest();

    // 2. Gestire la risposta del server

    xhr.onreadystatechange = function () {

        if (xhr.readyState === 4) {

            if (xhr.status >= 200 && xhr.status < 300) {

                if (xhr.responseText === 'utente non registrato') {
                    document.getElementById('error').innerHTML = xhr.responseText;
                }
                else {
                    window.location.href = 'success.html';
                }
            }
        }
    };

    // 3. Specificare metodo, URL e avviare le operazioni
    xhr.open('POST', 'main.php');

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("username=" + usr + "&password=" + pwd);
}
