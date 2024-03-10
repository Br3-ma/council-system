<div>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In | Council</title>
  <link rel="icon" href="fav.webp">
  @livewireStyles
  <style>

@import url("https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap");
:root {
  --remReset: 62.5%;
}
html {
  font-size: var(--remReset);
}
body {
  font-family: "Bricolage Grotesque", sans-serif;
  font-style: normal;
  font-size: 1.4rem;
  background-color: #00a47b;
  background-image:none;
  transition-property: margin;
  transition-duration: 1s;
  transition-timing-function: linear;
  transition: background-image 2s smooth;
}
.login-container {
  background-color: #fff;
  width: 100%;
  height: 100vh;
  transition-property: border-radius, height;
  transition-duration: 1s;
  transition-timing-function: linear;
}
.login-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 42px 20px;
  max-width: 310px;
  margin: 0 auto;
  text-align: center;
}
.login-content p {
  font-size: 1.1rem;
  margin-top: 5rem;
}
.login-content p strong {
  color: #87a922;
}
.login-content_header {
  text-align: center;
}
.login-content_header span#logo {
  font-size: 1.8rem;
  font-weight: 800;
}
.login-content_header h2 {
  font-size: 3.5rem;
  line-height: 1;
  margin: 25px 0;
}
form {
  display: flex;
  flex-direction: column;
}
.login-form input {
  padding: 8px 16px;
  border-radius: 50px;
}
input {
  border: 1px solid #ccc;
  margin: 8px 0;
}
input[type="submit"] {
  border: none;
  background-color: #63a922;
  color: #fffacd;
  font-weight: 800;
  letter-spacing: 1.3px;
}
.login-netoworks {
  margin-top: 2rem;
}
.login-icons {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  margin: 20px;
}
ul.login-icons li {
  background-color: #9cdd91;
  padding: 8px 10px;
  border-radius: 8px;
}
@media screen and (min-width: 400px) {
  body {
    margin: 20px;
  }
  .login-container {
    border-radius: 1.6rem;
  }
}
@media screen and (min-width: 700px) {
  body {
    background-color: #58924a;
    background-image: url("public/images/cover/login.jpg");
    background-size:cover;
    background-repeat:no-repeat;
    background-position:center;
    height:100vh;
  }
  .login-container {
    position: absolute;
    right: 20px;
    max-width: 550px;
    height: 90%;
    top:20px;
  }
}
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-content">
      <div class="login-content_header">
        
        <span id="logo"> 
          
          <img width="50" src="logo.webp"
                        alt="illustration" />
                        <br>Nakonde Town Council
        </span>
        <h2>Sign In</h2>
      </div>
      <div>
        <form class="login-form" method="POST" action="{{ route('login') }}">
          @csrf
          <input type="email" name="email" autofocus autocomplete="username" placeholder="email">
          <input type="password" name="password" required autocomplete="password">
          <input type="submit" value="Login">
        </form>
        <div class="login-netoworks">
          {{-- <span>or sign up with</span>
          <ul class="login-icons">
            <li>
              <box-icon color="#87a922" type='logo' name='google'></box-icon>
            </li>
            <li>
              <box-icon color="#87a922" name='twitter' type='logo'></box-icon>
            </li>
            <li>
              <box-icon color="#87a922" type='logo' name='github'></box-icon>
            </li>
          </ul> --}}
        </div>
        <p>For administration use. <strong>(c) 2023 </strong>Powered by <strong>Broad vest.</strong></p>
      </div>
    </div>
    <div class="login-footer"></div>
  </div>
  @stack('modals')
  @livewireScripts
</body>

<!-- Mirrored from demo.tailadmin.com/signin by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jan 2024 13:49:29 GMT -->
</html>

</div>