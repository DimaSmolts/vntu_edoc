const updateWP = (postData) => {
    fetch('api/updateWPDetails', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            } else {
                // const embedElement = document.getElementById('pdfPreview');
                // const originalSrc = embedElement.getAttribute('src');
                // // Append a unique query parameter to force refresh
                // console.log(originalSrc.split('?'));
                // embedElement.setAttribute('src', originalSrc.split('?')[0] + '?t=' + new Date().getTime() + '&' + originalSrc.split('?')[1]);
            }
        })
        .catch(error => console.error('Post error:', error));
}