<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Xi măng</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Loại xi măng:</strong> {{ $chitiet->LOAI_XIMANG ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Trọng lượng:</strong> {{ $chitiet->TRONGLUONG ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Đơn vị:</strong> {{ $chitiet->DVT ?? '-' }}</div>
    </div>
</div>
