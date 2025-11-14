<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Bồn cầu / Chậu rửa</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Loại sản phẩm:</strong> {{ $chitiet->LOAI_SP ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Chất liệu:</strong> {{ $chitiet->CHATLIEU ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Màu sắc:</strong> {{ $chitiet->MAU_SAC ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
    </div>
</div>
