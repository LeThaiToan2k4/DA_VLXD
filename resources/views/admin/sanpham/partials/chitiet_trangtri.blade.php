<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Trang trí</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Loại vật liệu:</strong> {{ $chitiet->LOAI_VL ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Màu sắc:</strong> {{ $chitiet->MAU_SAC ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Kích thước:</strong> {{ $chitiet->KICHTHUOC ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
    </div>
</div>
