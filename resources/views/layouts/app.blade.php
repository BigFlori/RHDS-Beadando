<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - RHDS</title>
    <link rel="stylesheet" href="{{ asset('sass/app.scss') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-autocomplete/2.3.7/bootstrap-autocomplete.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-autocomplete/2.3.7/bootstrap-autocomplete.min.js">
    </script>
</head>

<body class="d-flex flex-column" style="min-height: 100vh">
    <header class="mb-3">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #21D192">
            <div class="container">
                <a class="navbar-brand" href="/" style="color: white"><span class="pacifico-regular">RHDS</span> -
                    Bibliothek</a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-center">

                        <li>
                            <a class="nav-link" href="{{ route('books.index') }}" style="color: white"><i
                                    class="fa-solid fa-book"></i> Könyvek kezelése</a>
                        </li>

                        <li>
                            <a class="nav-link" href="{{ route('members.index') }}" style="color: white"><i
                                    class="fa-solid fa-user-group"></i> Tagok kezelése</a>
                        </li>

                        <li>
                            <a class="nav-link" href="{{ route('loans.index') }}" style="color: white"><i
                                    class="fa-solid fa-list"></i> Kölcsönzések</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('loans.create') }}" style="color: white"><i
                                    class="fa-solid fa-circle-down"></i> Kölcsönzés</a>
                        </li>
                        @auth
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a class="btn btn-black btn-rounded" href="#" style="color: white"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i> Kijelentkezés
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <main style="flex-grow: 1" class="mt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark mt-5" style="background-color: #ECEFF1">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-3 text-white" style="background-color: #21D192">
            <!-- Left -->
            <div class="me-5">
                <span>Keress minket ezeken a közzöségi platformokon is!</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="#" class="text-white me-4 text-decoration-none">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white me-4 text-decoration-none">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white me-4 text-decoration-none">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="text-white me-4 text-decoration-none">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-white me-4 text-decoration-none">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/BigFlori/RHDS-Beadando" target="_blank"
                    class="text-white me-4 text-decoration-none">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">RHDS - Bibliothek</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            Büszkék vagyunk arra, hogy széles körű könyvgyűjteménnyel és
                            kiváló ügyfélszolgálattal szolgálunk. Folyamatosan törekszünk arra, hogy a legfrissebb és
                            legnépszerűbb kiadványokat kínáljuk olvasóinknak.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Hasznos oldalak</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="{{ route('books.index') }}" class="text-dark">Könyvek kezelése</a>
                        </p>
                        <p>
                            <a href="{{ route('members.index') }}" class="text-dark">Tagok kezelése</a>
                        </p>
                        <p>
                            <a href="{{ route('loans.index') }}" class="text-dark">Kölcsönzések</a>
                        </p>
                        <p>
                            <a href="#!" class="text-dark">Visszavétel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Kapcsolat</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> Szombathely, Károlyi Gáspár tér 5.</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@rhds.hu</p>
                        <p><i class="fas fa-phone mr-3"></i> +36 30 567 885</p>
                        <p><i class="fas fa-print mr-3"></i> +36 30 567 891</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © {{ date('Y') }} Copyright:
            <a class="text-dark" href="#">rhds.hu</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- Toasts -->
    @if (session('error'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header">
                    <strong class="me-auto">Hiba történt</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header">
                    <strong class="me-auto">Sikeres művelet</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    <!-- Toasts -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });
    </script>

    @yield('scripts')
</body>

</html>
