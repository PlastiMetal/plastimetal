<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="/laravel/SisVtaPlastiMetalLV10/public/dist/css/style.css">
<!------ Include the above in your HEAD tag ---------->
<form action="{{ route('login') }}" method="POST">

    @csrf
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2"
                class="tab"></label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Ingresa tu correo electrónico" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </div>
</form>
