const emailLink = document.getElementById('copy-email');
const status = document.getElementById('copy-status');
const email = "sifatul.islam.onik@gmail.com";

emailLink.addEventListener('click', function (e) {
    e.preventDefault();
    navigator.clipboard.writeText(email)
        .then(() => {
            status.textContent = 'email copied!';
            status.classList.add('active');
            setTimeout(() => {
                status.classList.remove('active');
            },2000);
        })
        .catch(err => {
            status.textContent = 'Failed to copy';
            status.classList.add('active');
            console.error('Copy error:', err);
        });
});