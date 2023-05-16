var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

document.cookie = 'username=John Doe';

document.cookie = 'username=John Doe; expires=Thu, 18 Dec 2023 12:00:00 UTC';

document.cookie = 'username=John Doe; expires=Thu, 18 Dec 2023 12:00:00 UTC; path=/';