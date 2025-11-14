@extends('layouts.admin')

@section('content')
    <div class="product-detail-container container">

        <!-- Tiêu đề -->
        <h2 class="product-title mb-4">Chi tiết sản phẩm: {{ $sp->TENSP }}</h2>

        <!-- Card chi tiết sản phẩm + chi tiết loại chung -->
        <div class="detail-card card mb-4 p-3">
            <div class="row">
                <!-- Hình ảnh sản phẩm -->
                <div class="col-md-4 text-center mb-3">
                    @if ($sp->HINHANH)
                        <img src="{{ asset('storage/' . $sp->HINHANH) }}" alt="{{ $sp->TENSP }}"
                            class="product-image img-fluid">
                    @else
                        <div class="no-image">Chưa có hình ảnh</div>
                    @endif
                </div>

                <!-- Thông tin sản phẩm + chi tiết loại -->
                <div class="col-md-8">
                    <div class="row">
                        <!-- Thông tin chung -->
                        <div class="col-md-6 detail-item"><strong>Mã sản phẩm:</strong> {{ $sp->MASP }}</div>
                        <div class="col-md-6 detail-item"><strong>Loại:</strong> {{ $sp->loai->TENLOAI ?? '-' }}</div>
                        <div class="col-md-6 detail-item"><strong>Đơn vị tính:</strong> {{ $sp->dvt->TENDVT ?? '-' }}</div>
                        <div class="col-md-6 detail-item"><strong>Giá bán:</strong>
                            {{ number_format($sp->DONGIABAN, 0, ',', '.') }} đ</div>
                        <div class="col-md-6 detail-item"><strong>Bán lẻ:</strong> {{ $sp->BANLE ? 'Có' : 'Không' }}</div>
                        <div class="col-md-6 detail-item"><strong>Mô tả:</strong> {{ $sp->MOTA ?? '-' }}</div>

                        <!-- Chi tiết theo loại -->
                        {{-- 1. Cát --}}
                        @if ($sp->MALOAI == 1 && $sp->chitietCat)
                            <div class="col-md-6 detail-item"><strong>Kích cỡ hạt:</strong>
                                {{ $sp->chitietCat->KICHCO_HAT ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Mức độ sạch:</strong>
                                {{ $sp->chitietCat->MUCDO_SACH ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong>
                                {{ $sp->chitietCat->XUATXU ?? '-' }}</div>
                        @endif

                        {{-- 2. Đá --}}
                        @if ($sp->MALOAI == 2 && $sp->chitietDa)
                            <div class="col-md-6 detail-item"><strong>Kích cỡ đá:</strong>
                                {{ $sp->chitietDa->KICHCO ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Loại đá:</strong>
                                {{ $sp->chitietDa->LOAI_DA ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $sp->chitietDa->XUATXU ?? '-' }}
                            </div>
                        @endif

                        {{-- 3. Xi măng --}}
                        @if ($sp->MALOAI == 3 && $sp->chitietXimang)
                            <div class="col-md-6 detail-item"><strong>Khối lượng:</strong>
                                {{ $sp->chitietXimang->KHOILUONG ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Nhãn hiệu:</strong>
                                {{ $sp->chitietXimang->NHANHIEU ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Đặc điểm:</strong>
                                {{ $sp->chitietXimang->NGOAIDACDIEM ?? '-' }}</div>
                        @endif

                        {{-- 4. Sắt thép --}}
                        @if ($sp->MALOAI == 4 && $sp->chitietSatThep)
                            <div class="col-md-6 detail-item"><strong>Loại thép:</strong>
                                {{ $sp->chitietSatThep->LOAI_THEP ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Đường kính:</strong>
                                {{ $sp->chitietSatThep->DUONG_KINH ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Chiều dài:</strong>
                                {{ $sp->chitietSatThep->CHIEU_DAI ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Khối lượng:</strong>
                                {{ $sp->chitietSatThep->KHOI_LUONG ?? '-' }}</div>
                        @endif

                        {{-- 5. Gạch --}}
                        @if ($sp->MALOAI == 5 && $sp->chitietGach)
                            <div class="col-md-6 detail-item"><strong>Kích thước:</strong>
                                {{ $sp->chitietGach->KICHTHUOC ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Màu sắc:</strong> {{ $sp->chitietGach->MAU ?? '-' }}
                            </div>
                            <div class="col-md-6 detail-item"><strong>Chất liệu:</strong>
                                {{ $sp->chitietGach->CHAT_LIEU ?? '-' }}</div>
                        @endif

                        {{-- 6. Sơn --}}
                        @if ($sp->MALOAI == 6 && $sp->chitietSon)
                            <div class="col-md-6 detail-item"><strong>Màu sắc:</strong> {{ $sp->chitietSon->MAU ?? '-' }}
                            </div>
                            <div class="col-md-6 detail-item"><strong>Thể tích:</strong>
                                {{ $sp->chitietSon->THE_TICH ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Loại bề mặt:</strong>
                                {{ $sp->chitietSon->LOAI_BENMAT ?? '-' }}</div>
                        @endif

                        {{-- 7. Ống --}}
                        @if ($sp->MALOAI == 7 && $sp->chitietOng)
                            <div class="col-md-6 detail-item"><strong>Chất liệu:</strong>
                                {{ $sp->chitietOng->CHATLIEU ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Đường kính:</strong>
                                {{ $sp->chitietOng->DUONG_KINH ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Chiều dài:</strong>
                                {{ $sp->chitietOng->CHIEU_DAI ?? '-' }}</div>
                        @endif

                        {{-- 8. Phụ kiện ống --}}
                        @if ($sp->MALOAI == 8 && $sp->chitietPhuKienOng)
                            <div class="col-md-6 detail-item"><strong>Loại phụ kiện:</strong>
                                {{ $sp->chitietPhuKienOng->LOAI_PHUKIEN ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Chất liệu:</strong>
                                {{ $sp->chitietPhuKienOng->CHATLIEU ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Đường kính:</strong>
                                {{ $sp->chitietPhuKienOng->DUONG_KINH ?? '-' }}</div>
                        @endif

                        {{-- 9. Bồn cầu / Chậu rửa --}}
                        @if ($sp->MALOAI == 9 && $sp->chitietBonCauChauRua)
                            <div class="col-md-6 detail-item"><strong>Kích thước:</strong>
                                {{ $sp->chitietBonCauChauRua->KICHTHUOC ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Màu sắc:</strong>
                                {{ $sp->chitietBonCauChauRua->MAU ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Chất liệu:</strong>
                                {{ $sp->chitietBonCauChauRua->CHAT_LIEU ?? '-' }}</div>
                        @endif

                        {{-- 10. Dây điện --}}
                        @if ($sp->MALOAI == 10 && $sp->chitietDayDien)
                            <div class="col-md-6 detail-item"><strong>Chiều dài (m):</strong>
                                {{ $sp->chitietDayDien->DAI_MET ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Chất liệu:</strong>
                                {{ $sp->chitietDayDien->CHATLIEU ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Dòng điện:</strong>
                                {{ $sp->chitietDayDien->DONG_DIEN ?? '-' }}</div>
                        @endif

                        {{-- 11. Thiết bị điện --}}
                        @if ($sp->MALOAI == 11 && $sp->chitietThietBiDien)
                            <div class="col-md-6 detail-item"><strong>Loại thiết bị:</strong>
                                {{ $sp->chitietThietBiDien->LOAI ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Chất liệu:</strong>
                                {{ $sp->chitietThietBiDien->CHATLIEU ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Dòng điện:</strong>
                                {{ $sp->chitietThietBiDien->DONG_DIEN ?? '-' }}</div>
                        @endif

                        {{-- 12. Trang trí --}}
                        @if ($sp->MALOAI == 12 && $sp->chitietTrangTri)
                            <div class="col-md-6 detail-item"><strong>Kích thước:</strong>
                                {{ $sp->chitietTrangTri->KICHTHUOC ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Màu sắc:</strong>
                                {{ $sp->chitietTrangTri->MAU ?? '-' }}</div>
                            <div class="col-md-6 detail-item"><strong>Chất liệu:</strong>
                                {{ $sp->chitietTrangTri->CHAT_LIEU ?? '-' }}</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!-- Nút quay lại -->
        <a href="{{ route('admin.sanpham.index') }}" class="detail-btn mt-4">Quay lại</a>

    </div>
@endsection
