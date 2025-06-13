
//Variables principales
const signUpButton = document.getElementById("signUpButton");
const signInButton = document.getElementById("signInButton");
const signInForm = document.getElementById("signIn");
const signUpForm = document.getElementById("signUp");

signUpButton.addEventListener("click",function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})

signInButton.addEventListener("click", function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})

// ✅ Define la función primero
function handleCredentialResponse(response) {
  fetch('google-login.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
  body: 'id_token=' + encodeURIComponent(response.credential)
})
.then(res => res.json())
.then(data => {
  if (data.status === 'success') {
    window.location.href = 'homepagee.php';
  } else {
    alert('Error: ' + data.message);
  }
})
.catch(err => {
  console.error("Error al procesar el login:", err);
  alert("Error inesperado: " + err.message);
});
}
// ✅ Luego, en window.onload, inicializas todo
window.onload = () => {
  google.accounts.id.initialize({
    client_id: '61485057643-gf4pe9dlu47htnev33g7ut1u358f3n3b.apps.googleusercontent.com',
    callback: handleCredentialResponse
  });

  // Opcional: renderiza un botón oficial de Google
  google.accounts.id.renderButton(
    document.getElementById("googleLogin"),
    { theme: "outline", size: "large" }
  );
};