<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Cát</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Loại cát:</strong> {{ $chitiet->LOAI_CAT ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Kích cỡ:</strong> {{ $chitiet->KICHCO ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Đơn vị:</strong> {{ $chitiet->DVT ?? '-' }}</div>
    </div>
</div>
