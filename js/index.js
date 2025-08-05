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
    const projectData = {
        project1: {
            title: "booklog",
            description: "Track, review, and reflect on your reading journey",
            image: "/image/project/project1.png",
            tags: ["React", "Express", "MongoDB", "Node.JS", "CSS", "Bootstrap"],
            demoLink: "https://booklog-07k6.onrender.com/",
            sourceCode: "https://github.com/sifatul-islam-onik/bookLog",
            text: "A minimalist yet powerful app designed for tracking your reading journey. Users can log books, set reading goals, mark progress, and write reflections or reviews. It provides visual statistics and reminders to keep readers motivated. Developed using React with persistent cloud storage integration."
        },
        project4: {
            title: "lostlink",
            description: "Your go-to platform for lost & found items",
            image: "/image/project/project4.png",
            tags: ["Laravel", "PHP", "HTML", "CSS", "JavaScript", "MySQL"],
            demoLink: "https://lostlink.great-site.net/",
            sourceCode: "https://github.com/sifatul-islam-onik/Lost-and-Found",
            text: "A streamlined web portal for reporting and recovering lost items. It enables users to post lost/found items with detailed information, images, and contact details. The system matches potential lost and found reports automatically. Built with a focus on accessibility and efficient search, using modern frontend and backend technologies."
        },
        project2: {
            title: "chatterbox",
            description: "Connect, share, and chat in real-time",
            image: "/image/project/project2.png",
            tags: ["Android", "Java", "XML", "Firebase"],
            demoLink: "",
            sourceCode: "https://github.com/sifatul-islam-onik/Online-Chatting-App",
            text: "A vibrant and interactive social media platform for Android. It allows users to post updates, share media, chat in real-time, and engage with a growing community. The app features a sleek UI, notification system, and profile customization. Developed natively for Android with Firebase backend support.",
            disabled: "disabled-project"
        },
        project3: {
            title: "store management system",
            description: "Smart desktop tool for inventory and item tracking",
            image: "/image/project/project3.png",
            tags: ["Desktop Application", "JavaFX", "FXML", "MySQL"],
            demoLink: "",
            sourceCode: "https://github.com/sifatul-islam-onik/Store-Management-System",
            text: "A robust desktop application designed for small to medium-sized businesses to manage inventory and item records. Features include item addition, categorization, stock alerts, transaction logs, and report generation. Built using Electron with a local database for offline-first capability and high performance.",
            disabled: "disabled-project"
        },

    };

    const modal = document.getElementById('project-modal');
    const modalBody = document.getElementById('modal-body');
    const template = document.getElementById('project-template');
    const closeModalBtn = document.getElementById('modal-close');

    document.querySelectorAll('.project-image, .project-modal-link').forEach(project => {
        project.addEventListener('click', (e) => {
            e.preventDefault();
            const id = project.getAttribute('data-id');
            const data = projectData[id];

            if (data) {
                const clone = template.content.cloneNode(true);
                clone.getElementById('modal-title').textContent = data.title;
                clone.getElementById('modal-description').textContent = data.description;
                clone.getElementById('modal-image').src = data.image;
                const demoBtn = clone.querySelector(".work-button:nth-child(1)");
                demoBtn.href = data.demoLink;
                clone.querySelector(".work-button:nth-child(2)").href = data.sourceCode;
                clone.getElementById("modal-text").textContent = data.text;

                if (data.disabled) {
                    demoBtn.classList.add(data.disabled);
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
