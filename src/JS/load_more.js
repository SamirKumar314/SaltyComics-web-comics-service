const loaddiv = document.querySelector('#loaddiv')
loaddiv.addEventListener('click', function(e){
    // console.log(e.target.id);   //debug
    
    if (e.target.id === 'loadbutton' || e.target.id === 'newloadbutton') {
        loaddiv.innerHTML = `
        <button type="button" class="btn btn-secondary d-block mx-auto" disabled>
            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </button>
        `;
        fetch('./load_more.php')
        .then((response) => {
            return response.text()
        })
        .then((data) => {
            const loadContent = document.querySelector('#loadContent')
            loadContent.innerHTML += data
        })
        .catch((err) => {
            console.error('Failed to load comics: ', err)
        })
        .finally(() => {
            loaddiv.innerHTML = `
            <button type="button" class="btn btn-primary d-block mx-auto" id="newloadbutton">
                Load more
            </button>
            `;
            console.log('More cards loaded')
        })
    }
})