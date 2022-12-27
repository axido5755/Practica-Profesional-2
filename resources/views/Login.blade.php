<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-10 mt-md-10 pb-10">

            <img src="https://www.ubiobio.cl/mcc/images/logosimbologia.png"  height="120">
            <h4 class="fw-bold mb-2 text-uppercase">Universidad Del Bío Bío</h4>
            <p class="text-white-50 mb-5">Por Favor ingresa tu correo y contraseña!</p>
              <div class="form-outline form-white mb-4">
                  <input type="email" placeholder="Correo electronico" name="email" id="email"  class="form-control form-control-lg" />
                  <span id="errorEmail" style="color: red"></span>
              </div>

              <div class="form-outline form-white mb-4">
                  <input type="password" placeholder="Contraseña" name="pass" id="pass" class="form-control form-control-lg" />
                  <span id="errorPass" style="color: red"></span>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Olvido la contreseña?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" onclick="login()">Ingresar</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



<style>
.gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
</style>

<script>
    const usuarioJson = localStorage.getItem("usuario")
    if(usuarioJson){
        const adminUrl = "{{ url('/') }}"
        window.location.replace(adminUrl);
    }
    function clean(){
      document.getElementById('email').style.borderColor  = "white";
      document.getElementById('pass').style.borderColor  = "white";
      document.getElementById('errorEmail').textContent = "";
      document.getElementById('errorPass').textContent = ""
    }
    
    async function login(){
        clean();
        const email = document.getElementById('email');
        const pass = document.getElementById('pass');
        let validado = true;
        if(!email.value){
          validado = false;
          email.style.borderColor  = "red";
          document.getElementById('errorEmail').textContent = "* Debe ingresar su correo"
        }
        if(!pass.value){
          validado = false;
          pass.style.borderColor  = "red";
          document.getElementById('errorPass').textContent = "* Debe ingresar su contraseña"
        }
        if(!validado){
          return;
        }
        
        const url = "{{ url('/api/login') }}";
        const data = {
          email: email.value,
          pass: pass.value
        }
        const res = await axios.post(url, data);
        const usuario = res.data;

        console.log(usuario);
        
        if(!usuario){
            new AWN().alert('Credenciales invalidas');
        }else{
            localStorage.setItem("usuario", JSON.stringify(usuario));
            const adminUrl = "{{ url('/') }}"
            window.location.replace(adminUrl);
        }
    }
    
</script>

