const greetings = [
    "Welcome", "Bienvenido", "Bonjour", "Willkommen", "স্বাগতম",
    "ようこそ", "欢迎", "환영합니다", "Добро пожаловать", "أهلا بك"
];

let index = 0;
const greetingEl = document.getElementById('greeting');
const welcomeScreen = document.getElementById('welcome-screen');
const introHeading = document.getElementById('intro-heading');

const delayPerGreeting = 300;
const totalDuration = greetings.length * delayPerGreeting;

const interval = setInterval(() => {
    greetingEl.textContent = greetings[index];
    index++;

    if (index >= greetings.length) {
        clearInterval(interval);

        setTimeout(() => {
            welcomeScreen.classList.add('hidden');
            document.body.classList.add('loaded');

            introHeading.classList.add('animate-blur');
        }, delayPerGreeting);
    }
}, delayPerGreeting);


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
            }, 2000);
        })
        .catch(err => {
            status.textContent = 'Failed to copy';
            status.classList.add('active');
            console.error('Copy error:', err);
        });
});

document.addEventListener('DOMContentLoaded', () => {
    const projectsMap = {};
    projectData.forEach(p => {
        projectsMap[p.id] = {
            title: p.title,
            subtitle: p.subtitle,
            description: p.description,
            image: p.image,
            tags: p.tags ? p.tags.split(',').map(tag => tag.trim()) : [],
            demoLink: p.demo,
            sourceCode: p.github,
            text: p.text
        };
    });

    const modal = document.getElementById('project-modal');
    const modalBody = document.getElementById('modal-body');
    const template = document.getElementById('project-template');
    const closeModalBtn = document.getElementById('modal-close');

    document.querySelectorAll('.project-image').forEach(project => {
        project.addEventListener('click', (e) => {
            e.preventDefault();
            const id = project.getAttribute('data-id');
            const data = projectsMap[id];

            if (data) {
                const clone = template.content.cloneNode(true);
                clone.getElementById('modal-title').textContent = data.title;
                clone.getElementById('modal-description').textContent = data.subtitle;
                clone.getElementById('modal-text').textContent = data.description;
                clone.getElementById('modal-image').src = data.image;

                const demoBtn = clone.getElementById('modal-demo');
                demoBtn.href = data.demoLink;
                clone.getElementById('modal-github').href = data.sourceCode;
                clone.getElementById("modal-text").textContent = data.text;

                if (!data.demoLink) {
                    demoBtn.classList.add("disabled-project");
                }

                const tagHolder = clone.querySelector(".project-tag-holder");
                data.tags.forEach(tag => {
                    const tagEl = document.createElement("span");
                    tagEl.className = "project-tag";
                    tagEl.textContent = tag;
                    tagHolder.appendChild(tagEl);
                });

                modalBody.innerHTML = '';
                modalBody.appendChild(clone);
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        });
    });

    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    });

    modal.addEventListener('click', e => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    });
});

document.querySelector('.contact-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const button = form.querySelector('button');
    const btnText = button.querySelector('.btn-text');
    const spinner = button.querySelector('.spinner');

    button.disabled = true;
    btnText.textContent = "";
    spinner.classList.remove('hidden');

    try {
        const res = await fetch('contact_form.php', {
            method: 'POST',
            body: formData
        });

        const result = await res.json();
        if (result.status === 'success') {
            document.getElementById('success-modal').classList.remove('hidden');
            form.reset();
        } else {
            alert("Error: " + result.message);
        }
    } catch (err) {
        console.error("Fetch failed:", err);
        alert("Something went wrong. Please try again.");
    } finally {
        button.disabled = false;
        btnText.textContent = "Send Message";
        spinner.classList.add('hidden');
    }
});

function closeModal() {
    document.getElementById('success-modal').classList.add('hidden');
}
