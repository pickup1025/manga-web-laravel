<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MANGA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="">
    @vite('resources/css/home.css')
    @vite('resources/css/style.css')
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top" aria-label="Fourth navbar example">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
        <img src="{{ asset('img/icon.png') }}" alt="หน้าแรก" class="" width="60">
        <ul class="collapse navbar-collapse">
            <li class="nav-item colorli">Manga998</li>
        </ul>
    </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">หน้าแรก</a>
              </li>

              <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ล็อคอิน</a>

                    @endauth

            @endif
              </li>
              <li class="nav-item">
                @if (Route::has('register'))
                    @auth
                          @else
                    <a href="{{ route('register') }}" class="nav-link ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">สมัคร</a>

                    @endauth

            @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-interval="5000">>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="Banner" width="100%" height="40%" src="{{ asset('img/banner2.png') }}" alt="">
            </div>
            <div class="carousel-item">
                <img class="Banner"  width="100%" height="100%" src="{{ asset('img/banner3.png') }}"  alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>มังงะเเนะนำ</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($posts as $post)
                            <div class="col-lg-3 col-md-5 col-sm-6">
                                <div class="product__item ">
                                    <div class="product__item__pic set-bg">
                                        <!-- Add a CSS class for center alignment -->
                                        <div class="center-image">
                                            <img class="img-fluid hover-effect"
                                                 src="{{ Storage::url($post->featured_image) }}"
                                                 alt="{{ $post->title }}"
                                                 data-bs-toggle="modal" data-bs-target="#imageModal{{ $post->id }}">
                                                 <div class="ep">เเนะนำ</div>
                                        </div>
                                    </div>
                                    <div class="product__item__text">
                                        <h5 class="center-text">
                                            <a href="#" data-bs-toggle="modal"
                                               data-bs-target="#imageModal{{ $post->id }}">{{ $post->title }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@foreach ($posts as $post)
<div class="modal fade" id="imageModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $post->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex; align-items: center; justify-content: space-between;">
                <div style="flex: 1; margin-right: 20px;"> <!-- Add margin-right for spacing -->
                    <img class="img-fluid-modal" src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}">
                </div>
                <div style="flex: 2;">
                    <h4 class="card-text"><strong>ชื่อเรื่อง : </strong> {{ $post->title }}</h4>
                    <br>
                    <h5 class="card-text"><strong>สำนักพิมพ์ : </strong>{{ $post->company }}</h5>
                    <h4 class="card-text text-danger"><strong>ราคา : </strong> {{ $post->price }}.-</h4>
                    <p class="card-text p-6"><strong>เรื่องย่อ :</strong> {{ $post->content }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endforeach
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
crossorigin="anonymous"></script>
</html>
