document.addEventListener("DOMContentLoaded", function(){
    fetch('load_comics.php')
        .then(res => res.text())
        .then(data => {
            const row = document.querySelector(".row");
            row.innerHTML = data;  //replaces placeholders with real content data
        })
        .catch(err => {
            console.error("Failed to load comic cards:", err);
        });
});