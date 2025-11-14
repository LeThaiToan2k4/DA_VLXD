<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Gạch</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Kích thước:</strong> {{ $chitiet->KICHTHUOC ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Loại gạch:</strong> {{ $chitiet->LOAI_GACH ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Màu sắc:</strong> {{ $chitiet->MAU_SAC ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Đơn vị:</strong> {{ $chitiet->DVT ?? '-' }}</div>
    </div>
</div>
