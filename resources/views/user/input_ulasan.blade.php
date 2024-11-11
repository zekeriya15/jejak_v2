<x-layout>


    <section>
        <div class="container-lg">
            <div class="text-start">
                <h2>Input Ulasan</h2>
            </div>

            <div class="row justify-content-center my-5">

                <div class="col-lg-6 bg-secondary-subtle p-4 rounded">
                    <form action="">
                        <div class="container-post">
                            <div class="thumbnails" id="thumbnails"></div>
                            <div class="upload-options">
                                <label for="foto" class="option">
                                    <p>Tambah Foto</p>
                                </label>
                                <input type="file" name="fotos[]" id="foto" multiple accept="image/*" onchange="previewImages(event)">
                                <span class="upload-limit" id="upload-limit">0/3</span>
            
                                
                            </div>
                        </div>

                        <div class="container rating-section mt-2">
                            <p>Kualitas Tempat</p>
                            <div class="stars">
                                <input type="radio" name="rating" id="star1" value="1">
                                <label for="star1">&#9733;</label>
            
                                <input type="radio" name="rating" id="star2" value="2">
                                <label for="star2">&#9733;</label>
            
                                <input type="radio" name="rating" id="star3" value="3">
                                <label for="star3">&#9733;</label>
            
                                <input type="radio" name="rating" id="star4" value="4">
                                <label for="star4">&#9733;</label>
            
                                <input type="radio" name="rating" id="star5" value="5">
                                <label for="star5">&#9733;</label>
                            </div>
                        </div>
                                            
                        <div class="form-floating my-2">
                            <textarea name="deskripsi" class="form-control" id="deskripsi" style="height: 140px;"></textarea>
                            <label for="deskripsi">Deskripsi</label>
                        </div>

                        <div class="text-center my-4">
                            <button type="submit" class="btn btn-warning">KIRIM</button>
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

                reader.onload = function (e) {
                    const div = document.createElement('div');
                    div.className = 'thumbnail';

                    const img = document.createElement('img');
                    img.src = e.target.result;

                    const btn = document.createElement('button');
                    btn.className = 'remove';
                    btn.innerHTML = '&times;';
                    btn.onclick = function () {
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
    </script>

</x-layout>