<div class="detail-card card mb-3">
    <div class="card-header">Chi tiết Thiết bị điện</div>
    <div class="card-body row">
        <div class="col-md-6 detail-item"><strong>Loại thiết bị:</strong> {{ $chitiet->LOAI_TB ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Công suất:</strong> {{ $chitiet->CONGSUAT ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Điện áp:</strong> {{ $chitiet->DIEN_AP ?? '-' }}</div>
        <div class="col-md-6 detail-item"><strong>Xuất xứ:</strong> {{ $chitiet->XUATXU ?? '-' }}</div>
    </div>
</div>
