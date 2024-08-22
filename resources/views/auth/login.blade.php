<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/a2dd6045c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">
    <link rel="icon" href="{{asset('assets/images/logo_sena.png')}}">
    <title>ADSO-9</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Sign In Form -->
                <form action="#" class="sign-in-form">
                    <h2 class="title">Iniciar sesión</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <input type="submit" value="Iniciar sesión" class="btn solid" />
                    <!-- <p class="social-text">O inicia sesión con redes sociales</p> -->
                </form>

                <!-- Sign Up Form -->
                <form action="#" class="sign-up-form">
                    <img class="sena" src="{{asset('assets/images/Quienes-somos.png')}}" alt="">
                </form>
            </div>
        </div>

        <div class="panels-container">
            <!-- Left Panel -->
            <div class="panel left-panel">
                <div class="content">
                    <h3>Conoce mas</h3>
                    <p>
                        ¡Descubre la mision que tiene el sena para la educacion que presta!                      
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Ver mas</button>
                </div>
                <img src="{{ asset('https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png') }}" class="image" alt="" />
            </div>

            <!-- Right Panel -->    
            <div class="panel right-panel">
                <div class="content">
                    <h3>¿Eres uno de nuestros valiosos miembros?</h3>
                    <p>
                        Gracias por ser parte de nuestra comunidad. Tu presencia enrriquece nuestras experiencias compartidas. ¡Continuemos nuestro viaje juntos! 
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Iniciar sesión</button>
                </div>
                <img src="https://i.ibb.co/nP8H853/Mobile-login-rafiki.png" class="image" alt="" />
            </div>
        </div>
    
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
