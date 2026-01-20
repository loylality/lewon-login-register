const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
const registerForm = document.getElementById("registerForm");
const loginForm = document.getElementById("loginForm");

registerForm.onsubmit = e => {
    e.preventDefault();
    fetch("design.php", {
        method: "POST",
        body: new FormData(registerForm)
    })
    .then(res => res.text())
    .then(data => {
        data = data.trim();
        if(data === "registered"){
            alert("Registration Successful");
            registerForm.reset(); 
        } else { alert(data); }
    });
};

loginForm.onsubmit = e => {
    e.preventDefault();
    fetch("design.php", {
        method: "POST",
        body: new FormData(loginForm)
    })
    .then(res => res.text())
    .then(data => {
        data = data.trim();
        if(data === "success"){
            window.location.href = "dashboard.php";
        } else { alert(data); }
    });
};
