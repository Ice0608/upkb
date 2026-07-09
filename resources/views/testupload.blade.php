<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Upload Gambar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: linear-gradient(180deg, #f8fafc, #e2e8f0);
            color: #0f172a;
        }

        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px 20px 64px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            padding: 24px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 900px) {
            .grid {
                grid-template-columns: 360px 1fr;
                align-items: start;
            }
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 8px;
        }

        input[type="file"] {
            width: 100%;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 999px;
            padding: 12px 18px;
            background: #0ea5e9;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: #0284c7;
        }

        .alert {
            border-radius: 14px;
            padding: 12px 14px;
            margin-bottom: 16px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 16px;
        }

        .preview-item {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
        }

        .preview-item img {
            display: block;
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #f8fafc;
        }

        .preview-meta {
            padding: 12px;
            font-size: 12px;
            color: #475569;
            word-break: break-word;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="card" style="margin-bottom: 20px;">
            <h1 style="margin: 0 0 8px; font-size: 28px;">Test Upload Gambar</h1>
            <p style="margin: 0; color: #475569;">Ujian ini simpan fail ke `public/test` dan rekod path ke database.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <strong>Sila semak semula:</strong>
                <ul style="margin: 8px 0 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid">
            <div class="card">
                <form method="POST" action="{{ route('testupload.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 16px;">
                        <label for="image">Pilih gambar</label>
                        <input type="file" name="image" id="image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn">Upload</button>
                </form>

                <div style="margin-top: 20px; font-size: 14px; color: #475569;">
                    Lokasi sasaran: <strong>{{ $webPublicRoot }}/test</strong>
                </div>
            </div>

            <div class="card">
                <h2 style="margin-top: 0; font-size: 22px;">Senarai Upload</h2>
                @if($uploads->isEmpty())
                    <p style="color: #64748b;">Belum ada gambar yang dimuat naik.</p>
                @else
                    <div class="preview-grid">
                        @foreach($uploads as $upload)
                            <div class="preview-item">
                                <img src="{{ asset($upload->file_path) }}" alt="{{ $upload->original_name }}" onerror="this.onerror=null;this.src='{{ asset('images/dummy-course.svg') }}';">
                                <div class="preview-meta">
                                    <div><strong>{{ $upload->original_name }}</strong></div>
                                    <div>{{ $upload->file_path }}</div>
                                    <div>{{ number_format(($upload->file_size ?? 0) / 1024, 2) }} KB</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
