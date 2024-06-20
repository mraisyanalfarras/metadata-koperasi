@extends('layout.main')

@section('title', 'Pengumuman Desa')

@section('konten')


    <style>
        .testimonial-text p {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            padding: 15px;
            width: 1250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pengumuman Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Potensi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">

                @foreach ($pengumuman as $item)
                    <div class="card">
                        <div class="testimonial-item text-center">
                            <div class="testimonial-text text-center p-3">
                                <a href="{{ route('pengumuman-desa.show' , $item->id) }}">
                                    <h5 class="mb-1" style="color: rgba(44, 116, 252, 0.952);">{{ $item->judul }}</h5>
                                </a>
                                <span class="fst-italic">{{ $item->created_at }}</span>
                                <p id="deskripsiBerita" class="ellipsis">{!! $item->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var descriptions = document.querySelectorAll(".description");
            descriptions.forEach(function(description) {
                var lines = description.clientHeight / parseFloat(getComputedStyle(description).lineHeight);
                if (lines < 2) { // Change 2 to the number of lines you want to show before hiding the images
                    return;
                }
                var images = description.querySelectorAll("img");
                images.forEach(function(image) {
                    image.style.display = "none";
                });
            });
        });
    </script>
@endsection
