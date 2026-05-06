<h1>Kapcsolat</h1>

<form action="./logicals/uzenet_kuld.php" method="post" onsubmit="return ellenoriz();">

    <label>Név:</label><br>
    <input type="text" name="nev" id="nev"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" id="email"><br><br>

    <label>Üzenet:</label><br>
    <textarea name="uzenet" id="uzenet"></textarea><br><br>

    <button type="submit">Küldés</button>
</form>

<script>
function ellenoriz() {
    let nev = document.getElementById("nev").value;
    let email = document.getElementById("email").value;
    let uzenet = document.getElementById("uzenet").value;

    if(nev == "" || email == "" || uzenet == "") {
        alert("Minden mezőt ki kell tölteni!");
        return false;
    }

    if(!email.includes("@")) {
        alert("Hibás email!");
        return false;
    }

    return true;
}
</script>