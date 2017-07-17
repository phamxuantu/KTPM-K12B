function showForm()
{
    document.getElementById("login-modal").style.display = "flex";
    document.getElementById("background").style.display = "block"

}
function hideForm() {
    document.getElementById("background").style.display = "none";
    document.getElementById("login-modal").style.display = "none";
    document.getElementById("search").style.display = "none";
}

function search() {
    document.getElementById("search").style.display = "flex";
    document.getElementById("background").style.display = "block"
}