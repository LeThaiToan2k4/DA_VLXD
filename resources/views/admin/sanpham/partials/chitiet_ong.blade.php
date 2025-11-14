<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Ống</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Chất liệu:</strong> {{ $chitiet->CHATLIEU ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Đường kính:</strong> {{ $chitiet->DUONGKICH ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Chiều dài:</strong> {{ $chitiet->CHIEUDAY ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
    </div>
</div>
