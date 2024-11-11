<x-layout>


        <section>
            <div class="container-lg">
                <div class="row">
                    <div class="col-6">
                        <img src="/img2/gal1.jpg" width="100%" id="ProductImg">

                        <div class="row my-2">
                            <div class="small-img-col col">
                                <img src="/img2/gal1.jpg" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col col">
                                <img src="/img2/gal2.png" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col col">
                                <img src="/img2/gal3.jpeg" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col col">
                                <img src="/img2/gal4.jpg" width="100%" class="small-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-6"> 
                        <h1>Hiking di Gunung Putri Lembang</h1>
                        <p class="lead">Gunung Putri Lembang</p>
                        <p>Jl. Gunung Putri No. 184, Jayagiri, Lembang, Bandung Barat, Jawa Barat</p>
                        <p class="p">Harga Tiket: Rp25.000</p>
                        <p class="p">Harga Trip: Rp25.000</p>
                        <p>Tanggal Trip: 20 Oktober 2024</p>
                        <p>Durasi: 1 hari</p>
                        <a href="" class="btn btn-success">Daftar</a>
            
                        
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container my-4">
                <hr>
                <h2>Deskripsi</h2>
                <p>Gunung Putri Lembang adalah salah satu pegunungan yang terletak dikecamatan 
                    Lembang, Kabupaten Bandung Barat. Gunung Putri Lembang merupakan salah satu
                    tempat wisata yang berupa sebuah bukit yang arealnya banyak ditumbuhi dengan
                    rumput dan pohon kecil lainnya yang di tengahnya terdapat sebuah Tugu bernama 
                    Tugu Sespim Objek wisata Gunung Putri Lembang bisa jadi opsi yang cukup bersahabat 
                    bagi para pendaki pemula. Treknya berupa tangga tertata dan hanya memerlukan 
                    waktu sekitar 30 menit untuk mencapai puncak.</p>
            </div>
            <div class="container my-4">
                <hr>
                <h2>Fasilitas</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui soluta commodi inventore dicta omnis repellendus tempore impedit veritatis, neque amet! Placeat adipisci illo neque qui veniam inventore nulla dolorem dolor.</p>
            </div>

        </section>

        <section>
            <div class="container my-4 mb-2">
                <h2>Ulasan (12 ulasan)</h2>
                <hr>
                <div class="me-3 d-flex align-items-center">
                    <div class="me-2">
                        <img src="/img2/user.png" style="width: 70px;" class="rounded-circle">
                    </div>
                    <p>Sandy</p>
                    
                </div>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <p>Treknya sangat menantang, tapi karena dibawa asik jadinya gak terasa capeknya pokoknya enjoy ajaa!</p></p>
            </div>
            <div class="container my-4 mb-2">
                <hr>
                <div class="me-3 d-flex align-items-center">
                    <div class="me-2">
                        <img src="/img2/user.png" style="width: 70px;" class="rounded-circle">
                    </div>
                    <p>Sandy</p>
                    
                </div>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <p>Treknya sangat menantang, tapi karena dibawa asik jadinya gak terasa capeknya pokoknya enjoy ajaa!</p></p>
                <div class="user">
                    <a href="images/willy1 (1).jpg"><img src="images/willy1 (1).jpg" style="width: 15%;"></a>
                    <a href="images/willy2 (1).jpg"><img src="images/willy2 (1).jpg" style="width: 15%;"></a>
                </div>
            </div>
            <div class="container my-4 mb-2">
                <hr>
                <div class="me-3 d-flex align-items-center">
                    <div class="me-2">
                        <img src="/img2/user.png" style="width: 70px;" class="rounded-circle">
                    </div>
                    <p>Sandy</p>
                </div>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <i style="font-size:24px" class="fa">&#xf005;</i>
                <p>Treknya sangat menantang, tapi karena dibawa asik jadinya gak terasa capeknya pokoknya enjoy ajaa!</p>
                <div class="user">
                    <a href="images/hani1 (1).jpg"><img src="images/hani1 (1).jpg" style="width: 15%;"></a>
                    <a href="images/hani2 (1).jpg"><img src="images/hani2 (1).jpg" style="width: 15%;"></a>
                   </div>
            </div>
        </section>








        <script>
            var MenuItems = document.getElementById("MenuItems");
    
            MenuItems.style.maxHeight = "0px";
    
            function menutoggle() {
                if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
                else 
                {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>


        <script>
            var ProductImg = document.getElementById("ProductImg");
            var SmallImg = document.getElementsByClassName("small-img");
    
            SmallImg[0].onclick = function()
            {
                ProductImg.src = SmallImg[0].src;
            }
            SmallImg[1].onclick = function()
            {
                ProductImg.src = SmallImg[1].src;
            }
            SmallImg[2].onclick = function()
            {
                ProductImg.src = SmallImg[2].src;
            }
            SmallImg[3].onclick = function()
            {
                ProductImg.src = SmallImg[3].src;
            }
        </script>

</x-layout>