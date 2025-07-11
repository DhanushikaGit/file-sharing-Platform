function shareFile(fileId) {
    const username = prompt("Enter username to share with:");
    if (username) {
        fetch('share.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `file_id=${fileId}&username=${username}`
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => alert('Error: ' + error));
    }
}