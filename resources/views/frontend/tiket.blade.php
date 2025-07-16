<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tiket Reservasi - {{ $reservasi->nama_pengunjung }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            font-size: 14px;
            line-height: 1.4;
        }
        
        .ticket {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 18px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .header p {
            font-size: 12px;
            opacity: 0.9;
        }
        
        .perforated {
            height: 20px;
            background: white;
            position: relative;
            background-image: radial-gradient(circle at 10px 50%, transparent 8px, white 8px);
            background-size: 20px 20px;
            border-top: 2px dashed #ddd;
            border-bottom: 2px dashed #ddd;
        }
        
        .content {
            padding: 20px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .label {
            font-weight: bold;
            color: #666;
            font-size: 12px;
        }
        
        .value {
            font-weight: 600;
            color: #333;
            text-align: right;
            font-size: 12px;
        }
        
        .price {
            color: #1e40af;
            font-weight: bold;
        }
        
        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .status-confirmed { background: #dcfce7; color: #166534; }
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-cancelled { background: #fee2e2; color: #991b1b; }
        
        .facilities {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #f0f0f0;
        }
        
        .facilities h4 {
            font-size: 14px;
            color: #333;
            margin-bottom: 10px;
        }
        
        .facility-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 0;
            font-size: 12px;
        }
        
        .footer {
            background: #f8f9fa;
            padding: 15px 20px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        
        .footer p {
            font-size: 11px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .print-btn {
            background: #1e40af;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            margin-top: 15px;
        }
        
        .print-btn:hover {
            background: #1e3a8a;
        }
        
        @media print {
            body { background: white; padding: 0; }
            .no-print { display: none !important; }
            .ticket { box-shadow: none; max-width: none; }
        }
        
        @media (max-width: 480px) {
            .ticket { max-width: 100%; margin: 0; }
            body { padding: 10px; }
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h1>🎫 Tiket Reservasi</h1>
            <p>Aia Angek Pabel</p>
        </div>
        
        <div class="perforated"></div>
        
        <div class="content">
            <div class="info-row">
                <span class="label">Nama:</span>
                <span class="value">{{ $reservasi->nama_pengunjung }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value">{{ $reservasi->email }}</span>
            </div>
            <div class="info-row">
                <span class="label">No HP:</span>
                <span class="value">{{ $reservasi->no_hp }}</span>
            </div>
            <div class="info-row">
                <span class="label">Tanggal:</span>
                <span class="value">{{ \Carbon\Carbon::parse($reservasi->tanggal_kunjungan)->format('d M Y') }}</span>
            </div>
            <div class="info-row">
                <span class="label">Jumlah:</span>
                <span class="value">{{ $reservasi->jumlah_orang }} orang</span>
            </div>
            <div class="info-row">
                <span class="label">Pembayaran:</span>
                <span class="value">{{ $reservasi->metode_pembayaran }}</span>
            </div>
            <div class="info-row">
                <span class="label">Total:</span>
                <span class="value price">Rp {{ number_format($reservasi->total_biaya, 0, ',', '.') }}</span>
            </div>
            <div class="info-row">
                <span class="label">Status:</span>
                <span class="status status-{{ strtolower($reservasi->status) }}">{{ ucfirst($reservasi->status) }}</span>
            </div>
            
            @if($reservasi->fasilitas->count())
            <div class="facilities">
                <h4>Fasilitas Tambahan:</h4>
                @foreach($reservasi->fasilitas as $f)
                <div class="facility-item">
                    <span>{{ $f->nama_fasilitas }} ({{ $f->pivot->jumlah }}x)</span>
                    <span class="price">Rp {{ number_format($f->pivot->subtotal, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        
        <div class="footer">
            <p><strong>Tunjukkan tiket ini saat kedatangan</strong></p>
            <p>Terima kasih - Aia Angek Pabel</p>
        </div>
    </div>

    <div class="no-print" style="text-align: center;">
        <button class="print-btn" onclick="window.print()">🖨️ Cetak Tiket</button>
    </div>
</body>
</html>