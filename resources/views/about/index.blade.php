@extends('layouts.app')

@section('title', 'Về Chúng Tôi - Tiệm Bánh Trung Thu')

@section('content')
<div class="about-wrapper">
    <div class="container py-5">

        {{-- PHẦN GIỚI THIỆU --}}
        <div class="text-center mb-5">
            <h1 class="fw-bold text-royal mb-3">Về Tiệm Bánh Trung Thu HTV</h1>
            <p class="lead mb-1 mx-auto" style="max-width: 800px;">
                Tiệm Bánh Trung Thu Maison mang đến hương vị truyền thống đậm đà, 
                kết hợp tinh hoa hiện đại trong từng chiếc bánh.  
                Chúng tôi tự hào là lựa chọn tin cậy của hàng nghìn khách hàng mỗi mùa trăng.
            </p>
        </div>

        {{-- ẢNH GIỚI THIỆU --}}
        <div class="row align-items-center mb-5 text-light">
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="{{ asset('images/logo.png') }}" 
                class="img-fluid rounded-circle shadow-lg border border-4 border-gold"
                alt="Tiệm bánh Maison" 
                style="max-width: 380px;">
        </div>

        <div class="col-md-6">
            <h3 class="fw-bold text-gold mb-3">✨ Hành trình ngọt ngào</h3>
            <p class="mb-1">
                Khởi nguồn từ niềm đam mê ẩm thực Việt, Maison luôn đặt tâm huyết vào 
                từng nguyên liệu và khâu chế biến. Chúng tôi mong muốn mang đến cho bạn 
                những chiếc bánh không chỉ ngon miệng, mà còn chứa đựng tình cảm, sự trân quý và tinh tế.
            </p>
            <p class="mb-1">
                Với đội ngũ thợ bánh lành nghề, Maison không ngừng sáng tạo để 
                thổi hồn vào từng chiếc bánh nướng, bánh dẻo — như một món quà ý nghĩa 
                cho mỗi mùa Trung Thu đoàn viên.
            </p>
        </div>
    </div>


        <hr class="my-5">

        {{-- THÔNG TIN LIÊN HỆ --}}
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold text-royal mb-3">📞 Liên Hệ Với Chúng Tôi</h2>
                <p class="mb-1"><strong>Công ty:</strong> CÔNG TY CỔ PHẦN THỰC PHẨM W & E</p>
                <p class="mb-1"><strong>Địa chỉ:</strong> Tầng 9 tòa Toyota, số 315 Trường Chinh, Quận Thanh Xuân, Hà Nội</p>
                <p class="mb-1"><strong>Hotline:</strong> <a href="tel:0919708568" class="text-gold">0919.708.568</a></p>
                <p class="mb-1"><strong>Email:</strong> <a href="mailto:cskh@maison.com.vn" class="text-gold">cskh@maison.com.vn</a></p>

                <div class="mt-4">
                    <a href="https://www.facebook.com/hathanhmooncake/" target="_blank" class="btn btn-gold me-2">
                        <i class="bi bi-facebook me-1"></i> Fanpage chính thức
                    </a>
                    <a href="https://zalo.me/g/yokpqm622" target="_blank" class="btn btn-outline-warning">
                        <i class="bi bi-chat-dots-fill me-1"></i> Zalo hỗ trợ
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ratio ratio-16x9 rounded shadow overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.642088958376!2d105.82622667485537!3d21.007066680635566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac80aa0408c7%3A0xe48b8f6c61a6b1f0!2zQsOhbmggVHJ1bmcgVGh1IE1haXNvbiAtIFRydSDhu5VpIMSQ4bupYw!5e0!3m2!1svi!2s!4v1690000000000"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        {{-- ẢNH KHÁC / BỘ SƯU TẬP --}}
        <div class="text-center mt-5">
            <h3 class="fw-bold text-royal mb-4">📸 Một vài hình ảnh từ HTV</h3>
            <div class="row g-3">
                <div class="col-md-4"><img src="{{ asset('images/about1.jpg') }}" class="img-fluid rounded-3 shadow-sm"></div>
                <div class="col-md-4"><img src="{{ asset('images/about2.jpg') }}" class="img-fluid rounded-3 shadow-sm"></div>
                <div class="col-md-4"><img src="{{ asset('images/about3.jpg') }}" class="img-fluid rounded-3 shadow-sm"></div>
            </div>
        </div>

    </div>
</div>
@endsection
