<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Sơn</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Loại sơn:</strong> {{ $chitiet->LOAI_SON ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Màu sắc:</strong> {{ $chitiet->MAU_SAC ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Thể tích:</strong> {{ $chitiet->THETICHSU ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
    </div>
</div>
