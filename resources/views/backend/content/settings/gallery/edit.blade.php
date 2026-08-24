@extends('backend.layouts.app')

@section('title', 'Edit Gallery Image')

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

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Gallery Image</h4>
            </div>
            <div class="card-body">
                <form id="gallery_edit_form" action="{{ route('admin.setting.gallery.update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="oldimage" value="{{ $notice->image }}">
                    <input type="hidden" name="gallery_id" value="{{ $notice->id }}">

                    <div class="form-group">
                        <label>Category *</label>
                        <select name="gallery_category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($notice->gallery_category_id == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Image Title / Details</label>
                        <input type="text" name="details" placeholder="Enter image title or description"
                               value="{{ $notice->details }}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Current Image</label>
                        @if($notice->image)
                            <div class="mb-2">
                                <img src="{{ asset('/setting/banner/' . $notice->image) }}"
                                     alt="{{ $notice->details ?? 'Gallery Image' }}"
                                     style="max-width: 250px; max-height: 180px; border-radius: 6px; border: 1px solid #ddd; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                            </div>
                        @endif
                        <label class="mt-2">Upload New Replacement Image (Optional - Auto Client Compression)</label>
                        <input type="file" id="image_input" class="form-control" accept="image/*">
                        <input type="file" name="image" id="hidden_image" accept="image/*" style="display: none;">
                        <small class="form-text text-muted">Select a new image to replace current one. Compressed automatically before uploading!</small>
                    </div>

                    <!-- Progress Box -->
                    <div id="progress_box" class="progress-box">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span id="progress_status" class="font-weight-bold text-primary">Optimizing Image...</span>
                            <span id="progress_percent" class="font-weight-bold">0%</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div id="progress_bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;"></div>
                        </div>
                    </div>

                    <!-- Stats Summary -->
                    <div id="stats_summary" class="stats-summary">
                        <i class="fas fa-info-circle mr-1"></i> <span id="stats_text"></span>
                    </div>

                    <!-- New Replacement Image Preview Grid -->
                    <div id="preview_section" class="preview-section" style="display: none;">
                        <h6 class="font-weight-bold mb-2">New Image Preview</h6>
                        <div id="preview_grid" class="preview-grid"></div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Active / Inactive Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1" @if ($notice->is_active == 1) selected @endif>Active</option>
                            <option value="0" @if ($notice->is_active == 0) selected @endif>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" id="btn_submit" class="btn btn-info"><i class="fas fa-save"></i> Update Gallery Image</button>
                        <a href="{{ route('admin.setting.gallery') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image_input');
    const hiddenImage = document.getElementById('hidden_image');

    const previewSection = document.getElementById('preview_section');
    const previewGrid = document.getElementById('preview_grid');

    const progressBox = document.getElementById('progress_box');
    const progressStatus = document.getElementById('progress_status');
    const progressPercent = document.getElementById('progress_percent');
    const progressBar = document.getElementById('progress_bar');

    const statsSummary = document.getElementById('stats_summary');
    const statsText = document.getElementById('stats_text');
    const galleryForm = document.getElementById('gallery_edit_form');
    const btnSubmit = document.getElementById('btn_submit');

    let processedFile = null;
    let isCompressing = false;

    // Single Image Compression & Preview
    imageInput.addEventListener('change', async function(e) {
        if (!e.target.files || !e.target.files[0]) return;

        const file = e.target.files[0];
        isCompressing = true;
        btnSubmit.disabled = true;
        progressBox.style.display = 'block';
        progressBar.classList.remove('bg-success');
        progressBar.classList.add('bg-primary');
        progressStatus.textContent = `Optimizing image (${file.name})...`;
        progressPercent.textContent = `50%`;
        progressBar.style.width = `50%`;

        try {
            const compressedBlob = await compressImage(file, 2048, 2048, 0.85);
            const compressedFile = new File([compressedBlob], file.name.replace(/\.[^/.]+$/, "") + ".jpg", {
                type: 'image/jpeg',
                lastModified: Date.now()
            });

            processedFile = {
                file: compressedFile,
                originalSize: file.size,
                compressedSize: compressedBlob.size,
                previewUrl: URL.createObjectURL(compressedBlob)
            };

            const dt = new DataTransfer();
            dt.items.add(compressedFile);
            hiddenImage.files = dt.files;

            isCompressing = false;
            btnSubmit.disabled = false;
            progressStatus.textContent = "Optimization Complete!";
            progressPercent.textContent = `100%`;
            progressBar.style.width = `100%`;
            progressBar.classList.remove('bg-primary');
            progressBar.classList.add('bg-success');

            setTimeout(() => {
                progressBox.style.display = 'none';
            }, 1200);

            updatePreview();
        } catch (err) {
            console.error("Compression error:", err);
            isCompressing = false;
            btnSubmit.disabled = false;
        }
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

    function updatePreview() {
        previewGrid.innerHTML = '';
        if (!processedFile) {
            previewSection.style.display = 'none';
            statsSummary.style.display = 'none';
            return;
        }

        const card = document.createElement('div');
        card.className = 'preview-card';

        const origMB = (processedFile.originalSize / (1024 * 1024)).toFixed(1);
        const compKB = (processedFile.compressedSize / 1024).toFixed(0);
        const savedPct = Math.round(((processedFile.originalSize - processedFile.compressedSize) / processedFile.originalSize) * 100);

        card.innerHTML = `
            <button type="button" class="btn-remove-img" id="btn_remove_single" title="Remove image">&times;</button>
            <div class="preview-img-wrap">
                <img src="${processedFile.previewUrl}" alt="${processedFile.file.name}">
            </div>
            <div class="preview-info">
                <div class="preview-filename" title="${processedFile.file.name}">${processedFile.file.name}</div>
                <div class="d-flex justify-content-between align-items-center mt-1">
                    <span class="size-badge">${origMB} MB ➔ ${compKB} KB</span>
                    <span class="size-badge saved">-${savedPct}%</span>
                </div>
            </div>
        `;

        previewGrid.appendChild(card);

        statsText.innerHTML = `New image ready to upload: <strong>${origMB} MB</strong> ➔ <strong>${compKB} KB</strong> (${savedPct}% Saved)`;
        statsSummary.style.display = 'block';
        previewSection.style.display = 'block';

        document.getElementById('btn_remove_single').addEventListener('click', function() {
            URL.revokeObjectURL(processedFile.previewUrl);
            processedFile = null;
            hiddenImage.files = new DataTransfer().files;
            imageInput.value = '';
            updatePreview();
        });
    }

    // Form Submit Handler with XHR Upload Progress Bar
    galleryForm.addEventListener('submit', function(e) {
        if (isCompressing) {
            e.preventDefault();
            alert("Please wait until image optimization completes!");
            return;
        }

        e.preventDefault();

        const formData = new FormData(galleryForm);
        const xhr = new XMLHttpRequest();

        btnSubmit.disabled = true;
        progressBox.style.display = 'block';
        progressStatus.textContent = "Updating Gallery Image on Server...";
        progressPercent.textContent = "0%";
        progressBar.style.width = "0%";
        progressBar.classList.remove('bg-success');
        progressBar.classList.add('bg-primary');

        xhr.upload.onprogress = function(event) {
            if (event.lengthComputable) {
                const percent = Math.round((event.loaded / event.total) * 100);
                progressPercent.textContent = `${percent}%`;
                progressBar.style.width = `${percent}%`;
                progressStatus.textContent = `Updating Gallery Image... ${percent}%`;
            }
        };

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                progressStatus.textContent = "Update Complete! Redirecting...";
                progressPercent.textContent = "100%";
                progressBar.style.width = "100%";
                progressBar.classList.remove('bg-primary');
                progressBar.classList.add('bg-success');

                setTimeout(() => {
                    window.location.href = "{{ route('admin.setting.gallery') }}";
                }, 800);
            } else {
                btnSubmit.disabled = false;
                alert("Update failed. Please check server logs or try again.");
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
