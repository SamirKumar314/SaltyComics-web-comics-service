document.addEventListener("DOMContentLoaded", function(){
    fetch('load_comics.php')
        .then(res => res.text())
        .then(data => {
            const rows = document.querySelector("#rows");
            rows.innerHTML = data;  //replaces placeholders with real content data
        })
        .catch(err => {
            console.error("Failed to load comic cards:", err);
        })
        .finally(() => {
            console.log("Initial cards loaded");
        })
})
