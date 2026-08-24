@extends('backend.layouts.app')

@section('title', 'Gallery Management')

@section('content')
<style>
    /* Preview & Compression UI Styles */
    .preview-section {
        margin-top: 20px;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 20px;
    }

    .preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }

    .preview-card {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .preview-img-wrap {
        height: 120px;
        background: #f1f3f5;
        position: relative;
        overflow: hidden;
    }

    .preview-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .preview-info {
        padding: 10px;
        font-size: 0.8rem;
    }

    .preview-filename {
        font-weight: 600;
        color: #333;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 4px;
    }

    .size-badge {
        display: inline-block;
        font-size: 0.75rem;
        padding: 2px 6px;
        border-radius: 4px;
        background: #e9ecef;
        color: #495057;
    }

    .size-badge.saved {
        background: #d4edda;
        color: #155724;
        font-weight: 600;
    }

    .btn-remove-img {
        position: absolute;
        top: 6px;
        right: 6px;
        background: rgba(220, 53, 69, 0.85);
        color: #fff;
        border: none;
        border-radius: 50%;
        width: 26px;
        height: 26px;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
        z-index: 2;
    }

    .btn-remove-img:hover {
        background: rgba(220, 53, 69, 1);
    }

    .progress-box {
        display: none;
        margin-top: 15px;
        background: #fff;
        border: 1px solid #ced4da;
        border-radius: 6px;
        padding: 15px;
    }

    .stats-summary {
        background: #e7f5ff;
        border: 1px solid #a5d8ff;
        color: #1864ab;
        padding: 10px 15px;
        border-radius: 6px;
        font-size: 0.88rem;
        margin-top: 15px;
        display: none;
    }
</style>

@php
$multis = \App\Models\Gallery::with('category')->orderBy('id', 'desc')->get();
@endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Gallery Photos</h4>
            </div>
            <div class="card-body">
                <form id="gallery_form" class="form-horizontal" action="{{ route('admin.setting.gallery.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="gallery_category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image Title / Details</label>
                        <input type="text" name="details" placeholder="Enter title or details (optional)" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Select Gallery Image(s) (Single or Multiple - Auto Client Compression)</label>
                        <input type="file" id="images_input" class="form-control" multiple accept="image/*">
                        <input type="file" name="photos[]" id="hidden_images_multiple" multiple accept="image/*" style="display: none;">
                        <small class="text-muted">Select high-resolution photos. Images are automatically compressed before uploading!</small>
                    </div>

                    <!-- Progress Box -->
                    <div id="progress_box" class="progress-box">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span id="progress_status" class="font-weight-bold text-primary">Optimizing Images...</span>
                            <span id="progress_percent" class="font-weight-bold">0%</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div id="progress_bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;"></div>
                        </div>
                    </div>

                    <!-- Batch Stats Summary -->
                    <div id="stats_summary" class="stats-summary">
                        <i class="fas fa-info-circle mr-1"></i> <span id="stats_text"></span>
                    </div>

                    <!-- Image Preview Grid -->
                    <div id="preview_section" class="preview-section" style="display: none;">
                        <h6 class="font-weight-bold mb-2">Selected Images Preview (<span id="preview_count">0</span>)</h6>
                        <div id="preview_grid" class="preview-grid"></div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" id="btn_submit" class="btn btn-info"><i class="fas fa-upload"></i> Upload Gallery Photos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Gallery Photo List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title / Details</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($multis as $multi)
                            <tr>
                                <td>
                                    <img src="{{ asset('/setting/banner/' . $multi->image) }}" style="height: 80px; border-radius: 4px; object-fit: cover;">
                                </td>
                                <td>{{ $multi->details ?? 'N/A' }}</td>
                                <td>{{ $multi->category->name ?? 'Uncategorized' }}</td>
                                <td>
                                    @if ($multi->is_active == 1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/setting/gallery/edit/{{ $multi->id }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imagesInput = document.getElementById('images_input');
    const hiddenImagesMultiple = document.getElementById('hidden_images_multiple');

    const previewSection = document.getElementById('preview_section');
    const previewGrid = document.getElementById('preview_grid');
    const previewCount = document.getElementById('preview_count');

    const progressBox = document.getElementById('progress_box');
    const progressStatus = document.getElementById('progress_status');
    const progressPercent = document.getElementById('progress_percent');
    const progressBar = document.getElementById('progress_bar');

    const statsSummary = document.getElementById('stats_summary');
    const statsText = document.getElementById('stats_text');
    const galleryForm = document.getElementById('gallery_form');
    const btnSubmit = document.getElementById('btn_submit');

    let processedFiles = [];
    let isCompressing = false;

    // Multiple Images Compression & Preview
    imagesInput.addEventListener('change', async function(e) {
        const files = Array.from(e.target.files);
        if (files.length === 0) return;

        isCompressing = true;
        btnSubmit.disabled = true;
        progressBox.style.display = 'block';
        progressBar.classList.remove('bg-success');
        progressBar.classList.add('bg-primary');

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const percent = Math.round(((i + 1) / files.length) * 100);
            
            progressStatus.textContent = `Optimizing image ${i + 1} of ${files.length} (${file.name})...`;
            progressPercent.textContent = `${percent}%`;
            progressBar.style.width = `${percent}%`;

            try {
                const compressedBlob = await compressImage(file, 2048, 2048, 0.85);
                const compressedFile = new File([compressedBlob], file.name.replace(/\.[^/.]+$/, "") + ".jpg", {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                });

                const item = {
                    id: Date.now() + '_' + Math.random().toString(36).substr(2, 9),
                    file: compressedFile,
                    originalSize: file.size,
                    compressedSize: compressedBlob.size,
                    previewUrl: URL.createObjectURL(compressedBlob)
                };

                processedFiles.push(item);
            } catch (err) {
                console.error("Compression error on file: " + file.name, err);
            }
        }

        isCompressing = false;
        btnSubmit.disabled = false;
        progressStatus.textContent = "Optimization Complete!";
        progressBar.classList.remove('bg-primary');
        progressBar.classList.add('bg-success');
        
        setTimeout(() => {
            progressBox.style.display = 'none';
        }, 1500);

        updateHiddenInputAndPreview();
    });

    // Compress Image via Canvas
    function compressImage(file, maxWidth, maxHeight, quality) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(event) {
                const img = new Image();
                img.src = event.target.result;
                img.onload = function() {
                    let width = img.width;
                    let height = img.height;

                    if (width > maxWidth || height > maxHeight) {
                        if (width > height) {
                            height = Math.round((height * maxWidth) / width);
                            width = maxWidth;
                        } else {
                            width = Math.round((width * maxHeight) / height);
                            height = maxHeight;
                        }
                    }

                    const canvas = document.createElement('canvas');
                    canvas.width = width;
                    canvas.height = height;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob((blob) => {
                        if (blob) {
                            resolve(blob);
                        } else {
                            reject(new Error("Canvas blob conversion failed"));
                        }
                    }, 'image/jpeg', quality);
                };
                img.onerror = (err) => reject(err);
            };
            reader.onerror = (err) => reject(err);
        });
    }

    // Render Preview Cards and Update Hidden File Input
    function updateHiddenInputAndPreview() {
        previewGrid.innerHTML = '';
        previewCount.textContent = processedFiles.length;

        if (processedFiles.length === 0) {
            previewSection.style.display = 'none';
            statsSummary.style.display = 'none';
            hiddenImagesMultiple.files = new DataTransfer().files;
            return;
        }

        let totalOriginal = 0;
        let totalCompressed = 0;

        const dt = new DataTransfer();

        processedFiles.forEach((item, index) => {
            dt.items.add(item.file);
            totalOriginal += item.originalSize;
            totalCompressed += item.compressedSize;

            const card = document.createElement('div');
            card.className = 'preview-card';

            const origMB = (item.originalSize / (1024 * 1024)).toFixed(1);
            const compKB = (item.compressedSize / 1024).toFixed(0);
            const savedPct = Math.round(((item.originalSize - item.compressedSize) / item.originalSize) * 100);

            card.innerHTML = `
                <button type="button" class="btn-remove-img" data-index="${index}" title="Remove image">&times;</button>
                <div class="preview-img-wrap">
                    <img src="${item.previewUrl}" alt="${item.file.name}">
                </div>
                <div class="preview-info">
                    <div class="preview-filename" title="${item.file.name}">${item.file.name}</div>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <span class="size-badge">${origMB} MB ➔ ${compKB} KB</span>
                        <span class="size-badge saved">-${savedPct}%</span>
                    </div>
                </div>
            `;

            previewGrid.appendChild(card);
        });

        hiddenImagesMultiple.files = dt.files;

        // Attach remove button click handlers
        document.querySelectorAll('.btn-remove-img').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const idx = parseInt(e.currentTarget.getAttribute('data-index'));
                if (processedFiles[idx]) {
                    URL.revokeObjectURL(processedFiles[idx].previewUrl);
                    processedFiles.splice(idx, 1);
                    updateHiddenInputAndPreview();
                }
            });
        });

        // Update stats box
        const totalOrigMB = (totalOriginal / (1024 * 1024)).toFixed(1);
        const totalCompMB = (totalCompressed / (1024 * 1024)).toFixed(1);
        const totalSaved = Math.max(0, Math.round(((totalOriginal - totalCompressed) / totalOriginal) * 100));

        statsText.innerHTML = `Ready to upload <strong>${processedFiles.length} optimized images</strong>. Original: <strong>${totalOrigMB} MB</strong> ➔ Optimized: <strong>${totalCompMB} MB</strong> (${totalSaved}% Saved)`;
        statsSummary.style.display = 'block';
        previewSection.style.display = 'block';
    }

    // Form Submit Handler with XHR Upload Progress Bar
    galleryForm.addEventListener('submit', function(e) {
        if (isCompressing) {
            e.preventDefault();
            alert("Please wait until image optimization completes!");
            return;
        }

        if (processedFiles.length === 0) {
            e.preventDefault();
            alert("Please select at least one image to upload!");
            return;
        }

        e.preventDefault();

        const formData = new FormData(galleryForm);
        const xhr = new XMLHttpRequest();

        btnSubmit.disabled = true;
        progressBox.style.display = 'block';
        progressStatus.textContent = "Uploading Gallery Photos to Server...";
        progressPercent.textContent = "0%";
        progressBar.style.width = "0%";
        progressBar.classList.remove('bg-success');
        progressBar.classList.add('bg-primary');

        xhr.upload.onprogress = function(event) {
            if (event.lengthComputable) {
                const percent = Math.round((event.loaded / event.total) * 100);
                progressPercent.textContent = `${percent}%`;
                progressBar.style.width = `${percent}%`;
                progressStatus.textContent = `Uploading Gallery Photos... ${percent}%`;
            }
        };

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                progressStatus.textContent = "Upload Complete! Reloading...";
                progressPercent.textContent = "100%";
                progressBar.style.width = "100%";
                progressBar.classList.remove('bg-primary');
                progressBar.classList.add('bg-success');

                setTimeout(() => {
                    window.location.reload();
                }, 800);
            } else {
                btnSubmit.disabled = false;
                alert("Upload failed. Please check server logs or try again.");
            }
        };

        xhr.onerror = function() {
            btnSubmit.disabled = false;
            alert("An error occurred during upload. Please check your network connection.");
        };

        xhr.open('POST', galleryForm.action, true);
        xhr.send(formData);
    });
});
</script>
@endsection
