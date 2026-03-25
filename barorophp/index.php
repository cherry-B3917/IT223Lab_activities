<!DOCTYPE html>
<html>
<head>
    <title>AJAX + PHP Demo</title>
    <style>
        body { font-family: Arial; margin: 50px; }
        #status { margin-top: 10px; font-weight: bold; }
    </style>
</head>
<body>

<h2>Check Username Availability</h2>

<input type="text" id="username" placeholder="Enter username" onkeyup="checkUsername(this.value)">
<div id="status"></div>

<script>
async function checkUsername(username) {

    if (username.length === 0) {
        document.getElementById("status").innerHTML = "";
        return;
    }

    try {
        const response = await fetch("check_user.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "username=" + encodeURIComponent(username)
        });

        const data = await response.json();

        const statusBox = document.getElementById("status");
        statusBox.innerHTML = data.message;
        statusBox.style.color = data.available ? "green" : "red";

    } catch (error) {
        console.error("Error:", error);
    }
}
</script>

</body>
</html>
