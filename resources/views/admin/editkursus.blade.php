<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>UPKB - Edit kursus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@include('layouts.navadmin')

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="rounded-3xl bg-white shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-8 py-8 border-b border-gray-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-800">Edit kursus</h1>
                        <p class="mt-2 text-gray-600">Urus data kursus serta semua submodul syarat, silibus, kerjaya dan yuran.</p>
                    </div>
                    <a href="{{ route('admin.editinstitusi', $kursus->institusi?->id ?? 0) }}" class="inline-flex items-center gap-2 rounded-full bg-orange-500 text-white px-5 py-3 hover:bg-orange-600 transition">
                        <i class="fas fa-building"></i> Kembali ke Institusi
                    </a>
                </div>
            </div>

            <div class="bg-gray-50 px-8 py-5 border-b border-gray-200">
                <div class="flex flex-wrap gap-3 text-sm text-gray-600">
                    <a href="#" onclick="loadTab('maklumat')" class="tab-link px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition" data-tab="maklumat">Maklumat Am</a>
                    <a href="#" onclick="loadTab('syarat')" class="tab-link px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition" data-tab="syarat">Syarat Kelayakan</a>
                    <a href="#" onclick="loadTab('silibus')" class="tab-link px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition" data-tab="silibus">Struktur Silibus</a>
                    <a href="#" onclick="loadTab('kerjaya')" class="tab-link px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition" data-tab="kerjaya">Laluan Kerjaya</a>
                    <a href="#" onclick="loadTab('yuran')" class="tab-link px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition" data-tab="yuran">Yuran & Pinjaman</a>
                    <a href="#" onclick="loadTab('galeri')" class="tab-link px-4 py-2 rounded-full bg-white border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition" data-tab="galeri">Galeri Kursus</a>
                </div>
            </div>

            <div class="px-8 py-10">
                <div id="tab-content">
                    <!-- Tab content will be loaded here via AJAX -->
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentTab = 'maklumat';
        let pendingMessage = null;

        function loadTab(tab) {
            currentTab = tab;
            const tabContent = document.getElementById('tab-content');
            const tabLinks = document.querySelectorAll('.tab-link');

            // Update active tab styling
            tabLinks.forEach(link => {
                link.classList.remove('bg-orange-100', 'text-orange-700');
                if (link.dataset.tab === tab) {
                    link.classList.add('bg-orange-100', 'text-orange-700');
                }
            });

            // Load tab content via AJAX
            const kursusId = '{{ $kursus->id }}';
            fetch(`/admin/tab${tab}/${kursusId}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                }
            })
            .then(response => response.text())
            .then(html => {
                tabContent.innerHTML = html;
                // Re-attach form handlers
                attachFormHandlers();
                if (pendingMessage) {
                    showMessage(pendingMessage.text, pendingMessage.type);
                    pendingMessage = null;
                }
            })
            .catch(error => {
                console.error('Error loading tab:', error);
                tabContent.innerHTML = '<p class="text-red-500">Error loading content.</p>';
            });
        }

        function attachFormHandlers() {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);

                    fetch(this.action, {
                        method: this.method,
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                        }
                    })
                    .then(async response => {
                        const contentType = response.headers.get('content-type') || '';
                        if (!response.ok) {
                            let errorMessage = `HTTP ${response.status}`;
                            if (contentType.includes('application/json')) {
                                const errorData = await response.json();
                                if (errorData.message) {
                                    errorMessage = errorData.message;
                                } else if (errorData.errors) {
                                    errorMessage = Object.values(errorData.errors).flat().join(' ');
                                }
                            }
                            throw new Error(errorMessage);
                        }
                        if (contentType.includes('application/json')) {
                            return response.json();
                        }
                        throw new Error('Invalid response from server');
                    })
                    .then(data => {
                        if (data.success) {
                            pendingMessage = {
                                text: data.message,
                                type: 'success',
                            };
                            loadTab(currentTab);
                        } else {
                            showMessage(data.message || 'Error occurred', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Form submission error:', error);
                        showMessage(error.message || 'Error submitting form', 'error');
                    });
                });
            });
        }

        function showMessage(message, type) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `rounded-2xl p-5 mb-6 ${type === 'success' ? 'bg-green-50 border border-green-200 text-green-700' : 'bg-red-50 border border-red-200 text-red-700'}`;
            messageDiv.textContent = message;

            const tabContent = document.getElementById('tab-content');
            tabContent.insertBefore(messageDiv, tabContent.firstChild);

            // Remove message after 5 seconds
            setTimeout(() => {
                messageDiv.remove();
            }, 5000);
        }

        // Load default tab on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadTab('maklumat');
        });
    </script>

</body>
</html>
