<x-layout-admin>


    <section>
        <div class="container-lg">
            <div class="text-start">
                <h2>Edit Trip</h2>
            </div>

            <div class="row justify-content-center my-5">

                <div class="col-lg-6 bg-secondary-subtle p-4 rounded">
                    <form action="{{ route('trip.update', $trip->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @if (isset($trip))
                            @method('PUT')
                        @endif

                        {{-- <input type="hidden" name="delete_image_ids[]" value="[]"> --}}

                        <div class="container-post">
                            <div class="container-post">
                                <div class="thumbnails" id="thumbnails">
                                    @foreach ($trip->images as $image)
                                        <div class="thumbnail">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Trip Image">
                                            <button type="button" class="remove"
                                                onclick="deleteImage({{ $image->id }})">&times;</button>
                                            <input type="hidden" name="delete_image_ids[]" value="{{ $image->id }}"
                                                id="delete-image-{{ $image->id }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="upload-options">
                                <label for="foto" class="option">
                                    <p>Tambah Foto</p>
                                </label>
                                <input type="file" name="fotos[]" id="foto" multiple accept="image/*"
                                    onchange="previewImages(event)">
                                <span class="upload-limit" id="upload-limit">0/3</span>


                            </div>
                        </div>

                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="judul" placeholder="Masukkan judul"
                                value="{{ old('judul', $trip->judul ?? '') }}">
                            <label for="judul" class="form-label">Judul: </label>
                        </div>

                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="nama_destinasi"
                                placeholder="Masukkan destinasi"
                                value="{{ old('nama_destinasi', $trip->nama_destinasi ?? '') }}">
                            <label for="destinasi" class="form-label">Nama destinasi: </label>
                        </div>

                        <div class="form-floating my-2">
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat"
                                value="{{ old('alamat', $trip->alamat ?? '') }}">
                            <label for="alamat" class="form-label">Alamat: </label>
                        </div>

                        <div class="form-floating my-2">
                            <textarea name="deskripsi" class="form-control" id="deskripsi" style="height: 140px;">{{ old('deskripsi', $trip->deskripsi ?? '') }}</textarea>
                            <label for="deskripsi">Deskripsi</label>
                        </div>

                        <div class="form-floating my-2">
                            <textarea name="fasilitas" class="form-control" id="fasilitas" style="height: 140px;">{{ old('fasilitas', $trip->fasilitas ?? '') }}</textarea>
                            <label for="fasilitas">Fasilitas</label>
                        </div>

                        <div class="form-floating my-2">
                            <input type="date" class="form-control" name="tgl_trip"
                                value="{{ old('tgl_trip', isset($trip->tgl_trip) ? $trip->tgl_trip : '') }}">
                            <label for="tgl_trip" class="form-label">Tanggal trip</label>
                        </div>

                        <div class="form-floating my-2">
                            <input type="number" class="form-control" name="durasi"
                                value="{{ old('durasi', $trip->durasi ?? '') }}">
                            <label for="durasi" class="form-label">Durasi trip</label>
                        </div>

                        <div class="form-floating my-2">
                            <input type="number" class="form-control" name="harga_trip"
                                value="{{ old('harga_trip', $trip->harga_trip ?? '') }}">
                            <label for="harga_trip" class="form-label">Harga trip (Masukkan tanpa Rp. dan tanpa
                                titik)</label>
                        </div>

                        <div class="form-floating my-2">
                            <input type="number" class="form-control" name="harga_tiket"
                                value="{{ old('harga_tiket', $trip->harga_tiket ?? '') }}">
                            <label for="harga_trip" class="form-label">Harga tiket (Masukkan tanpa Rp. dan tanpa
                                titik)</label>
                        </div>

                        <div class="text-center my-4">
                            <button type="submit" class="btn btn-warning">
                                Update Acara
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>


    <script>
        let photoCount = 0;
        const maxPhotos = 4;

        function previewImages(event) {
            const files = event.target.files;
            const thumbnails = document.getElementById('thumbnails');
            const uploadLimit = document.getElementById('upload-limit');

            if (photoCount + files.length > maxPhotos) {
                alert(`You can upload a maximum of ${maxPhotos} photos.`);
                return;
            }

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'thumbnail';

                    const img = document.createElement('img');
                    img.src = e.target.result;

                    const btn = document.createElement('button');
                    btn.className = 'remove';
                    btn.innerHTML = '&times;';
                    btn.onclick = function() {
                        div.remove();
                        photoCount--;
                        uploadLimit.textContent = `${photoCount}/${maxPhotos}`;
                    };

                    div.appendChild(img);
                    div.appendChild(btn);
                    thumbnails.appendChild(div);
                };

                reader.readAsDataURL(file);
            }

            photoCount += files.length;
            uploadLimit.textContent = `${photoCount}/${maxPhotos}`;
        }

        function checkVideo() {
            const videoInput = document.getElementById('video');
            if (videoInput.files.length > 1) {
                alert('You can upload only one video.');
                videoInput.value = ''; // clear the input
            }
        }


        function deleteImage(imageId) {
            // Add image ID to the hidden delete_image_ids input
            const deleteImageInput = document.querySelector('input[name="delete_image_ids[]"]');
            const existingIds = deleteImageInput.value ? JSON.parse(deleteImageInput.value) : [];
            existingIds.push(imageId);
            deleteImageInput.value = JSON.stringify(existingIds);

            // Remove the thumbnail from the DOM
            const imageElement = document.querySelector(`#delete-image-${imageId}`);
            if (imageElement) {
                imageElement.parentElement.remove(); // Remove the thumbnail
            }
        }
    </script>

</x-layout-admin>
