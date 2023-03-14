@include('layout.header')
<div class="container">
    <div class="align-item-center">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card-group shadow-sm">
                <div class="card">
                    <img src="/assets/logo/logo_kampus.png" class="rounded mx-auto d-block mt-4" style="max-width:250px" alt="404">
                    <div class="card-body">
                        <div class="h-100 mt-4">
                            <div class="card-body">
                                <h2 class="card-title text-center mt-1">INVENTARIS <br> STMIK LOMBOK</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mt-4">LOGIN</h3>
                        <p class="card-text text-primary text-center">login untuk menggunakan aplikasi</p>
                        <form action="/user/login" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="exampleFormControlInput1" class="form-label mb-2">Email</label>
                                    <input class="form-control form-control" type="email" name="email" placeholder="example@gmail.com" aria-label=".form-control example">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="exampleFormControlInput1" class="form-label mb-2">Password</label>
                                    <input class="form-control form-control" type="password" name="password" placeholder="masukkan password" aria-label=".form-control example">
                                </div>
                                <div class="col-12 mb-4 mt-5">
                                    <button type="submit" class="btn btn-primary col-12">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')