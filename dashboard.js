// Sidebar collapse
const sidebar = document.querySelector('.sidebar');
document.getElementById('toggleSidebar').addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
});

// Dark/Light mode toggle
document.getElementById('toggleDark').addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    if(document.body.classList.contains('dark-mode')){
        document.documentElement.style.setProperty('--bg','#1e1e2f');
        document.documentElement.style.setProperty('--card-bg','#2c2c3e');
        document.documentElement.style.setProperty('--text','#fff');
    } else {
        document.documentElement.style.setProperty('--bg','#f5f6fa');
        document.documentElement.style.setProperty('--card-bg','#fff');
        document.documentElement.style.setProperty('--text','#333');
    }
});

// Placeholder for charts (can integrate Chart.js later)
