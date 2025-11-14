<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Phụ kiện ống</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Loại phụ kiện:</strong> {{ $chitiet->LOAI_PK ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Chất liệu:</strong> {{ $chitiet->CHATLIEU ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Kích thước:</strong> {{ $chitiet->KICHTHUOC ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
    </div>
</div>
