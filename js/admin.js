const navItems = document.querySelectorAll('.nav-item');
const content = document.getElementById('dashboard-content');
const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('dashboard-nav');

function loadPage(page) {
    if (page === 'logout') {
        window.location.href = 'logout.php';
        return;
    }
    fetch(`pages/${page}.php`)
        .then(res => res.text())
        .then(data => content.innerHTML = data)
        .catch(() => content.innerHTML = "<p>Error loading content.</p>");
}

navItems.forEach(item => {
    item.addEventListener('click', () => {
        navItems.forEach(i => i.classList.remove('active'));
        item.classList.add('active');
        loadPage(item.getAttribute('data-page'));
        if (window.innerWidth <= 768) {
            nav.classList.remove('open');
            hamburgerIcon.classList.replace('fa-times', 'fa-bars');
        }
    });
});

hamburger.addEventListener('click', () => {
    nav.classList.toggle('open');
    if (nav.classList.contains('open')) {
        hamburgerIcon.classList.replace('fa-bars', 'fa-times');
    } else {
        hamburgerIcon.classList.replace('fa-times', 'fa-bars');
    }
});

document.getElementById('dashboard-content').addEventListener('submit', async function (e) {
    if (!e.target.classList.contains('delete-form')) return;
    e.preventDefault();

    if (!confirm('Are you sure you want to delete this project?')) return;

    const form = e.target;
    const projectId = form.getAttribute('data-id');
    const formData = new FormData();
    formData.append('delete_id', projectId);

    try {
        const res = await fetch('pages/delete-project-action.php', {
            method: 'POST',
            body: formData
        });

        if (res.ok) {
            form.closest('.project-card').remove();
        } else {
            alert('Delete failed');
        }
    } catch (err) {
        console.error(err);
        alert('Something went wrong.');
    }
});



loadPage('messages');